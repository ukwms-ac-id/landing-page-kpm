<template>
  <section class="layanan">
    <div class="c">
      <div class="s-head" style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 16px;">
        <div class="ri">
          <div class="tag">Tupoksi & Layanan</div>
          <h2 class="ht">Apa yang Kami Kerjakan</h2>
          <p class="hs">KPM menjalankan fungsi perencanaan, pelaksanaan, evaluasi, dan pengembangan sistem mutu di seluruh unit kerja UKWMS.</p>
        </div>
        <a href="#" class="ri" style="font-size: 13px; font-weight: 700; color: var(--B); white-space: nowrap;">Lihat Semua →</a>
      </div>
      <div class="lay-grid">
        <div class="lay-card feat ri">
          <div class="lay-ico-bg"><div>🔍</div></div>
          <div class="lay-title">Audit Mutu Internal</div>
          <div class="lay-desc">Pelaksanaan AMI secara sistematis untuk mengevaluasi kesesuaian implementasi SPMI di seluruh unit kerja dan program studi UKWMS.</div>
          <a href="#" class="lay-link" style="color: var(--Y)">Selengkapnya →</a>
        </div>
        <div class="lay-card ri ri-d1">
          <div class="lay-ico-bg ry">📊</div>
          <div class="lay-title">Pengembangan Standar SPMI</div>
          <div class="lay-desc">Penyusunan dan pembaruan dokumen standar, manual, dan formulir SPMI sesuai regulasi terkini dari Kemdiktisaintek.</div>
          <a href="#" class="lay-link">Selengkapnya →</a>
        </div>
        <div class="lay-card ri ri-d2">
          <div class="lay-ico-bg rr">🏅</div>
          <div class="lay-title">Pendampingan Akreditasi</div>
          <div class="lay-desc">Fasilitasi dan pendampingan prodi dalam mempersiapkan borang akreditasi BAN-PT, LAM, dan lembaga akreditasi internasional.</div>
          <a href="#" class="lay-link">Selengkapnya →</a>
        </div>
        <div class="lay-card ri ri-d1">
          <div class="lay-ico-bg rb">🎓</div>
          <div class="lay-title">Pelatihan & Sosialisasi Mutu</div>
          <div class="lay-desc">Program pelatihan budaya mutu bagi dosen, tenaga kependidikan, dan mahasiswa secara berkala dan terstruktur.</div>
          <a href="#" class="lay-link">Selengkapnya →</a>
        </div>
        <div class="lay-card ri ri-d2">
          <div class="lay-ico-bg ry">📈</div>
          <div class="lay-title">Monitoring & Evaluasi IKU</div>
          <div class="lay-desc">Monitoring dan evaluasi pencapaian Indikator Kinerja Utama (IKU) PT secara periodik dan menyeluruh sesuai target Dikti.</div>
          <a href="#" class="lay-link">Selengkapnya →</a>
        </div>
        <div class="lay-card ri ri-d3">
          <div class="lay-ico-bg rb">🤝</div>
          <div class="lay-title">Benchmarking & Kerjasama</div>
          <div class="lay-desc">Studi banding dan kolaborasi dengan lembaga penjaminan mutu dari perguruan tinggi lain di dalam dan luar negeri.</div>
          <a href="#" class="lay-link">Selengkapnya →</a>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.layanan { background: var(--G); }
.lay-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.lay-card { background: var(--W); border-radius: 14px; padding: 32px 28px; border: 1.5px solid transparent; position: relative; overflow: hidden; transition: all 0.3s; cursor: pointer; }
.lay-card::after { content: ""; position: absolute; inset: 0; border-radius: 14px; border: 1.5px solid var(--Y); opacity: 0; transition: opacity 0.3s; pointer-events: none; }
.lay-card:hover { transform: translateY(-5px); box-shadow: 0 20px 48px rgba(0, 0, 0, 0.1); }
.lay-card:hover::after { opacity: 1; }
.lay-card.feat { background: var(--B); border-color: var(--B); }
.lay-card.feat::after { border-color: var(--Y); }
.lay-card.feat .lay-title { color: #fff; }
.lay-card.feat .lay-desc { color: rgba(255, 255, 255, 0.65); }
.lay-card.feat .lay-ico-bg { background: rgba(253, 219, 0, 0.15); }
.lay-card.feat .lay-link { color: var(--Y); }
.lay-ico-bg { width: 54px; height: 54px; border-radius: 12px; background: var(--B2); display: flex; align-items: center; justify-content: center; font-size: 24px; margin-bottom: 20px; }
.lay-ico-bg.ry { background: rgba(253, 219, 0, 0.15); }
.lay-ico-bg.rr { background: var(--R2); }
.lay-ico-bg.rb { background: var(--B2); }
.lay-title { font-size: 17px; font-weight: 700; color: var(--INK); margin-bottom: 10px; line-height: 1.3; }
.lay-desc { font-size: 13.5px; color: var(--DIM); line-height: 1.72; margin-bottom: 20px; }
.lay-link { font-size: 12px; font-weight: 700; color: var(--B); letter-spacing: 0.06em; text-transform: uppercase; display: inline-flex; align-items: center; gap: 5px; transition: gap 0.2s; }
.lay-link:hover { gap: 10px; }
</style>