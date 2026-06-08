<script setup>
import { computed } from "vue";

const props = defineProps({
    label: String,
    icon: String,
    blinking: {
        type: Boolean,
        default: true,
    },
    theme: {
        type: String,
        default: "light",
        validator: (v) => ["light", "dark", "accent"].includes(v),
    },
});

const themeClasses = {
    light: "bg-yellow-500/15 text-yellow-400 border-yellow-500/30",
    dark: "bg-white/10 text-white border-white/20",
    accent: "bg-black/10 text-black/80 border-black/10",
};

const badgeClass = computed(
    () => themeClasses[props.theme] || themeClasses.light,
);
</script>

<template>
    <div
        class="inline-flex items-center gap-2 rounded-full border px-4 py-1.5 text-xs font-bold uppercase tracking-wide"
        :class="badgeClass"
    >
        <span
            v-if="props.blinking"
            class="inline-block h-1.5 w-1.5 rounded-full animate-pulse"
        />
        <span v-if="props.icon" class="mr-1">{{ props.icon }}</span>
        {{ props.label }}
    </div>
</template>

<style scoped>
@keyframes blink {
    0%,
    100% {
        opacity: 1;
    }
    50% {
        opacity: 0.2;
    }
}

span.animate-pulse {
    animation: blink 1.4s ease-in-out infinite;
}
</style>
