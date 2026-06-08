<script setup>
import { onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import HeroSlider from '@/Components/Home/HeroSlider.vue';
import WelcomeSection from '@/Components/Home/WelcomeSection.vue';
// import StatsStrip from '@/Components/Home/StatsStrip.vue';
import ServiceSection from '@/Components/Home/ServiceSection.vue';
import OrgChartSection from '@/Components/Home/OrgChartSection.vue';
import DocsSection from '@/Components/Home/DocsSection.vue';
import NewsSection from '@/Components/Home/NewsSection.vue';
import CtaBanner from '@/Components/Home/CtaBanner.vue';
import PartnersSection from '@/Components/Home/PartnersSection.vue';
import StatStrip from '@/Components/Home/StatStrip.vue';

onMounted(() => {
  // Intersection Observer Global untuk Scroll Reveal
  const io = new IntersectionObserver((entries) => {
    entries.forEach((en) => {
      if (en.isIntersecting) {
        en.target.classList.add("v");
        io.unobserve(en.target);
      }
    });
  }, { threshold: 0.08 });

  document.querySelectorAll(".ri").forEach((el) => io.observe(el));
});
</script>

<template>
  <Head title="KPM UKWMS — Kantor Penjaminan Mutu" />
  
  <MainLayout>
    <HeroSlider />
    
    <div class="bc-bar">
      <div class="bc-inner">
        <a href="#">UKWMS</a><span class="bc-sep">›</span>
        <a href="#">Unit Kerja</a><span class="bc-sep">›</span>
        <span class="cur">Kantor Penjaminan Mutu</span>
      </div>
    </div>

    <WelcomeSection />
    <StatStrip />
    <ServiceSection />
    <OrgChartSection />
    <DocsSection />
    <NewsSection />
    <CtaBanner />
    <PartnersSection />
  </MainLayout>
</template>

<style scoped>
.bc-bar { background: var(--W); border-bottom: 1px solid var(--BRD); padding: 12px 0; }
.bc-inner { max-width: 1280px; margin: 0 auto; padding: 0 40px; display: flex; align-items: center; gap: 8px; font-size: 12px; font-weight: 600; color: var(--DIM); }
.bc-inner a { color: var(--DIM); transition: color 0.2s; }
.bc-inner a:hover { color: var(--B); }
.bc-inner .cur { color: var(--INK); }
.bc-sep { font-size: 10px; color: var(--BRD); }
</style>