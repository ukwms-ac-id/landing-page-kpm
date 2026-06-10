<template>
  <section class="struktur">
    <div class="c">
      <div class="s-head center ri">
        <div class="tag" style="justify-content: center">Struktur Organisasi</div>
        <h2 class="ht">Tim KPM UKWMS</h2>
      </div>

      <div class="org-wrapper ri">
        <div class="org-tree">
          
          <div class="org-row has-spine">
            <div class="on top">
              <div class="on-t">Ketua KPM</div>
              <div class="on-n">Made Indra Ayu Astarini, S.Kep., Ns., M.Kep.</div>
            </div>
          </div>

          <div class="org-row branch has-spine">
            <div class="on">
              <div class="on-t">Wakil Ketua KPM</div>
              <div class="on-n">Rr. Arielia Yustisiana, S.S., M.Hum.</div>
            </div>
            <div class="on">
              <div class="on-t">Sekretaris</div>
              <div class="on-n">Lanny Agustine</div>
            </div>
          </div>

          <div class="org-row branch has-spine">
            <div class="on">
              <div class="on-t">Koordinator Bidang I</div>
              <div class="on-n">Pengembangan SPMI</div>
              <div class="on-d">Dr. Fransisca Dessi Christanti, M.Si</div>
            </div>
            <div class="on">
              <div class="on-t">Koordinator Bidang II</div>
              <div class="on-n">Pengembangan SPME</div>
              <div class="on-d">Dr. Yudhiakuari Sincihu, dr., M.Kes.</div>
            </div>
          </div>

          <div class="org-row branch">
            <div class="on">
              <div class="on-t">Divisi</div>
              <!-- <div class="on-n">Akreditasi & Sertifikasi</div> -->
            </div>
            <div class="on">
              <div class="on-t">Divisi</div>
              <div class="on-n">Pengembangan SPME</div>
              <div class="on-d">Anastasia Nelladia Cendra, S.Pd., M.Pd.</div>
              <!-- <div class="on-n"></div> -->
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.struktur { 
  background: var(--W); 
}

/* Wrapper untuk mencegah layout berantakan di layar kecil */
.org-wrapper { 
  width: 100%; 
  overflow-x: auto; 
  padding-bottom: 20px; 
}

.org-tree {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 40px; /* Jarak vertikal antar level */
  position: relative;
  z-index: 2;
  margin-top: 10px;
  min-width: max-content;
  margin: 0 auto;
}

.org-row { 
  display: flex; 
  gap: 24px; /* Jarak horizontal antar kotak */
  position: relative; 
}

/* ════════════════════════════════════════
   LOGIKA GARIS (CSS MAGIC)
════════════════════════════════════════ */

/* 1. Menggambar Garis Cabang (Fork) Horizontal ke kotak */
.org-row.branch::before {
  content: "";
  position: absolute;
  top: -20px;
  left: 50%;
  transform: translateX(-50%);
  /* Hitungan presisi: 100% lebar baris dikurangi 1 lebar kotak, garis akan jatuh tepat di tengah kotak! */
  width: calc(100% - 240px); 
  height: 20px;
  border-top: 2px solid var(--BRD);
  border-left: 2px solid var(--BRD);
  border-right: 2px solid var(--BRD);
  border-radius: 4px 4px 0 0;
  z-index: 1;
  box-sizing: border-box;
}

/* 2. Menggambar Garis Tulang Punggung (Spine) Vertikal di tengah */
.org-row.has-spine::after {
  content: "";
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  width: 2px;
  background: var(--BRD);
  z-index: 0;
}

/* Spine khusus Level 1 (Turun dari bawah kotak) */
.org-row.has-spine:not(.branch)::after {
  top: 100%;
  height: 20px;
}

/* Spine untuk Level 2 & 3 (Menembus dari cabang horizontal ke bawah gap) */
.org-row.branch.has-spine::after {
  top: -20px;
  height: calc(100% + 40px);
}

/* ════════════════════════════════════════
   STYLING KOTAK (NODE)
════════════════════════════════════════ */
.on {
  background: var(--G);
  border: 1.5px solid var(--BRD);
  border-radius: 10px;
  padding: 16px 20px;
  text-align: center;
  width: 240px; /* Ukuran statis diperlukan agar hitungan garis presisi */
  box-sizing: border-box;
  transition: all 0.25s;
  cursor: default;
  position: relative;
  z-index: 2; /* Kotak harus menutupi garis spine yang lewat di tengahnya */
}

.on:hover { 
  border-color: var(--Y); 
  background: var(--W); 
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08); 
}

.on.top { 
  background: var(--INK); 
  border-color: var(--INK); 
}

.on.top .on-t { color: var(--Y); }
.on.top .on-n { color: #fff; }

.on-t { 
  font-size: 10px; 
  font-weight: 700; 
  color: var(--B); 
  text-transform: uppercase; 
  letter-spacing: 0.1em; 
  margin-bottom: 5px; 
}

.on-n { 
  font-size: 13.5px; 
  font-weight: 700; 
  color: var(--INK); 
  line-height: 1.3; 
}

.on-d { 
  font-size: 11px; 
  color: var(--DIM); 
  margin-top: 4px; 
}
</style>