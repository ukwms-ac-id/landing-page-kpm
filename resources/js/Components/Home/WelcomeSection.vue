<template>
  <section class="welcome">
    <div class="c">
      <div class="wel-wrap">
        <div class="wel-left ri">
          <div class="wel-photo"><div class="wel-photo-inner">👤</div></div>
          <div class="wel-badge">
            Made Indra Ayu Astarini, S.Kep., Ns., M.Kep.
            <div class="pos">Ketua Kantor Penjaminan Mutu</div>
          </div>
        </div>
        <div class="wel-right ri ri-d2">
          <div class="tag">Sambutan Pimpinan</div>
          <h2 class="ht">Selamat Datang di<br />KPM UKWMS</h2>
          <blockquote class="wel-quote">
            "Mutu bukan sekadar standar — ia adalah komitmen kami kepada setiap mahasiswa, dosen, dan masyarakat yang mempercayakan pendidikannya kepada UKWMS."
          </blockquote>
          <p>
            Puji syukur kepada Tuhan Yang Maha Esa atas berkat dan rahmat-Nya sehingga Kantor Penjaminan Mutu (KPM) Universitas Katolik Widya Mandala Surabaya dapat terus menjalankan misi penjaminan mutu secara konsisten dan berkelanjutan.
          </p>
          <p>
            KPM hadir sebagai motor penggerak budaya mutu di lingkungan UKWMS. Melalui implementasi SPMI yang komprehensif, kami memastikan setiap aspek layanan akademik dan non-akademik memenuhi standar mutu tertinggi — demi lulusan yang berdaya saing, berkarakter, dan siap mengabdi kepada bangsa.
          </p>
          <div class="wel-sig">
            Made Indra Ayu Astarini, S.Kep., Ns., M.Kep.<small>Ketua Kantor Penjaminan Mutu — UKWMS</small>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.welcome { background: var(--W); }
.wel-wrap { display: grid; grid-template-columns: 300px 1fr; gap: 72px; align-items: center; }
.wel-left { position: relative; }
.wel-photo { width: 100%; aspect-ratio: 0.75; border-radius: 16px; overflow: hidden; background: linear-gradient(135deg, var(--G), #d8d8d8); position: relative; box-shadow: 10px 10px 0 var(--Y); }
.wel-photo-inner { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 72px; background: linear-gradient(160deg, #e8e8e8 0%, #c8c8c8 100%); }
.wel-badge { position: absolute; bottom: -16px; left: 50%; transform: translateX(-50%); background: var(--R); color: #fff; padding: 10px 20px; border-radius: 10px; font-size: 12px; font-weight: 700; text-align: center; white-space: nowrap; box-shadow: 0 8px 24px rgba(234, 31, 39, 0.3); }
.wel-badge .pos { font-size: 10px; font-weight: 500; opacity: 0.8; margin-top: 2px; }
.wel-right { padding-left: 8px; }
.wel-quote { font-family: "DM Serif Display", serif; font-size: clamp(17px, 2vw, 22px); font-style: italic; color: var(--INK); line-height: 1.55; border-left: 4px solid var(--Y); padding: 20px 28px; background: var(--G); border-radius: 0 12px 12px 0; margin-bottom: 28px; }
.wel-right p { font-size: 15px; color: var(--MID); line-height: 1.85; margin-bottom: 18px; }
.wel-sig { font-family: "DM Serif Display", serif; font-size: 24px; font-style: italic; color: var(--INK); margin-top: 28px; }
.wel-sig small { display: block; font-family: "DM Sans", sans-serif; font-size: 12px; font-style: normal; font-weight: 600; color: var(--DIM); margin-top: 4px; letter-spacing: 0.04em; text-transform: uppercase; }
</style>