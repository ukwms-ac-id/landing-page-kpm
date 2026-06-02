<script setup>
import { computed } from "vue";

const props = defineProps({
    icon: {
        type: String,
        default: "",
    },
    label: String,
    value: [String, Number],
    suffix: String,
    theme: {
        type: String,
        default: "light",
        validator: (v) => ["light", "dark", "accent"].includes(v),
    },
});

const themeClasses = {
    light: "bg-white/10 text-white border-white/20",
    dark: "bg-black/10 text-black border-black/15",
    accent: "bg-yellow-500/10 text-yellow-600 border-yellow-500/20",
};

const cellClass = computed(
    () => themeClasses[props.theme] || themeClasses.light,
);
</script>

<template>
    <div
        class="flex flex-col items-start gap-2 rounded-lg border p-5 transition-all duration-200 hover:shadow-md"
        :class="cellClass"
    >
        <div v-if="props.icon" class="text-xl">{{ props.icon }}</div>
        <div class="font-serif text-3xl font-normal">
            {{ props.value }}<span v-if="props.suffix" class="text-lg">{{ props.suffix }}</span>
        </div>
        <div class="text-xs font-semibold uppercase tracking-wide">
            {{ props.label }}
        </div>
    </div>
</template>
