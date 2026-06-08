<template>
  <div class="cta-band">
    <div class="cta-inner">
      <div class="cta-text ri">
        <div class="cta-t">Siap Mulai Perjalanan Menuju<br />Mutu yang Lebih Baik?</div>
        <div class="cta-s">Hubungi tim KPM UKWMS untuk konsultasi, pendampingan akreditasi, atau akses dokumen SPMI.</div>
      </div>
      <div class="cta-actions ri ri-d2">
        <a href="#" class="btn-cta-main">📬 Hubungi Kami</a>
        <a href="#" class="btn-cta-sec">🔗 Sistem SPMI →</a>
      </div>
    </div>
  </div>
</template>

<style scoped>
.cta-band { background: linear-gradient(120deg, var(--INK) 0%, #2d2d3a 100%); padding: 64px 0; position: relative; overflow: hidden; }
.cta-band::before { content: '"Mutu"'; position: absolute; right: -30px; top: -20px; font-family: "DM Serif Display", serif; font-size: 180px; color: rgba(253, 219, 0, 0.04); pointer-events: none; line-height: 1; }
.cta-inner { max-width: 1280px; margin: 0 auto; padding: 0 40px; display: flex; align-items: center; justify-content: space-between; gap: 32px; flex-wrap: wrap; position: relative; z-index: 2; }
.cta-text .cta-t { font-family: "DM Serif Display", serif; font-size: 32px; color: #fff; line-height: 1.2; margin-bottom: 10px; }
.cta-text .cta-s { font-size: 15px; color: rgba(255, 255, 255, 0.6); font-weight: 400; }
.cta-actions { display: flex; gap: 14px; flex-wrap: wrap; }
.btn-cta-main { background: var(--Y); color: var(--INK); padding: 14px 30px; border-radius: 9px; font-size: 14px; font-weight: 700; display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s; }
.btn-cta-main:hover { background: var(--Y2); transform: translateY(-2px); box-shadow: 0 10px 28px rgba(253, 219, 0, 0.4); }
.btn-cta-sec { border: 1.5px solid rgba(255, 255, 255, 0.25); color: #fff; padding: 13px 28px; border-radius: 9px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s; background: transparent; }
.btn-cta-sec:hover { background: rgba(255, 255, 255, 0.08); border-color: rgba(255, 255, 255, 0.5); }
</style>