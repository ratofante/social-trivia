<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Navbar from "@/Components/Navbar.vue";
import { Link } from "@inertiajs/vue3";

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
    <div class="pt-12">
        <slot />
    </div>
</template>
