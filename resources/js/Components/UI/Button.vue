<script setup>
defineProps({
    variant: {
        type: String,
        default: "primary",
        validator: (v) => ["primary", "secondary", "outline"].includes(v),
    },
    size: {
        type: String,
        default: "md",
        validator: (v) => ["sm", "md", "lg"].includes(v),
    },
    disabled: Boolean,
    loading: Boolean,
});

defineEmits(["click"]);

const sizeClasses = {
    sm: "px-4 py-2 text-xs",
    md: "px-6 py-3 text-sm",
    lg: "px-8 py-4 text-base",
};

const variantClasses = {
    primary:
        "bg-[var(--Y)] text-[var(--INK)] hover:bg-[var(--Y2)] shadow-md hover:shadow-lg",
    secondary: "bg-[var(--R)] text-white hover:bg-opacity-90",
    outline:
        "border-2 border-[var(--BRD)] text-[var(--INK)] hover:border-[var(--B)]",
};
</script>

<template>
    <button
        :disabled="disabled || loading"
        class="inline-flex items-center gap-2 rounded-lg font-bold transition-all duration-200"
        :class="[variantClasses[variant], sizeClasses[size]]"
        @click="$emit('click')"
    >
        <span v-if="loading" class="animate-spin">⟳</span>
        <slot />
    </button>
</template>

<style scoped>
button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}
</style>
