<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const TOTAL = 3;
const DELAY = 6000;
const cur = ref(0);
const isPaused = ref(false);
const animationKey = ref(0); // Trigger restart CSS animation
let timer = null;

const goTo = (i) => {
  cur.value = (i + TOTAL) % TOTAL;
  animationKey.value++; // Force restart progress bar animation
};

const autoPlay = () => {
  timer = setInterval(() => {
    if (!isPaused.value) goTo(cur.value + 1);
  }, DELAY);
};

const handleNext = () => { goTo(cur.value + 1); resetTimer(); };
const handlePrev = () => { goTo(cur.value - 1); resetTimer(); };
const handleDot = (i) => { goTo(i); resetTimer(); };

const resetTimer = () => {
  clearInterval(timer);
  autoPlay();
};

let tx = 0;
const onTouchStart = (e) => tx = e.touches[0].clientX;
const onTouchEnd = (e) => {
  const dx = e.changedTouches[0].clientX - tx;
  if (Math.abs(dx) > 50) {
    dx < 0 ? handleNext() : handlePrev();
  }
};

onMounted(() => autoPlay());
onUnmounted(() => clearInterval(timer));
</script>

<template>
  <div class="hero" @mouseenter="isPaused = true" @mouseleave="isPaused = false" @touchstart.passive="onTouchStart" @touchend.passive="onTouchEnd">
    <div class="slide-progress" :key="animationKey"></div>

    <div class="slides-wrap" :style="{ transform: `translateX(-${cur * 100}%)` }">
      
      <div class="slide slide-1">
        <div class="slide-mesh"></div><div class="slide-grid"></div>
        <div class="orb orb-1"></div><div class="orb orb-2"></div><div class="orb orb-3"></div>
        <div class="slide-diag"></div><div class="slide-stripes"><span></span><span></span></div>
        <div class="slide-content">
          <div>
            <div class="slide-badge"><span class="slide-badge-blink"></span>Kantor Penjaminan Mutu UKWMS</div>
            <div class="slide-h">Membangun <em>Budaya Mutu</em><br />yang Berkelanjutan</div>
            <p class="slide-p">Mendorong seluruh sivitas akademika UKWMS untuk senantiasa berorientasi pada standar mutu tertinggi...</p>
            <div class="slide-btns">
              <a href="#" class="btn-slide-p">📋 Profil KPM</a>
              <a href="#" class="btn-slide-s">Lihat Dokumen SPMI →</a>
            </div>
          </div>
          <div class="slide-panel">
            <div class="stat-grid">
              <div class="stat-cell"><div class="stat-ico">🎓</div><div class="stat-num">A<span class="stat-sup">+</span></div><div class="stat-lbl">Akreditasi Institusi</div></div>
              <div class="stat-cell"><div class="stat-ico">🏛️</div><div class="stat-num">40<span class="stat-sup">+</span></div><div class="stat-lbl">Prodi Terakreditasi</div></div>
              <div class="stat-cell"><div class="stat-ico">📋</div><div class="stat-num">6</div><div class="stat-lbl">Siklus AMI</div></div>
              <div class="stat-cell"><div class="stat-ico">📄</div><div class="stat-num">200<span class="stat-sup">+</span></div><div class="stat-lbl">Dokumen SPMI</div></div>
            </div>
          </div>
        </div>
      </div>

      <div class="slide slide-2">
        <div class="slide-mesh"></div><div class="slide-grid"></div>
        <div class="orb orb-1"></div><div class="orb orb-2"></div>
        <div class="slide-diag"></div><div class="slide-stripes"><span></span><span></span></div>
        <div class="slide-content">
          <div>
            <div class="slide-badge"><span class="slide-badge-blink"></span>Audit Mutu Internal — AMI 2025</div>
            <div class="slide-h">Siklus AMI <em>Semester Genap</em><br />2024/2025 Dibuka</div>
            <p class="slide-p">Pendaftaran Audit Mutu Internal bagi seluruh program studi dan unit kerja di lingkungan UKWMS kini resmi dibuka.</p>
            <div class="slide-btns">
              <a href="#" class="btn-slide-p">📝 Daftar Sekarang</a>
              <a href="#" class="btn-slide-s">Panduan AMI →</a>
            </div>
          </div>
          <div class="slide-panel">
            <div class="stat-grid">
              <div class="stat-cell"><div class="stat-ico">📅</div><div class="stat-num" style="font-size: 22px; margin-top: 4px">30 Jun</div><div class="stat-lbl">Deadline<br />Pendaftaran</div></div>
              <div class="stat-cell"><div class="stat-ico">🏫</div><div class="stat-num">10<span class="stat-sup">+</span></div><div class="stat-lbl">Fakultas & Unit</div></div>
              <div class="stat-cell"><div class="stat-ico">👥</div><div class="stat-num">64<span class="stat-sup">+</span></div><div class="stat-lbl">Auditor Internal</div></div>
              <div class="stat-cell"><div class="stat-ico">✅</div><div class="stat-num">6</div><div class="stat-lbl">Siklus Berhasil</div></div>
            </div>
          </div>
        </div>
      </div>

      <div class="slide slide-3">
        <div class="slide-mesh"></div>
        <div class="slide-grid" style="background-image: linear-gradient(rgba(0,0,0,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(0,0,0,0.04) 1px, transparent 1px);"></div>
        <div class="orb orb-1"></div><div class="orb orb-2"></div>
        <div class="slide-diag" style="border-color: transparent transparent rgba(0,0,0,0.05) transparent;"></div>
        <div class="slide-stripes"><span></span><span></span></div>
        <div class="slide-content">
          <div>
            <div class="slide-badge" style="background: rgba(0,0,0,0.1); color: var(--INK); border-color: rgba(0,0,0,0.15);"><span class="slide-badge-blink"></span>Prestasi Akreditasi Terbaru</div>
            <div class="slide-h">UKWMS Raih <em>Akreditasi</em><br />Unggul BAN-PT</div>
            <p class="slide-p">Universitas Katolik Widya Mandala Surabaya resmi meraih predikat Akreditasi Unggul.</p>
            <div class="slide-btns">
              <a href="#" class="btn-slide-p">🏅 Baca Selengkapnya</a>
              <a href="#" class="btn-slide-s" style="border-color: rgba(0,0,0,0.2); color: var(--INK)">Dokumen Akreditasi →</a>
            </div>
          </div>
          <div class="slide-panel" style="background: rgba(0,0,0,0.06); border-color: rgba(0,0,0,0.1);">
            <div class="stat-grid" style="background: rgba(0,0,0,0.04);">
              <div class="stat-cell" style="background: rgba(0,0,0,0.03);"><div class="stat-ico">🌟</div><div class="stat-num" style="color: var(--R)">Unggul</div><div class="stat-lbl" style="color: rgba(0,0,0,0.45)">Status BAN-PT</div></div>
              <div class="stat-cell" style="background: rgba(0,0,0,0.03);"><div class="stat-ico">🌐</div><div class="stat-num" style="color: var(--R)">3</div><div class="stat-lbl" style="color: rgba(0,0,0,0.45)">Prodi FIBAA Int'l</div></div>
              <div class="stat-cell" style="background: rgba(0,0,0,0.03);"><div class="stat-ico">📊</div><div class="stat-num" style="color: var(--R)">98<span class="stat-sup">%</span></div><div class="stat-lbl" style="color: rgba(0,0,0,0.45)">Prodi Akreditasi A/Unggul</div></div>
              <div class="stat-cell" style="background: rgba(0,0,0,0.03);"><div class="stat-ico">🎯</div><div class="stat-num" style="color: var(--R)">Top<span class="stat-sup">10</span></div><div class="stat-lbl" style="color: rgba(0,0,0,0.45)">PTS Terbaik Jawa Timur</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="slide-nav">
      <button class="arrow-btn" @click="handlePrev">‹</button>
      <button v-for="i in 3" :key="i" class="dot-btn" :class="{ on: cur === i - 1 }" @click="handleDot(i - 1)"></button>
      <button class="arrow-btn" @click="handleNext">›</button>
    </div>
  </div>
</template>

<style scoped>
.hero { position: relative; height: 600px; overflow: hidden; background: var(--G); }
.slides-wrap { display: flex; height: 100%; transition: transform 0.9s cubic-bezier(0.77, 0, 0.18, 1); will-change: transform; }
.slide { min-width: 100%; height: 100%; position: relative; overflow: hidden; display: flex; align-items: center; flex-shrink: 0; }
.slide-1 { background: linear-gradient(135deg, #0a2647 0%, #144272 60%, #0780c2 100%); }
.slide-2 { background: linear-gradient(135deg, #2d0507 0%, #6b1117 55%, #fddb00 100%); }
.slide-3 { background: linear-gradient(135deg, #1a1506 0%, #4d4000 55%, #fddb00 100%); }
.slide-mesh { position: absolute; inset: 0; background-image: radial-gradient(ellipse 60% 80% at 80% 50%, rgba(255,255,255,0.05) 0%, transparent 60%), radial-gradient(ellipse 40% 60% at 20% 80%, rgba(255,255,255,0.03) 0%, transparent 50%); pointer-events: none; }
.slide-grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px); background-size: 72px 72px; animation: grid-drift 20s linear infinite; }
@keyframes grid-drift { from { transform: translate(0, 0); } to { transform: translate(72px, 72px); } }
.orb { position: absolute; border-radius: 50%; filter: blur(60px); opacity: 0.18; animation: orb-float 8s ease-in-out infinite alternate; pointer-events: none; }
.orb-1 { width: 400px; height: 400px; top: -100px; right: -80px; animation-delay: 0s; }
.orb-2 { width: 300px; height: 300px; bottom: -80px; left: 10%; animation-delay: -3s; }
.orb-3 { width: 200px; height: 200px; top: 30%; right: 25%; animation-delay: -5s; opacity: 0.12; }
@keyframes orb-float { from { transform: translate(0, 0) scale(1); } to { transform: translate(20px, 30px) scale(1.08); } }
.slide-1 .orb { background: var(--Y); } .slide-2 .orb-1 { background: var(--Y); opacity: 0.15; } .slide-2 .orb-2 { background: #fff; opacity: 0.08; } .slide-3 .orb-1 { background: var(--W); opacity: 0.2; } .slide-3 .orb-2 { background: var(--R); opacity: 0.2; }
.slide-diag { position: absolute; bottom: 0; right: 0; width: 0; height: 0; border-style: solid; border-width: 0 0 600px 300px; pointer-events: none; }
.slide-1 .slide-diag { border-color: transparent transparent rgba(253,219,0,0.07) transparent; } .slide-2 .slide-diag { border-color: transparent transparent rgba(253,219,0,0.08) transparent; } .slide-3 .slide-diag { border-color: transparent transparent rgba(255,255,255,0.06) transparent; }
.slide-stripes { position: absolute; left: 0; top: 0; bottom: 0; display: flex; gap: 4px; pointer-events: none; } .slide-stripes span { display: block; width: 4px; height: 100%; }
.slide-1 .slide-stripes span:nth-child(1), .slide-2 .slide-stripes span:nth-child(1) { background: var(--Y); } .slide-1 .slide-stripes span:nth-child(2) { background: var(--R); opacity: 0.7; } .slide-2 .slide-stripes span:nth-child(2) { background: rgba(255,255,255,0.3); } .slide-3 .slide-stripes span:nth-child(1) { background: var(--R); } .slide-3 .slide-stripes span:nth-child(2) { background: rgba(255,255,255,0.25); }
.slide-content { position: relative; z-index: 2; max-width: 1280px; margin: 0 auto; padding: 0 40px 0 60px; width: 100%; display: grid; grid-template-columns: 1fr 420px; gap: 60px; align-items: center; }
.slide-badge { display: inline-flex; align-items: center; gap: 8px; font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; padding: 6px 14px; border-radius: 100px; margin-bottom: 20px; }
.slide-1 .slide-badge { background: rgba(253,219,0,0.15); color: var(--Y); border: 1px solid rgba(253,219,0,0.3); } .slide-2 .slide-badge { background: rgba(255,255,255,0.1); color: #fff; border: 1px solid rgba(255,255,255,0.2); } .slide-3 .slide-badge { background: rgba(0,0,0,0.15); color: var(--INK); border: 1px solid rgba(0,0,0,0.1); }
.slide-badge-blink { width: 6px; height: 6px; border-radius: 50%; animation: blink 1.4s ease-in-out infinite; }
.slide-1 .slide-badge-blink { background: var(--Y); } .slide-2 .slide-badge-blink { background: #fff; } .slide-3 .slide-badge-blink { background: var(--R); }
@keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0.2; } }
.slide-h { font-family: "DM Serif Display", serif; font-size: clamp(34px, 4vw, 54px); line-height: 1.1; margin-bottom: 18px; }
.slide-1 .slide-h, .slide-2 .slide-h { color: #fff; } .slide-3 .slide-h { color: var(--INK); }
.slide-1 .slide-h em, .slide-2 .slide-h em { color: var(--Y); font-style: normal; } .slide-3 .slide-h em { color: var(--R); font-style: normal; }
.slide-p { font-size: 15.5px; line-height: 1.8; margin-bottom: 32px; font-weight: 300; }
.slide-1 .slide-p, .slide-2 .slide-p { color: rgba(255,255,255,0.75); } .slide-3 .slide-p { color: rgba(0,0,0,0.65); }
.slide-btns { display: flex; gap: 14px; flex-wrap: wrap; }
.btn-slide-p { padding: 13px 26px; border-radius: 9px; font-size: 14px; font-weight: 700; letter-spacing: 0.02em; display: inline-flex; align-items: center; gap: 8px; transition: all 0.25s; border: none; cursor: pointer; }
.slide-1 .btn-slide-p, .slide-2 .btn-slide-p { background: var(--Y); color: var(--INK); } .slide-3 .btn-slide-p { background: var(--R); color: #fff; }
.btn-slide-p:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(0,0,0,0.2); }
.btn-slide-s { padding: 12px 24px; border-radius: 9px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: all 0.25s; cursor: pointer; }
.slide-1 .btn-slide-s, .slide-2 .btn-slide-s { border: 1.5px solid rgba(255,255,255,0.3); color: #fff; background: transparent; } .slide-3 .btn-slide-s { border: 1.5px solid rgba(0,0,0,0.2); color: var(--INK); background: transparent; }
.btn-slide-s:hover { background: rgba(255,255,255,0.1); }
.slide-panel { border-radius: 16px; backdrop-filter: blur(12px); overflow: hidden; }
.slide-1 .slide-panel, .slide-2 .slide-panel { background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.12); } .slide-3 .slide-panel { background: rgba(0,0,0,0.07); border: 1px solid rgba(0,0,0,0.08); }
.stat-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2px; background: rgba(255,255,255,0.06); }
.stat-cell { padding: 22px 20px; display: flex; flex-direction: column; align-items: flex-start; transition: background 0.2s; }
.slide-1 .stat-cell, .slide-2 .stat-cell { background: rgba(255,255,255,0.04); } .slide-3 .stat-cell { background: rgba(0,0,0,0.04); }
.stat-cell:hover { background: rgba(253,219,0,0.08) !important; }
.stat-num { font-family: "DM Serif Display", serif; font-size: 34px; line-height: 1; margin-bottom: 4px; }
.slide-1 .stat-num, .slide-2 .stat-num { color: var(--Y); } .slide-3 .stat-num { color: var(--R); }
.stat-sup { font-size: 18px; }
.stat-lbl { font-size: 11px; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; line-height: 1.4; }
.slide-1 .stat-lbl, .slide-2 .stat-lbl { color: rgba(255,255,255,0.55); } .slide-3 .stat-lbl { color: rgba(0,0,0,0.45); }
.stat-ico { font-size: 18px; margin-bottom: 8px; }
.slide-nav { position: absolute; bottom: 28px; left: 50%; transform: translateX(-50%); z-index: 10; display: flex; align-items: center; gap: 12px; }
.dot-btn { width: 10px; height: 10px; border-radius: 50%; background: rgba(255,255,255,0.35); border: none; cursor: pointer; transition: all 0.3s; padding: 0; }
.dot-btn.on { background: var(--Y); width: 28px; border-radius: 5px; }
.arrow-btn { width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); color: #fff; font-size: 16px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s; backdrop-filter: blur(4px); }
.arrow-btn:hover { background: rgba(255,255,255,0.25); }
.slide-progress { position: absolute; top: 0; left: 0; height: 3px; background: var(--Y); animation: progress-run 6s linear; z-index: 10; }
@keyframes progress-run { from { width: 0; } to { width: 100%; } }
</style>