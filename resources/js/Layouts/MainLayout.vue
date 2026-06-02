<script setup>
import { onMounted } from 'vue';

// Logika Scroll Reveal (diambil dari Vanilla JS mockup)
onMounted(() => {
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
    <div class="min-h-screen">
        <div class="topbar">
            </div>

        <div class="ticker">
            </div>

        <nav>
            </nav>

        <main>
            <slot />
        </main>

        <footer>
            </footer>
    </div>
</template>