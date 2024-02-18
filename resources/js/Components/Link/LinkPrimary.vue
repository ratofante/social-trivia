<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

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
    },
});

const classes = computed(() =>
    props.active ? "bg-green text-gray" : "bg-gray-dark text-gray-light"
);
</script>

<template>
    <Link
        :href="href"
        :class="classes"
        class="inline-block font-serif font-medium capitalize text-md tracking-wide px-4 py-2 border border-transparent rounded-md border-transparent"
    >
        {{ title }}
    </Link>
</template>
