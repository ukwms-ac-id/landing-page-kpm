<script setup>
import { ref } from "vue";

defineProps({
    brand: {
        type: Object,
        default: () => ({
            name: "KPM",
            fullName: "Kantor Penjaminan Mutu",
            subtext: "UKWMS",
        }),
    },
    navLinks: {
        type: Array,
        default: () => [
            { label: "Beranda", href: "#", active: true },
            { label: "Profile", href: "#" },
            { label: "SPMI", href: "#" },
            { label: "AMI", href: "#" },
            { label: "Berita", href: "#" },
        ],
    },
    actionButtons: {
        type: Array,
        default: () => [
            { label: "SPMI", variant: "primary", icon: "📋" },
            { label: "Berita", variant: "outline", icon: "📰" },
        ],
    },
});

const mobileMenuOpen = ref(false);
</script>

<template>
    <nav
        class="sticky top-0 z-50 border-b-4 border-[var(--Y)] bg-white shadow-sm"
    >
        <div class="mx-auto flex max-w-5xl items-stretch px-10">
            <!-- Brand -->
            <div
                class="flex items-center gap-3 border-r border-[var(--BRD)] pr-8 py-4"
            >
                <div
                    class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[var(--Y)] text-lg font-serif text-[var(--INK)]"
                >
                    {{ brand.name }}
                </div>
                <div class="flex flex-col gap-0">
                    <div
                        class="font-serif text-xl font-normal text-[var(--INK)]"
                    >
                        {{ brand.fullName }}
                    </div>
                    <div
                        class="text-xs font-medium uppercase text-[var(--DIM)] tracking-wide"
                    >
                        {{ brand.subtext }}
                    </div>
                </div>
            </div>

            <!-- Nav Links -->
            <ul class="flex flex-1 list-none items-stretch pl-6">
                <li
                    v-for="link in navLinks"
                    :key="link.label"
                    class="flex items-center"
                >
                    <a
                        :href="link.href"
                        class="flex h-full items-center border-b-4 border-transparent px-4 text-xs font-bold text-[var(--MID)] transition-all hover:border-[var(--R)] hover:text-[var(--INK)]"
                        :class="
                            link.active && 'border-[var(--R)] text-[var(--INK)]'
                        "
                    >
                        {{ link.label }}
                    </a>
                </li>
            </ul>

            <!-- Action Buttons -->
            <div class="ml-auto flex items-center gap-2">
                <button
                    v-for="btn in actionButtons"
                    :key="btn.label"
                    class="flex items-center gap-1 rounded-lg px-5 py-2.5 text-xs font-bold transition-all"
                    :class="
                        btn.variant === 'primary'
                            ? 'bg-[var(--Y)] text-[var(--INK)] hover:bg-[var(--Y2)] hover:shadow-md'
                            : 'border-2 border-[var(--R)] text-[var(--R)] hover:bg-[var(--R)] hover:text-white'
                    "
                >
                    <span v-if="btn.icon" class="text-sm">{{ btn.icon }}</span>
                    {{ btn.label }}
                </button>
            </div>
        </div>
    </nav>
</template>
