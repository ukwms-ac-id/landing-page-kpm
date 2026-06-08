<template>
  <section class="berita">
    <div class="c">
      <div class="s-head" style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 16px;">
        <div class="ri">
          <div class="tag">Berita & Artikel</div>
          <h2 class="ht">Informasi Terkini KPM</h2>
          <p class="hs">Ikuti perkembangan kegiatan penjaminan mutu, akreditasi, dan pengembangan institusi UKWMS.</p>
        </div>
        <a href="#" class="ri" style="font-size: 13px; font-weight: 700; color: var(--B)">Arsip Berita →</a>
      </div>
      <div class="art-grid">
        <a href="#" class="art-card main ri">
          <div class="art-img g1" style="height: 300px">
            <div class="art-img-ph">🎓</div>
            <div class="art-img-ov"></div>
            <span class="art-cat cat-y">Akreditasi</span>
          </div>
          <div class="art-body">
            <div class="art-meta"><span>28 Mei 2025</span><span class="art-sep"></span><span>Admin KPM</span><span class="art-sep"></span><span>5 mnt baca</span></div>
            <div class="art-title">UKWMS Raih Akreditasi Unggul — Tonggak Sejarah Penjaminan Mutu Institusi</div>
            <div class="art-excerpt">Universitas Katolik Widya Mandala Surabaya resmi mendapatkan predikat Akreditasi Unggul dari BAN-PT setelah melalui proses visitasi dan asesmen lapangan yang komprehensif...</div>
          </div>
          <div class="art-footer"><span class="art-rd">Baca Selengkapnya →</span><span class="art-vw">👁 1.24k</span></div>
        </a>
        <a href="#" class="art-card ri ri-d1">
          <div class="art-img g2 art-img-sm">
            <div class="art-img-ph" style="font-size: 32px">📋</div><div class="art-img-ov"></div><span class="art-cat cat-r">AMI</span>
          </div>
          <div class="art-body"><div class="art-meta"><span>20 Mei 2025</span></div><div class="art-title">Pelaksanaan AMI Semester Genap 2024/2025 Resmi Dimulai</div></div>
          <div class="art-footer"><span class="art-rd">Selengkapnya →</span><span class="art-vw">👁 342</span></div>
        </a>
        <a href="#" class="art-card ri ri-d2">
          <div class="art-img g3 art-img-sm">
            <div class="art-img-ph" style="font-size: 32px">🤝</div><div class="art-img-ov"></div><span class="art-cat cat-b">Kerjasama</span>
          </div>
          <div class="art-body"><div class="art-meta"><span>15 Mei 2025</span></div><div class="art-title">Benchmarking SPMI bersama Universitas Sanata Dharma Yogyakarta</div></div>
          <div class="art-footer"><span class="art-rd">Selengkapnya →</span><span class="art-vw">👁 218</span></div>
        </a>
        <a href="#" class="art-card ri ri-d1">
          <div class="art-img g4 art-img-sm">
            <div class="art-img-ph" style="font-size: 32px">📚</div><div class="art-img-ov"></div><span class="art-cat cat-y">Pelatihan</span>
          </div>
          <div class="art-body"><div class="art-meta"><span>10 Mei 2025</span></div><div class="art-title">Workshop Penulisan Dokumen SPMI bagi Gugus Mutu Prodi</div></div>
          <div class="art-footer"><span class="art-rd">Selengkapnya →</span><span class="art-vw">👁 189</span></div>
        </a>
        <a href="#" class="art-card ri ri-d2">
          <div class="art-img g5 art-img-sm">
            <div class="art-img-ph" style="font-size: 32px">🏆</div><div class="art-img-ov"></div><span class="art-cat cat-r">Prestasi</span>
          </div>
          <div class="art-body"><div class="art-meta"><span>3 Mei 2025</span></div><div class="art-title">3 Prodi UKWMS Berhasil Raih Akreditasi Internasional FIBAA</div></div>
          <div class="art-footer"><span class="art-rd">Selengkapnya →</span><span class="art-vw">👁 567</span></div>
        </a>
      </div>
      <div class="center mt-10 ri">
        <a href="#" class="btn-outline-dk">📰 Lihat Semua Berita & Artikel</a>
      </div>
    </div>
  </section>
</template>

<style scoped>
.berita { background: var(--W); }
.art-grid { display: grid; grid-template-columns: 1.8fr 1fr 1fr; grid-template-rows: auto auto; gap: 22px; }
.art-card { background: var(--W); border-radius: 14px; border: 1.5px solid var(--BRD); overflow: hidden; display: flex; flex-direction: column; transition: all 0.3s; cursor: pointer; }
.art-card:hover { box-shadow: 0 16px 48px rgba(0, 0, 0, 0.1); transform: translateY(-4px); border-color: transparent; }
.art-card.main { grid-row: span 2; }
.art-img { width: 100%; position: relative; overflow: hidden; flex-shrink: 0; }
.art-card.main .art-img { height: 300px; }
.art-img-sm { height: 148px; }
.art-img-ph { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 44px; }
.g1 { background: linear-gradient(135deg, #1c3a5e, #2660a4); } .g2 { background: linear-gradient(135deg, #5c0f13, #b32028); } .g3 { background: linear-gradient(135deg, #4a3a00, #9a7a00); } .g4 { background: linear-gradient(135deg, #0a3d2e, #157a5c); } .g5 { background: linear-gradient(135deg, #3d1a00, #8a3d00); }
.art-img-ov { position: absolute; inset: 0; background: linear-gradient(to top, rgba(0, 0, 0, 0.55) 0%, transparent 55%); }
.art-cat { position: absolute; top: 14px; left: 14px; font-size: 10px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 4px 11px; border-radius: 100px; }
.cat-y { background: var(--Y); color: var(--INK); } .cat-r { background: var(--R); color: #fff; } .cat-b { background: var(--B); color: #fff; }
.art-body { padding: 22px; flex: 1; display: flex; flex-direction: column; }
.art-meta { display: flex; align-items: center; gap: 8px; font-size: 11.5px; color: var(--DIM); margin-bottom: 10px; flex-wrap: wrap; }
.art-sep { width: 3px; height: 3px; border-radius: 50%; background: var(--BRD); }
.art-title { font-family: "DM Serif Display", serif; font-size: 17px; color: var(--INK); line-height: 1.4; margin-bottom: 10px; flex: 1; }
.art-card.main .art-title { font-size: 22px; }
.art-excerpt { font-size: 13.5px; color: var(--DIM); line-height: 1.72; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
.art-footer { padding: 14px 22px; border-top: 1px solid var(--G); display: flex; justify-content: space-between; align-items: center; }
.art-rd { font-size: 12px; font-weight: 700; color: var(--B); text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 5px; }
.art-vw { font-size: 12px; color: var(--DIM); display: flex; align-items: center; gap: 4px; }
</style>