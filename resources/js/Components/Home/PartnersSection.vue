<template>
  <section class="mitra" style="padding: 64px 0">
    <div class="c">
      <div class="mitra-lbl ri">Lembaga Akreditasi & Mitra Strategis KPM UKWMS</div>
      <div class="mitra-row ri">
        <div class="mit-cell"><div class="mit-name">BAN-PT<div class="mit-sub">Nasional</div></div></div>
        <div class="mit-cell"><div class="mit-name">LAM DIKTI<div class="mit-sub">Nasional</div></div></div>
        <div class="mit-cell"><div class="mit-name">LAM PTKES<div class="mit-sub">Kesehatan</div></div></div>
        <div class="mit-cell"><div class="mit-name" style="color: var(--MID)">FIBAA<div class="mit-sub">International</div></div></div>
        <div class="mit-cell"><div class="mit-name" style="color: var(--MID)">AUN-QA<div class="mit-sub">ASEAN Network</div></div></div>
        <div class="mit-cell"><div class="mit-name" style="color: var(--MID)">LAMDIK<div class="mit-sub">Dikti</div></div></div>
        <div class="mit-cell"><div class="mit-name" style="color: var(--MID)">ISO 9001<div class="mit-sub">:2015</div></div></div>
        <div class="mit-cell"><div class="mit-name" style="color: var(--MID)">Kemendiktisaintek<div class="mit-sub">Nasional</div></div></div>
        <div class="mit-cell"><div class="mit-name" style="color: var(--MID)">LLDIKTI<div class="mit-sub">Wil. VII</div></div></div>
        <div class="mit-cell"><div class="mit-name" style="color: var(--MID)">APTKI<div class="mit-sub">Nasional</div></div></div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.mitra { background: var(--G); }
.mitra-lbl { text-align: center; font-size: 11px; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: var(--DIM); margin-bottom: 32px; }
.mitra-row { display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 0; border: 1px solid var(--BRD); border-radius: 14px; overflow: hidden; background: var(--W); }
.mit-cell { flex: 0 0 20%; padding: 28px 20px; display: flex; align-items: center; justify-content: center; border-right: 1px solid var(--BRD); border-bottom: 1px solid var(--BRD); transition: background 0.2s; }
.mit-cell:nth-child(5n) { border-right: none; }
.mit-cell:nth-last-child(-n + 5) { border-bottom: none; }
.mit-cell:hover { background: var(--G); }
.mit-name { font-size: 13px; font-weight: 800; color: var(--B); text-align: center; line-height: 1.4; }
.mit-sub { font-size: 10px; font-weight: 400; color: var(--DIM); }
</style>