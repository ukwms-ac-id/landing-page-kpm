<script setup>
import { computed } from "vue";

const props = defineProps({
    items: {
        type: Array,
        default: () => [
            { label: "Beranda", href: "#" },
            { label: "Tentang KPM", href: "#" },
            { label: "Halaman Ini", href: "#", current: true },
        ],
    },
});

const breadcrumbTrail = computed(() => props.items || []);
</script>

<template>
    <div class="border-b border-[var(--BRD)] bg-white">
        <div class="mx-auto flex max-w-5xl items-center gap-2 px-10 py-3">
            <span
                v-for="(item, idx) in breadcrumbTrail"
                :key="idx"
                class="flex items-center gap-2 text-xs font-bold"
            >
                <a
                    v-if="!item.current"
                    :href="item.href"
                    class="text-[var(--DIM)] transition-colors hover:text-[var(--B)]"
                >
                    {{ item.label }}
                </a>
                <span v-else class="text-[var(--INK)]">{{ item.label }}</span>
                <span
                    v-if="idx < breadcrumbTrail.length - 1"
                    class="text-xs text-[var(--BRD)]"
                    >/</span
                >
            </span>
        </div>
    </div>
</template>
