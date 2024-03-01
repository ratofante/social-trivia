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
        class="inline-flex font-serif font-medium justify-center items-center border-white border border-transparent rounded-md text-white tracking-wide hover:bg-gray-700 hover:text-green focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-green focus:ring-2 transition ease-in-out duration-150"
    >
        <slot />
    </button>
</template>
