<script setup>
const props = defineProps({
    size: {
        type: String,
        default: "normal",
        validator(value) {
            return ["normal", "small"].includes(value);
        },
    },
});

const classes =
    props.size === "small"
        ? "text-xs uppercase px-3 py-1"
        : "text-md capitalize px-4 py-2";
</script>

<template>
    <button
        :class="classes"
        class="inline-flex font-semibold justify-center items-center bg-green border border-transparent rounded-sm text-gray hover:bg-gray-700 hover:text-green focus:bg-green/50 focus:text-gray-light active:bg-gray-900 focus:outline-none focus:ring-green focus:ring-2 transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
