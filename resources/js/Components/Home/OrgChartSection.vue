<template>
  <section class="struktur">
    <div class="c">
      <div class="s-head center ri">
        <div class="tag" style="justify-content: center">Struktur Organisasi</div>
        <h2 class="ht">Tim KPM UKWMS</h2>
        <p class="hs" style="margin: 0 auto">Didukung oleh tim profesional yang berdedikasi dalam membangun dan menjaga budaya mutu kampus.</p>
      </div>
      <div class="org ri">
        <div class="org-lv">
          <div class="on top">
            <div class="on-t">Kepala KPM</div>
            <div class="on-n">Made Indra Ayu Astarini, S.Kep., Ns., M.Kep.</div>
          </div>
        </div>
        <div class="org-v"></div>
        <div class="org-lv" style="gap: 24px">
          <div class="on">
            <div class="on-t">Sekretaris</div>
            <div class="on-n">rahasia.</div>
          </div>
          <div class="on">
            <div class="on-t">Staf Administrasi</div>
            <div class="on-n">rahasia.</div>
          </div>
          <div class="on">
            <div class="on-t">Staf IT & Data</div>
            <div class="on-n">rahasia.</div>
          </div>
        </div>
        <div class="org-v"></div>
        <div class="org-lv" style="gap: 16px; flex-wrap: wrap">
          <div class="on">
            <div class="on-t">Divisi</div>
            <div class="on-n">Pengembangan Standar SPMI</div>
            <div class="on-d">2 Personil</div>
          </div>
          <div class="on">
            <div class="on-t">Divisi</div>
            <div class="on-n">Audit Mutu Internal</div>
            <div class="on-d">3 Personil</div>
          </div>
          <div class="on">
            <div class="on-t">Divisi</div>
            <div class="on-n">Akreditasi & Sertifikasi</div>
            <div class="on-d">2 Personil</div>
          </div>
          <div class="on">
            <div class="on-t">Divisi</div>
            <div class="on-n">Monitoring & Evaluasi</div>
            <div class="on-d">2 Personil</div>
          </div>
        </div>
      </div>
      <div class="center mt-10">
        <a href="#" class="btn-outline-dk">📥 Unduh Bagan Struktur Lengkap</a>
      </div>
    </div>
  </section>
</template>

<style scoped>
.struktur { background: var(--W); }
.org { display: flex; flex-direction: column; align-items: center; gap: 0; position: relative; z-index: 2; }
.org-lv { display: flex; justify-content: center; gap: 20px; }
.org-v { width: 2px; height: 28px; background: var(--BRD); margin: 0 auto; }
.on { background: var(--G); border: 1.5px solid var(--BRD); border-radius: 10px; padding: 16px 20px; text-align: center; min-width: 170px; transition: all 0.25s; cursor: default; }
.on:hover { border-color: var(--Y); background: var(--W); box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08); }
.on.top { background: var(--INK); border-color: var(--INK); min-width: 240px; }
.on.top .on-t { color: var(--Y); }
.on.top .on-n { color: #fff; }
.on-t { font-size: 10px; font-weight: 700; color: var(--B); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 5px; }
.on-n { font-size: 13.5px; font-weight: 700; color: var(--INK); line-height: 1.3; }
.on-d { font-size: 11px; color: var(--DIM); margin-top: 4px; }
</style>