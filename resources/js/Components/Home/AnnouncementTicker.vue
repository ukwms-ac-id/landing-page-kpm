<script setup>
import { ref, computed } from "vue";

const props = defineProps({
    items: {
        type: Array,
        default: () => [
            "🔔 Pendaftaran AMI Semester Genap 2024/2025 dibuka — Deadline 30 Juni 2025",
            "🏅 UKWMS Raih Akreditasi Unggul BAN-PT — Selamat & Terima kasih atas kerja keras seluruh sivitas",
            "📋 Workshop Penulisan Dokumen SPMI — 12 Juni 2025, Aula Benediktus",
            "🌐 3 Prodi UKWMS berhasil raih Akreditasi Internasional FIBAA",
        ],
    },
    speed: {
        type: Number,
        default: 30,
    },
});

const isPaused = ref(false);
const animationDuration = computed(() => `${props.speed}s`);
</script>

<template>
    <div
        class="ticker"
        @mouseenter="isPaused = true"
        @mouseleave="isPaused = false"
    >
        <div
            class="ticker-track"
            :style="{
                animationPlayState: isPaused ? 'paused' : 'running',
                animationDuration: animationDuration,
            }"
        >
            <!-- Render items twice for seamless loop -->
            <template v-for="(_, iteration) in 2" :key="iteration">
                <div
                    v-for="(item, idx) in items"
                    :key="`${iteration}-${idx}`"
                    class="ticker-item"
                >
                    <span class="ticker-dot" />{{ item }}
                </div>
            </template>
        </div>
    </div>
</template>

<style scoped>
.ticker {
    background: var(--Y);
    padding: 10px 0;
    overflow: hidden;
    position: relative;
}

.ticker::before,
.ticker::after {
    content: "";
    position: absolute;
    top: 0;
    height: 100%;
    width: 80px;
    z-index: 2;
}

.ticker::before {
    left: 0;
    background: linear-gradient(to right, var(--Y), transparent);
}

.ticker::after {
    right: 0;
    background: linear-gradient(to left, var(--Y), transparent);
}

.ticker-track {
    display: flex;
    gap: 64px;
    animation: ticker-scroll linear infinite;
    width: max-content;
}

@keyframes ticker-scroll {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
}

.ticker-item {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 13px;
    font-weight: 600;
    color: var(--INK);
    white-space: nowrap;
}

.ticker-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--R);
    flex-shrink: 0;
}
</style>
