<script setup>
import { computed } from "vue";
import SlideBadge from "../UI/SlideBadge.vue";
import StatPanel from "../UI/StatPanel.vue";
import { useSlider } from "../../composables/useSlider.js";

const props = defineProps({
    slides: {
        type: Array,
        default: () => [
            {
                id: 1,
                theme: "blue",
                badge: { label: "Kantor Penjaminan Mutu UKWMS", icon: "🔴" },
                title: "Membangun <em>Budaya Mutu</em><br />yang Berkelanjutan",
                description:
                    "Mendorong seluruh sivitas akademika UKWMS untuk senantiasa berorientasi pada standar mutu tertinggi...",
                buttons: [
                    { label: "📋 Profil KPM", variant: "primary" },
                    { label: "Lihat Dokumen SPMI →", variant: "secondary" },
                ],
                stats: [
                    {
                        icon: "🎓",
                        value: "A",
                        suffix: "+",
                        label: "Akreditasi Institusi",
                    },
                    {
                        icon: "🏛️",
                        value: "40",
                        suffix: "+",
                        label: "Prodi Terakreditasi",
                    },
                    { icon: "📋", value: "6", label: "Siklus AMI" },
                    {
                        icon: "📄",
                        value: "200",
                        suffix: "+",
                        label: "Dokumen SPMI",
                    },
                ],
            },
            {
                id: 2,
                theme: "red",
                badge: { label: "Audit Mutu Internal — AMI 2025", icon: "🔴" },
                title: "Siklus AMI <em>Semester Genap</em><br />2024/2025 Dibuka",
                description:
                    "Pendaftaran Audit Mutu Internal bagi seluruh program studi dan unit kerja di lingkungan UKWMS kini resmi dibuka...",
                buttons: [
                    { label: "📝 Daftar Sekarang", variant: "primary" },
                    { label: "Panduan AMI →", variant: "secondary" },
                ],
                stats: [
                    {
                        icon: "📅",
                        value: "30 Jun",
                        label: "Deadline Pendaftaran",
                    },
                    {
                        icon: "🏫",
                        value: "10",
                        suffix: "+",
                        label: "Fakultas & Unit",
                    },
                    {
                        icon: "👥",
                        value: "64",
                        suffix: "+",
                        label: "Auditor Internal",
                    },
                    { icon: "✅", value: "6", label: "Siklus Berhasil" },
                ],
            },
            {
                id: 3,
                theme: "gold",
                badge: { label: "Prestasi Akreditasi Terbaru", icon: "🔴" },
                title: "UKWMS Raih <em>Akreditasi</em><br />Unggul BAN-PT",
                description:
                    "Universitas Katolik Widya Mandala Surabaya resmi meraih predikat Akreditasi Unggul...",
                buttons: [
                    { label: "🏅 Baca Selengkapnya", variant: "primary" },
                    { label: "Dokumen Akreditasi →", variant: "secondary" },
                ],
                stats: [
                    { icon: "🌟", value: "Unggul", label: "Status BAN-PT" },
                    { icon: "🌐", value: "3", label: "Prodi FIBAA Int'l" },
                    {
                        icon: "📊",
                        value: "98",
                        suffix: "%",
                        label: "Prodi Akreditasi A/Unggul",
                    },
                    {
                        icon: "🎯",
                        value: "Top",
                        suffix: "10",
                        label: "PTS Terbaik Jawa Timur",
                    },
                ],
            },
        ],
    },
});

const totalSlides = computed(() => props.slides.length);
const slider = useSlider(totalSlides.value, 6000);

const currentSlideData = computed(
    () => props.slides[slider.currentSlide.value],
);

const getThemeClasses = (theme) => {
    const themes = {
        blue: {
            bg: "bg-gradient-to-br from-blue-950 via-blue-900 to-blue-500",
            textLight: "text-white",
            accentColor: "var(--Y)",
        },
        red: {
            bg: "bg-gradient-to-br from-red-950 via-red-900 to-yellow-500",
            textLight: "text-white",
            accentColor: "var(--Y)",
        },
        gold: {
            bg: "bg-gradient-to-br from-amber-950 via-amber-800 to-yellow-500",
            textLight: "text-black",
            accentColor: "var(--R)",
        },
    };
    return themes[theme] || themes.blue;
};

const slideTheme = computed(() =>
    getThemeClasses(currentSlideData.value?.theme || "blue"),
);
</script>

<template>
    <div
        class="relative h-screen overflow-hidden"
        @mouseenter="slider.isPaused = true"
        @mouseleave="slider.isPaused = false"
        @touchstart.passive="slider.touchStart"
        @touchend.passive="slider.touchEnd"
    >
        <!-- Progress Bar -->
        <div
            ref="slider.progressBar"
            class="absolute top-0 left-0 h-1 bg-[var(--Y)] z-20"
            :style="{ animation: `progress-run 6000ms linear` }"
        />

        <!-- Slides Container -->
        <div
            class="flex h-full transition-transform duration-900 ease-custom"
            :style="{ transform: `translateX(-${slider.currentSlide * 100}%)` }"
        >
            <div
                v-for="slide in slides"
                :key="slide.id"
                class="relative min-w-full h-full flex items-center overflow-hidden"
                :class="getThemeClasses(slide.theme).bg"
            >
                <!-- Mesh overlay -->
                <div
                    class="absolute inset-0 opacity-5 pointer-events-none"
                    style="
                        background: radial-gradient(
                            ellipse 60% 80% at 80% 50%,
                            rgba(255, 255, 255, 0.05),
                            transparent 60%
                        );
                    "
                />

                <!-- Grid background -->
                <div
                    class="absolute inset-0 opacity-5 pointer-events-none"
                    style="
                        background-image:
                            linear-gradient(
                                rgba(255, 255, 255, 0.04) 1px,
                                transparent 1px
                            ),
                            linear-gradient(
                                90deg,
                                rgba(255, 255, 255, 0.04) 1px,
                                transparent 1px
                            );
                        background-size: 72px 72px;
                        animation: grid-drift 20s linear infinite;
                    "
                />

                <!-- Floating orbs -->
                <div
                    class="absolute top-0 right-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl opacity-20 -mr-20 -mt-20 pointer-events-none animate-pulse"
                />
                <div
                    class="absolute bottom-0 left-1/4 w-72 h-72 bg-white rounded-full blur-3xl opacity-10 pointer-events-none animate-pulse"
                    style="animation-delay: -3s"
                />

                <!-- Content -->
                <div
                    class="relative z-10 mx-auto max-w-5xl px-10 grid grid-cols-3 gap-12 items-center w-full"
                >
                    <!-- Left Content -->
                    <div class="col-span-2">
                        <SlideBadge
                            :label="slide.badge.label"
                            :icon="slide.badge.icon"
                            :theme="slide.theme === 'gold' ? 'accent' : 'dark'"
                            class="mb-6"
                        />

                        <h1
                            class="text-5xl font-serif font-normal leading-tight mb-4 text-white"
                            v-html="slide.title"
                        />

                        <p
                            class="text-lg leading-relaxed mb-8"
                            :class="
                                slide.theme === 'gold'
                                    ? 'text-black/65'
                                    : 'text-white/75'
                            "
                        >
                            {{ slide.description }}
                        </p>

                        <div class="flex gap-3 flex-wrap">
                            <button
                                v-for="(btn, idx) in slide.buttons"
                                :key="idx"
                                :class="`inline-flex items-center gap-2 rounded-lg font-bold transition-all px-6 py-3 ${
                                    btn.variant === 'primary'
                                        ? 'bg-[var(--Y)] text-black hover:shadow-lg'
                                        : 'border-2 border-white/30 text-white hover:bg-white/10'
                                }`"
                            >
                                {{ btn.label }}
                            </button>
                        </div>
                    </div>

                    <!-- Right Stats Panel -->
                    <div class="col-span-1">
                        <StatPanel
                            :items="slide.stats"
                            :theme="slide.theme === 'gold' ? 'dark' : 'light'"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Controls -->
        <div
            class="absolute bottom-7 left-1/2 transform -translate-x-1/2 z-20 flex items-center gap-3"
        >
            <button
                @click="slider.prevSlide"
                class="flex items-center justify-center w-10 h-10 rounded-full bg-white/12 border border-white/20 text-white hover:bg-white/25 transition-all backdrop-blur-sm"
            >
                ‹
            </button>
            <button
                v-for="i in totalSlides"
                :key="i"
                @click="slider.goTo(i - 1)"
                class="h-2.5 rounded-full transition-all"
                :class="
                    slider.currentSlide === i - 1
                        ? 'w-7 bg-[var(--Y)] rounded-sm'
                        : 'w-2.5 bg-white/35 hover:bg-white/50'
                "
            />
            <button
                @click="slider.nextSlide"
                class="flex items-center justify-center w-10 h-10 rounded-full bg-white/12 border border-white/20 text-white hover:bg-white/25 transition-all backdrop-blur-sm"
            >
                ›
            </button>
        </div>
    </div>
</template>

<style scoped>
.ease-custom {
    transition-timing-function: cubic-bezier(0.77, 0, 0.18, 1);
}

@keyframes grid-drift {
    from {
        transform: translate(0, 0);
    }
    to {
        transform: translate(72px, 72px);
    }
}

@keyframes progress-run {
    from {
        width: 0;
    }
    to {
        width: 100%;
    }
}
</style>
