<script setup>
import { computed } from "vue";

const props = defineProps({
    items: {
        type: Array,
        required: true,
        validator: (arr) =>
            arr.every((item) => item.icon && item.label && item.value),
    },
    theme: {
        type: String,
        default: "light",
        validator: (v) => ["light", "dark", "accent"].includes(v),
    },
});

const panelClasses = computed(() => {
    const classes = {
        light: "bg-white/7 border-white/12 backdrop-blur-sm",
        dark: "bg-black/7 border-black/8 backdrop-blur-sm",
        accent: "bg-yellow-500/5 border-yellow-500/10 backdrop-blur-sm",
    };
    return classes[props.theme] || classes.light;
});
</script>

<template>
    <div :class="`border rounded-3xl overflow-hidden ${panelClasses}`">
        <div class="grid grid-cols-2 gap-px bg-white/6 p-px">
            <div
                v-for="(item, idx) in props.items"
                :key="idx"
                class="flex flex-col items-start gap-2 px-5 py-6 transition-all hover:shadow-sm"
                :class="
                    props.theme === 'light'
                        ? 'bg-white/4'
                        : props.theme === 'dark'
                          ? 'bg-black/4'
                          : 'bg-yellow-500/3'
                "
            >
                <div class="text-lg">{{ item.icon }}</div>
                <div class="font-serif text-3xl font-normal">
                    {{ item.value
                    }}<span v-if="item.suffix" class="text-lg">{{
                        item.suffix
                    }}</span>
                </div>
                <div
                    class="text-xs font-semibold uppercase tracking-wider text-white/55"
                >
                    {{ item.label }}
                </div>
            </div>
        </div>
    </div>
</template>
