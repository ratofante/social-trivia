<script setup>
import { computed } from "vue";
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
    "text-xs uppercase px-3 py-1": props.size === "small",
    "text-md capitalize px-4 py-2": props.size != "small",
});
</script>

<template>
    <Link
        :href="href"
        class="inline-flex align-middle h-fit font-serif font-medium capitalize text-md tracking-wide px-4 py-2 border border-transparent rounded-md border-transparent"
        :class="classObject"
    >
        {{ title }}
    </Link>
</template>
