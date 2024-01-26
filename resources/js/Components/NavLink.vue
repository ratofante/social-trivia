<script setup>
import { computed, ref } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});
const isHover = ref(false);
function onMouseEnter(event) {
    isHover.value = true;
}
function onMouseLeave() {
    isHover.value = false;
}
const classes = computed(() =>
    props.active
        ? "flex relative items-center justify-center px-1 pt-1 text-sm font-medium leading-5 text-blue-950 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
        : "flex relative items-center justify-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
);
const borderClasses = computed(() => {
    return isHover.value || props.active
        ? "scale-x-100 origin-left"
        : "scale-x-0 origin-right";
});
</script>

<template>
    <Link
        :href="href"
        :class="classes"
        class="whitespace-nowrap"
        @mouseenter="onMouseEnter"
        @mouseleave="onMouseLeave"
    >
        <slot />
        <div
            ref="border"
            :class="borderClasses"
            class="absolute w-full transition-transform bottom-0 h-0.5 bg-blue-950"
        ></div>
    </Link>
</template>
