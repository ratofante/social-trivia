<script setup>
const props = defineProps({
    label: {
        type: String,
        default: "etiqueta",
    },
    value: {
        type: String,
        default: "valor",
    },
    isCardOpen: {
        type: Boolean,
        default: false,
    },
    classes: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <div class="mb-1" :class="classes">
        <div class="font-medium text-sm text-green opacity-75 tracking-wide">
            {{ label }}
        </div>
        <p
            class="text-sm opacity-75 line-clamp-2"
            :class="{ 'line-clamp-none': isCardOpen }"
        >
            {{ value }}
        </p>
    </div>
</template>
