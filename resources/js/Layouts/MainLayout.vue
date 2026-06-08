<script setup>
import { ref } from 'vue';

const isTickerPaused = ref(false);
const activeNav = ref('Beranda');

const navLinks = ['Beranda', 'Profil ▾', 'Tupoksi ▾', 'Akreditasi', 'Dokumen ▾', 'Berita', 'Kontak'];
</script>

<template>
  <div>
    <div class="topbar">
      <div class="tb-inner">
        <div class="tb-left">
          <a href="#">📍 Jl. Dinoyo 42–44, Surabaya 60265</a>
          <span class="tb-sep">|</span>
          <a href="mailto:kpm@ukwms.ac.id">✉ kpm@ukwms.ac.id</a>
          <span class="tb-sep">|</span>
          <a href="tel:031">☎ (031) 5678-478 ext. 120</a>
        </div>
        <div class="tb-right">
          <a href="#" class="tb-social">IG</a>
          <a href="#" class="tb-social">YT</a>
          <a href="#" class="tb-social">LI</a>
          <a href="#" class="tb-social">FB</a>
          <span class="tb-sep" style="margin: 0 4px">|</span>
          <a href="https://ukwms.ac.id" style="color: rgba(255, 255, 255, 0.8); font-weight: 600">↗ ukwms.ac.id</a>
        </div>
      </div>
    </div>

    <div class="ticker" @mouseenter="isTickerPaused = true" @mouseleave="isTickerPaused = false">
      <div class="ticker-track" :style="{ animationPlayState: isTickerPaused ? 'paused' : 'running' }">
        <div class="ticker-item" v-for="i in 2" :key="i">
          <span class="ticker-item"><span class="ticker-dot"></span>🔔 Pendaftaran AMI Semester Genap 2024/2025 dibuka — Deadline 30 Juni 2025</span>
          <span class="ticker-item"><span class="ticker-dot"></span>🏅 UKWMS Raih Akreditasi Unggul BAN-PT — Selamat & Terimakasih atas kerja keras seluruh sivitas</span>
          <span class="ticker-item"><span class="ticker-dot"></span>📋 Workshop Penulisan Dokumen SPMI — 12 Juni 2025, Aula Benediktus</span>
          <span class="ticker-item"><span class="ticker-dot"></span>🌐 3 Prodi UKWMS berhasil raih Akreditasi Internasional FIBAA</span>
        </div>
      </div>
    </div>

    <nav>
      <div class="nav-inner">
        <a href="#" class="brand">
          <div class="brand-pill">KPM</div>
          <div class="brand-txt">
            <div class="nm">KPM UKWMS</div>
            <div class="sb">Kantor Penjaminan Mutu</div>
          </div>
        </a>
        <ul class="nav-links">
          <li v-for="link in navLinks" :key="link">
            <a href="#" :class="{ act: activeNav === link }" @click.prevent="activeNav = link">{{ link }}</a>
          </li>
        </ul>
        <div class="nav-end">
          <a href="#" class="btn-nav-berita">📰 Berita</a>
          <a href="#" class="btn-nav-spmi">🔗 Sistem SPMI</a>
        </div>
      </div>
    </nav>

    <main>
      <slot />
    </main>

    <footer>
      <div class="ft-inner">
        <div class="ft-grid">
          <div>
            <div class="ft-logo">
              <div class="ft-logo-pill">KPM</div>
              <div class="ft-logo-txt">
                <div class="nm">KPM UKWMS</div>
                <div class="sb">Kantor Penjaminan Mutu</div>
              </div>
            </div>
            <p class="ft-about">Kantor Penjaminan Mutu Universitas Katolik Widya Mandala Surabaya berkomitmen membangun budaya mutu yang berkelanjutan demi menghasilkan lulusan unggul, berkarakter Katolik, dan berdaya saing global.</p>
            <div class="ft-soc">
              <a href="#" class="ft-sb">IG</a>
              <a href="#" class="ft-sb">YT</a>
              <a href="#" class="ft-sb">LI</a>
              <a href="#" class="ft-sb">FB</a>
            </div>
          </div>
          <div class="ft-col">
            <h4>Navigasi</h4>
            <ul>
              <li><a href="#">Beranda</a></li><li><a href="#">Sejarah KPM</a></li><li><a href="#">Visi & Misi</a></li>
              <li><a href="#">Struktur Organisasi</a></li><li><a href="#">Tupoksi</a></li><li><a href="#">Berita & Artikel</a></li>
            </ul>
          </div>
          <div class="ft-col">
            <h4>Dokumen</h4>
            <ul>
              <li><a href="#">Kebijakan SPMI</a></li><li><a href="#">Standar SPMI</a></li><li><a href="#">Formulir & SOP</a></li>
              <li><a href="#">Laporan AMI</a></li><li><a href="#">Akreditasi Prodi</a></li><li><a href="#">Regulasi</a></li>
            </ul>
          </div>
          <div class="ft-col">
            <h4>Kontak Kami</h4>
            <div class="ft-contact-item"><div class="ft-ci">📍</div><div class="ft-ct"><strong>Alamat</strong>Jl. Dinoyo 42–44, Surabaya 60265, Jawa Timur</div></div>
            <div class="ft-contact-item"><div class="ft-ci">📞</div><div class="ft-ct"><strong>Telepon</strong>(031) 5678-478 ext. 120</div></div>
            <div class="ft-contact-item"><div class="ft-ci">✉</div><div class="ft-ct"><strong>Email</strong>kpm@ukwms.ac.id</div></div>
            <div class="ft-contact-item"><div class="ft-ci">🕐</div><div class="ft-ct"><strong>Jam Operasional</strong>Senin–Jumat: 08.00–16.00 WIB</div></div>
          </div>
        </div>
        <div class="ft-bottom">
          <p>© 2025 Kantor Penjaminan Mutu — <a href="https://ukwms.ac.id">Universitas Katolik Widya Mandala Surabaya</a>. All rights reserved.</p>
          <p>Dikembangkan oleh <a href="#">UKWMS IT Development</a></p>
        </div>
      </div>
      <div class="ft-bar"></div>
    </footer>
  </div>
</template>

<style scoped>
.topbar { background: var(--B); color: #fff; font-size: 12px; font-weight: 500; padding: 9px 0; letter-spacing: 0.02em; }
.tb-inner { max-width: 1280px; margin: 0 auto; padding: 0 40px; display: flex; justify-content: space-between; align-items: center; gap: 12px; }
.tb-left { display: flex; gap: 20px; align-items: center; }
.tb-left a { color: rgba(255, 255, 255, 0.8); transition: color 0.2s; }
.tb-left a:hover { color: #fff; }
.tb-sep { color: rgba(255, 255, 255, 0.25); }
.tb-right { display: flex; gap: 10px; align-items: center; }
.tb-social { width: 26px; height: 26px; border-radius: 5px; border: 1px solid rgba(255, 255, 255, 0.25); display: inline-flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 800; color: rgba(255, 255, 255, 0.7); transition: all 0.2s; }
.tb-social:hover { background: rgba(255, 255, 255, 0.15); color: #fff; border-color: rgba(255, 255, 255, 0.5); }

.ticker { background: var(--Y); padding: 10px 0; overflow: hidden; position: relative; }
.ticker::before, .ticker::after { content: ""; position: absolute; top: 0; height: 100%; width: 80px; z-index: 2; }
.ticker::before { left: 0; background: linear-gradient(to right, var(--Y), transparent); }
.ticker::after { right: 0; background: linear-gradient(to left, var(--Y), transparent); }
.ticker-track { display: flex; gap: 64px; animation: ticker-scroll 30s linear infinite; width: max-content; }
@keyframes ticker-scroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }
.ticker-item { display: flex; align-items: center; gap: 12px; font-size: 13px; font-weight: 600; color: var(--INK); white-space: nowrap; }
.ticker-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--R); flex-shrink: 0; }

nav { background: var(--W); border-bottom: 3px solid var(--Y); position: sticky; top: 0; z-index: 200; box-shadow: 0 2px 24px rgba(0, 0, 0, 0.07); }
.nav-inner { max-width: 1280px; margin: 0 auto; padding: 0 40px; display: flex; align-items: stretch; height: 76px; }
.brand { display: flex; align-items: center; gap: 14px; padding-right: 32px; border-right: 1px solid var(--BRD); flex-shrink: 0; }
.brand-pill { background: var(--Y); border-radius: 10px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; font-family: "DM Serif Display", serif; font-size: 18px; color: var(--INK); font-weight: 400; letter-spacing: -1px; flex-shrink: 0; position: relative; overflow: hidden; }
.brand-pill::after { content: ""; position: absolute; top: -8px; right: -8px; width: 22px; height: 22px; border-radius: 50%; background: var(--R); opacity: 0.35; }
.brand-txt .nm { font-family: "DM Serif Display", serif; font-size: 20px; color: var(--INK); line-height: 1; }
.brand-txt .sb { font-size: 10px; color: var(--DIM); font-weight: 500; text-transform: uppercase; letter-spacing: 0.1em; margin-top: 2px; }
.nav-links { display: flex; align-items: stretch; list-style: none; flex: 1; padding-left: 24px; }
.nav-links > li > a { display: flex; align-items: center; padding: 0 15px; font-size: 13.5px; font-weight: 600; color: var(--MID); border-bottom: 3px solid transparent; margin-bottom: -3px; transition: all 0.2s; white-space: nowrap; height: 100%;}
.nav-links > li > a:hover, .nav-links > li > a.act { color: var(--INK); border-bottom-color: var(--R); }
.nav-end { display: flex; align-items: center; gap: 10px; margin-left: auto; padding-left: 16px; }
.btn-nav-spmi { background: var(--Y); color: var(--INK); padding: 10px 20px; border-radius: 8px; font-size: 13px; font-weight: 700; letter-spacing: 0.02em; display: inline-flex; align-items: center; gap: 7px; transition: all 0.2s; border: none; cursor: pointer; }
.btn-nav-spmi:hover { background: var(--Y2); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(253, 219, 0, 0.4); }
.btn-nav-berita { background: transparent; color: var(--R); border: 1.5px solid var(--R); padding: 9px 18px; border-radius: 8px; font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s; }
.btn-nav-berita:hover { background: var(--R); color: #fff; }

footer { background: #111118; color: #fff; padding: 72px 0 0; }
.ft-inner { max-width: 1280px; margin: 0 auto; padding: 0 40px; }
.ft-grid { display: grid; grid-template-columns: 2.2fr 1fr 1fr 1.6fr; gap: 48px; padding-bottom: 48px; border-bottom: 1px solid rgba(255, 255, 255, 0.07); }
.ft-logo { display: flex; align-items: center; gap: 14px; margin-bottom: 20px; }
.ft-logo-pill { width: 48px; height: 48px; border-radius: 10px; background: var(--Y); display: flex; align-items: center; justify-content: center; font-family: "DM Serif Display", serif; font-size: 18px; color: var(--INK); }
.ft-logo-txt .nm { font-family: "DM Serif Display", serif; font-size: 20px; color: #fff; }
.ft-logo-txt .sb { font-size: 10px; color: #555; text-transform: uppercase; letter-spacing: 0.1em; margin-top: 2px; }
.ft-about { font-size: 13.5px; color: #666; line-height: 1.8; margin-bottom: 24px; }
.ft-soc { display: flex; gap: 8px; }
.ft-sb { width: 36px; height: 36px; border-radius: 8px; border: 1px solid #2a2a35; display: flex; align-items: center; justify-content: center; color: #666; font-size: 12px; font-weight: 700; transition: all 0.2s; }
.ft-sb:hover { border-color: var(--Y); color: var(--Y); background: rgba(253, 219, 0, 0.06); }
.ft-col h4 { font-size: 12px; font-weight: 700; color: #fff; text-transform: uppercase; letter-spacing: 0.12em; margin-bottom: 20px; }
.ft-col ul { list-style: none; }
.ft-col ul li { margin-bottom: 10px; }
.ft-col ul li a { font-size: 13.5px; color: #666; transition: all 0.2s; display: flex; align-items: center; gap: 7px; }
.ft-col ul li a:hover { color: #fff; padding-left: 4px; }
.ft-col ul li a::before { content: "›"; font-size: 14px; color: var(--Y); transition: all 0.2s; }
.ft-contact-item { display: flex; gap: 12px; align-items: flex-start; margin-bottom: 14px; }
.ft-ci { width: 32px; height: 32px; border-radius: 8px; background: rgba(253, 219, 0, 0.08); display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0; }
.ft-ct { font-size: 13px; color: #666; line-height: 1.5; }
.ft-ct strong { color: #bbb; display: block; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 2px; }
.ft-bottom { padding: 22px 0; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
.ft-bottom p { font-size: 12.5px; color: #444; }
.ft-bottom a { color: var(--Y); }
.ft-bar { height: 4px; background: linear-gradient(90deg, var(--Y) 0%, var(--R) 45%, var(--B) 100%); }
</style>