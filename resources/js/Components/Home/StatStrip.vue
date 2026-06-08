<template>
  <div class="stat-strip">
    <div class="c">
      <div class="stat-row">
        <div class="st-item ri">
          <div class="st-ico">🎓</div>
          <div class="st-num">A<span class="st-sup">+</span></div>
          <div class="st-lbl">Akreditasi Institusi</div>
        </div>
        <div class="st-item ri ri-d1">
          <div class="st-ico">🏛️</div>
          <div class="st-num">48<span class="st-sup">+</span></div>
          <div class="st-lbl">Prodi Terakreditasi</div>
        </div>
        <div class="st-item ri ri-d2">
          <div class="st-ico">📋</div>
          <div class="st-num">6</div>
          <div class="st-lbl">Siklus AMI</div>
        </div>
        <div class="st-item ri ri-d3">
          <div class="st-ico">📄</div>
          <div class="st-num">200<span class="st-sup">+</span></div>
          <div class="st-lbl">Dokumen SPMI</div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.stat-strip { background: var(--Y); padding: 48px 0; position: relative; overflow: hidden; }
.stat-strip::before { content: ""; position: absolute; top: -40px; right: -40px; width: 240px; height: 240px; border-radius: 50%; background: rgba(234, 31, 39, 0.12); }
.stat-strip::after { content: ""; position: absolute; bottom: -60px; left: 5%; width: 180px; height: 180px; border-radius: 50%; background: rgba(7, 128, 194, 0.1); }
.stat-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0; position: relative; z-index: 2; }
.st-item { text-align: center; padding: 20px 16px; border-right: 1px solid rgba(0, 0, 0, 0.1); transition: background 0.2s; cursor: default; }
.st-item:last-child { border-right: none; }
.st-item:hover { background: rgba(0, 0, 0, 0.04); border-radius: 12px; }
.st-num { font-family: "DM Serif Display", serif; font-size: 44px; color: var(--INK); line-height: 1; margin-bottom: 6px; }
.st-sup { font-size: 22px; }
.st-lbl { font-size: 12px; font-weight: 600; color: rgba(0, 0, 0, 0.55); text-transform: uppercase; letter-spacing: 0.08em; }
.st-ico { font-size: 22px; margin-bottom: 8px; }
</style>