<script setup>
import Navbar from "@/Components/Navbar.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Navbar :canLogin="canLogin" :canRegister="canRegister" />
    <div
        class="flex flex-col items-center justify-center bg-gray-dark px-4 pt-12 min-h-screen"
    >
        <slot />
    </div>
</template>
