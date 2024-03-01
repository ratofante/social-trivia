<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import HomeHero from "@/Components/Section/HomeHero.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
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
    question: {
        type: Object,
    },
});

console.log(props.question);
</script>

<template>
    <Head title="Inicio" />

    <GuestLayout :canLogin="canLogin" :canRegister="canRegister">
        <HomeHero />
    </GuestLayout>
</template>
