<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
        default: false,
    },
    theme: {
        type: String,
        default: "light",
        validator(value) {
            return ["light", "dark"].includes(value);
        },
    },
});

const classes = computed(() =>
    props.active && props.theme === "dark"
        ? "text-green"
        : !props.active && props.theme === "dark"
        ? "text-gray-light"
        : props.active && props.theme === "light"
        ? "text-gray-dark"
        : "text-gray"
);
</script>

<template>
    <Link :href="href" class="inline w-fit font-medium" :class="classes">
        <slot />
    </Link>
</template>

<style scoped>
a[disabled="true"] {
    pointer-events: none;
    opacity: 0.5;
}
</style>
