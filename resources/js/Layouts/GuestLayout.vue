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
    <div class="bg-gray-dark pt-12 min-h-screen">
        <slot />
    </div>
</template>
