<script setup>
import { computed } from "vue";

defineProps({
    links: {
        type: Array,
        default: () => [
            { label: "Beranda", href: "#" },
            { label: "Profile", href: "#" },
            { label: "SPMI", href: "#" },
        ],
    },
    socialLinks: {
        type: Array,
        default: () => [
            { icon: "f", href: "#" },
            { icon: "ig", href: "#" },
            { icon: "tw", href: "#" },
        ],
    },
});

const bgStyle = "bg-[var(--B)] text-white";
const linkClasses =
    "text-opacity-80 hover:text-opacity-100 transition-all text-xs font-medium";
</script>

<template>
    <div :class="`${bgStyle} py-2`">
        <div
            class="mx-auto flex max-w-5xl items-center justify-between gap-3 px-10"
        >
            <!-- Left Links -->
            <div class="flex items-center gap-5">
                <a
                    v-for="(link, idx) in links"
                    :key="idx"
                    :href="link.href"
                    :class="linkClasses"
                >
                    {{ link.label }}
                </a>
            </div>

            <!-- Separator -->
            <div class="h-4 w-px bg-white/25" />

            <!-- Right Social -->
            <div class="flex items-center gap-2">
                <a
                    v-for="(social, idx) in socialLinks"
                    :key="idx"
                    :href="social.href"
                    class="flex h-6 w-6 items-center justify-center rounded border border-white/25 text-[10px] font-bold text-white/70 transition-all hover:border-white/50 hover:bg-white/15 hover:text-white"
                >
                    {{ social.icon }}
                </a>
            </div>
        </div>
    </div>
</template>
