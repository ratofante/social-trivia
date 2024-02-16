<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import HomeHero from "@/Components/Section/HomeHero.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <GuestLayout :canLogin="canLogin" :canRegister="canRegister">
        <HomeHero />
    </GuestLayout>
</template>

<style></style>
