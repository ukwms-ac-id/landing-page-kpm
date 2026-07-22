<script setup>
import { ref, onMounted, onUnmounted, nextTick } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { PageFlip } from 'page-flip';
import * as pdfjsLib from 'pdfjs-dist';
// Vite: import worker sebagai URL agar ikut ter-bundle (butuh pdfjs-dist v4+)
import PdfWorkerUrl from 'pdfjs-dist/build/pdf.worker.min.mjs?url';

pdfjsLib.GlobalWorkerOptions.workerSrc = PdfWorkerUrl;

const props = defineProps({
  pdfUrl: { type: String, required: true },
});

// const pdfSource = '/api/secure-pdf/STANDARSPMI24-29FINAL.pdf';
const pdfSource = props.pdfUrl;

// ====== KONFIGURASI OPTIMASI ======
// Jumlah halaman di kiri+kanan posisi baca yang akan di-render jadi gambar.
const RENDER_BUFFER = 3;
// Jumlah halaman TAMBAHAN di luar buffer yang masih boleh disimpan di cache
// sebelum di-evict (dibebaskan) dari memori. Total halaman "hidup" di memori
// pada satu waktu kira-kira: (RENDER_BUFFER + CACHE_MARGIN) * 2.
const CACHE_MARGIN = 10;
// Lebar target render (px) - samakan dengan lebar tampilan buku, jangan lebih.
const TARGET_WIDTH = 450;
// Batas devicePixelRatio agar layar retina tidak melipatgandakan ukuran canvas.
const MAX_DPR = 1.5;
// Kualitas kompresi JPEG hasil render (0-1). 0.8 biasanya cukup tajam untuk teks.
const JPEG_QUALITY = 0.82;
// ===================================

const totalPages = ref(0);
const isLoading = ref(true);
const currentPageNum = ref(1);

// state per halaman: { num, src, status }
// status: 'idle' | 'queued' | 'rendering' | 'ready'
const pageStates = ref([]);

let pdfDoc = null;
let pageFlip = null;
let renderQueue = [];
let isProcessingQueue = false;
let idleCallbackId = null;
let destroyed = false;

async function initPdf() {
  const loadingTask = pdfjsLib.getDocument({
    url: pdfSource,
    disableAutoFetch: true, // jangan tarik semua byte sekaligus
    disableStream: false,
  });
  pdfDoc = await loadingTask.promise;
  totalPages.value = pdfDoc.numPages;

  pageStates.value = Array.from({ length: pdfDoc.numPages }, (_, i) => ({
    num: i + 1,
    src: null,
    status: 'idle',
  }));

  await nextTick();
  initPageFlip();
}

function initPageFlip() {
  const bookElement = document.getElementById('flipbook-wrapper');
  if (!bookElement) return;

  pageFlip = new PageFlip(bookElement, {
    width: 450,
    height: 640,
    size: 'stretch',
    minWidth: 300,
    maxWidth: 900,
    minHeight: 400,
    maxHeight: 1200,
    showCover: true,
    maxShadowOpacity: 0.3,
    usePortrait: true,
  });

  // Elemen .flip-page tetap ada untuk SEMUA halaman (dibutuhkan PageFlip
  // untuk menghitung geometri buku), tapi isinya kosong/placeholder sampai
  // benar-benar dirender. Ini yang membedakan dari versi awal.
  pageFlip.loadFromHTML(document.querySelectorAll('.flip-page'));

  pageFlip.on('flip', (e) => {
    currentPageNum.value = e.data + 1;
    updateRenderWindow();
  });

  isLoading.value = false;
  updateRenderWindow();
}

function updateRenderWindow() {
  const cur = currentPageNum.value;
  const from = Math.max(1, cur - RENDER_BUFFER);
  const to = Math.min(totalPages.value, cur + RENDER_BUFFER);

  for (let p = from; p <= to; p++) queueRender(p);
  evictFarPages(cur);
}

function queueRender(pageNum) {
  const state = pageStates.value[pageNum - 1];
  if (!state || state.status !== 'idle') return;

  state.status = 'queued';
  // prioritaskan halaman yang paling dekat dengan posisi baca
  renderQueue.push(pageNum);
  renderQueue.sort(
    (a, b) => Math.abs(a - currentPageNum.value) - Math.abs(b - currentPageNum.value)
  );
  processQueue();
}

function processQueue() {
  if (isProcessingQueue || renderQueue.length === 0 || destroyed) return;
  isProcessingQueue = true;

  const run = async (deadline) => {
    while (renderQueue.length && !destroyed) {
      const pageNum = renderQueue.shift();
      await renderPageToImage(pageNum);
      if (deadline && deadline.timeRemaining && deadline.timeRemaining() < 5) break;
    }
    isProcessingQueue = false;
    if (renderQueue.length && !destroyed) processQueue();
  };

  if ('requestIdleCallback' in window) {
    idleCallbackId = window.requestIdleCallback(run, { timeout: 1000 });
  } else {
    setTimeout(() => run(null), 0);
  }
}

async function renderPageToImage(pageNum) {
  const state = pageStates.value[pageNum - 1];
  if (!state || !pdfDoc) return;

  state.status = 'rendering';
  let canvas = null;

  try {
    const page = await pdfDoc.getPage(pageNum);
    const baseViewport = page.getViewport({ scale: 1 });
    const dpr = Math.min(window.devicePixelRatio || 1, MAX_DPR);
    const scale = (TARGET_WIDTH / baseViewport.width) * dpr;
    const viewport = page.getViewport({ scale });

    canvas = document.createElement('canvas');
    canvas.width = viewport.width;
    canvas.height = viewport.height;
    const ctx = canvas.getContext('2d', { alpha: false });

    await page.render({ canvasContext: ctx, viewport }).promise;

    // Simpan sebagai data URL terkompresi, lalu segera lepas canvas mentahnya.
    state.src = canvas.toDataURL('image/jpeg', JPEG_QUALITY);
    state.status = 'ready';

    page.cleanup(); // lepas resource internal pdf.js untuk halaman ini
  } catch (err) {
    console.error('Gagal merender halaman', pageNum, err);
    state.status = 'idle';
  } finally {
    if (canvas) {
      canvas.width = 0;
      canvas.height = 0;
      canvas = null;
    }
  }
}

function evictFarPages(cur) {
  const keepFrom = cur - RENDER_BUFFER - CACHE_MARGIN;
  const keepTo = cur + RENDER_BUFFER + CACHE_MARGIN;

  for (const state of pageStates.value) {
    if (state.status === 'ready' && (state.num < keepFrom || state.num > keepTo)) {
      state.src = null;
      state.status = 'idle';
    }
  }
}

const nextPage = () => { if (pageFlip) pageFlip.flipNext(); };
const prevPage = () => { if (pageFlip) pageFlip.flipPrev(); };
const preventRightClick = (e) => e.preventDefault();

onMounted(() => {
  initPdf();
});

onUnmounted(() => {
  destroyed = true;
  renderQueue = [];
  if (idleCallbackId && 'cancelIdleCallback' in window) {
    window.cancelIdleCallback(idleCallbackId);
  }
  if (pageFlip) {
    pageFlip.destroy();
    pageFlip = null;
  }
  if (pdfDoc) {
    pdfDoc.destroy();
    pdfDoc = null;
  }
  // Lepas referensi gambar besar agar cepat di-GC
  pageStates.value.forEach((s) => { s.src = null; });
});
</script>

<template>
  <Head title="Membaca Standar SPMI - Flipbook" />

  <MainLayout>
    <div class="doc-header">
      <div class="c">
        <h1 class="doc-title">Standar SPMI UKWMS 2024-2029</h1>
        <div class="doc-meta">
          <!-- <span class="locked-badge">🔒  Flipbook (Windowed Rendering)</span> -->
          <span class="meta-info" v-if="totalPages > 0">Halaman {{ currentPageNum }} dari {{ totalPages }}</span>
        </div>
      </div>
    </div>

    <section class="reader-section">
      <div class="c">
        <div class="flip-toolbar">
          <button @click="prevPage" class="tb-btn" :disabled="isLoading">‹ Sebelumnya</button>
          <!-- <span class="tb-secure">🛡️ Render Bertahap (Anti Out-of-Memory)</span> -->
          <button @click="nextPage" class="tb-btn" :disabled="isLoading">Selanjutnya ›</button>
        </div>

        <div class="flip-container" @contextmenu="preventRightClick">
          <div v-if="isLoading" class="loading-state">
            ⏳ Memuat....
          </div>

          <div id="flipbook-wrapper" class="book-wrapper" v-show="!isLoading">
            <div v-for="state in pageStates" :key="state.num" class="flip-page">
              <div class="page-content">
                <img v-if="state.src" :src="state.src" :alt="`Halaman ${state.num}`" />
                <div v-else class="page-placeholder">
                  <span v-if="state.status === 'rendering' || state.status === 'queued'">…</span>
                </div>
                <div class="watermark">UKWMS</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
.doc-header { background: var(--W); padding: 24px 0; border-bottom: 1px solid var(--BRD); }
.doc-title { font-family: "DM Serif Display", serif; font-size: 26px; color: var(--INK); margin-bottom: 6px; }
.doc-meta { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
.locked-badge { background: rgba(234, 31, 39, 0.1); color: var(--R); padding: 4px 10px; border-radius: 6px; font-size: 11px; font-weight: 700; text-transform: uppercase; }
.meta-info { font-size: 13px; color: var(--DIM); font-weight: 600; }

.reader-section { background: var(--G); padding: 24px 0 50px; }
.flip-toolbar { background: #1c1c22; padding: 12px 20px; display: flex; justify-content: space-between; align-items: center; border-radius: 10px 10px 0 0; }
.tb-btn { background: #333; color: #fff; border: 1px solid #444; padding: 6px 14px; border-radius: 6px; font-size: 12.5px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
.tb-btn:hover:not(:disabled) { background: var(--Y); color: var(--INK); border-color: var(--Y); }
.tb-btn:disabled { opacity: 0.5; cursor: not-allowed; }
.tb-secure { color: #4caf50; font-size: 11.5px; font-weight: 600; }

.flip-container { background: #dcdcdc; min-height: 700px; padding: 30px 10px; display: flex; justify-content: center; align-items: center; border-radius: 0 0 10px 10px; user-select: none; -webkit-user-select: none; overflow: hidden; }
.loading-state { font-size: 15px; font-weight: 600; color: #555; }

.book-wrapper { box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
.flip-page { background-color: #fff; overflow: hidden; position: relative; }
.page-content { width: 100%; height: 100%; position: relative; background: #fff; }
.page-content img { width: 100%; height: 100%; object-fit: contain; display: block; }
.page-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #bbb; font-size: 20px; background: repeating-linear-gradient(45deg, #f3f3f3, #f3f3f3 10px, #eaeaea 10px, #eaeaea 20px); }

.watermark { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) rotate(-45deg); font-size: 32px; font-weight: 800; color: rgba(200, 0, 0, 0.05); white-space: nowrap; pointer-events: none; z-index: 10; }
</style>