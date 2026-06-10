<template>
  <section class="dokumen">
    <div class="c">
      <div class="s-head" style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 16px;">
        <div class="ri">
          <div class="tag">Repositori Digital</div>
          <h2 class="ht" style="margin-bottom: 0">Akses Dokumen SPMI</h2>
        </div>
        <a href="#" class="ri btn-outline-dk" style="padding: 10px 20px; font-size: 13px">📂 Semua Dokumen →</a>
      </div>
      <div class="dok-grid">
        <a href="#" class="dok-card ri"><div class="dok-ico bi">📘</div><div><div class="dok-lbl">Kebijakan SPMI</div><div class="dok-cnt"># dokumen</div></div></a>
        <a href="#" class="dok-card ri ri-d1"><div class="dok-ico yi">📋</div><div><div class="dok-lbl">Standar SPMI</div><div class="dok-cnt"># dokumen</div></div></a>
        <a href="#" class="dok-card ri ri-d2"><div class="dok-ico gi">📑</div><div><div class="dok-lbl">Formulir & POB</div><div class="dok-cnt"># dokumen</div></div></a>
        <a href="#" class="dok-card ri ri-d3"><div class="dok-ico bi">🔎</div><div><div class="dok-lbl">Laporan AMI</div><div class="dok-cnt"># laporan</div></div></a>
        <a href="#" class="dok-card ri"><div class="dok-ico yi">📈</div><div><div class="dok-lbl">Laporan Monev</div><div class="dok-cnt"># laporan</div></div></a>
        <a href="#" class="dok-card ri ri-d1"><div class="dok-ico ri">🏅</div><div><div class="dok-lbl">Dokumen Akreditasi</div><div class="dok-cnt"># dokumen</div></div></a>
        <a href="#" class="dok-card ri ri-d2"><div class="dok-ico gi">⚖️</div><div><div class="dok-lbl">Regulasi & Peraturan</div><div class="dok-cnt"># regulasi</div></div></a>
        <a href="#" class="dok-card ri ri-d3"><div class="dok-ico bi">🌐</div><div><div class="dok-lbl">ISO & Sertifikasi</div><div class="dok-cnt"># dokumen</div></div></a>
      </div>
    </div>
  </section>
</template>

<style scoped>
.dokumen { background: var(--G); }
.dok-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
.dok-card { background: var(--W); border-radius: 12px; padding: 20px 18px; display: flex; align-items: center; gap: 14px; border: 1.5px solid transparent; transition: all 0.25s; cursor: pointer; }
.dok-card:hover { border-color: var(--Y); transform: translateY(-2px); box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08); }
.dok-ico { width: 46px; height: 46px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; }
.dok-ico.bi { background: var(--B2); } .dok-ico.ri { background: var(--R2); } .dok-ico.yi { background: rgba(253, 219, 0, 0.15); } .dok-ico.gi { background: var(--G); }
.dok-lbl { font-size: 13.5px; font-weight: 700; color: var(--INK); line-height: 1.3; }
.dok-cnt { font-size: 11px; color: var(--DIM); margin-top: 3px; font-weight: 500; }
</style>