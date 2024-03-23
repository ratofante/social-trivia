<script setup>
import { Link } from "@inertiajs/vue3";
import { reactive } from "vue";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
        default: true,
    },
    size: {
        type: String,
        default: "normal",
        validator(value) {
            return ["normal", "small"].includes(value);
        },
    },
});

const classObject = reactive({
    "bg-green text-gray": props.active,
    "bg-gray-dark text-gray-light": !props.active,
    "text-xs px-3 py-1": props.size === "small",
    "text-md px-4 py-2": props.size != "small",
});
</script>

<template>
    <Link
        :href="href"
        class="inline-flex align-middle h-fit font-medium capitalize text-md border border-transparent rounded-sm"
        :class="classObject"
    >
        {{ title }}
    </Link>
</template>
