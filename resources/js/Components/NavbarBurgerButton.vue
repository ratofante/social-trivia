<script setup>
defineProps({
    open: {
        type: Boolean,
        required: true,
    },
});
defineEmits(["on-click"]);
</script>

<template>
    <button
        @click="$emit('on-click')"
        class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out z-50"
    >
        <svg
            class="h-6 w-6"
            stroke="currentColor"
            fill="none"
            viewBox="0 0 24 24"
        >
            <path
                :class="{
                    hidden: open,
                    'inline-flex': !open,
                }"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
            />
            <path
                :class="{
                    hidden: !open,
                    'inline-flex': open,
                }"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
            />
        </svg>
    </button>
</template>
