<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps(["user"]);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout :user="user">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard - General
            </h2>
        </template>

        <div class="py-12"></div>
    </AuthenticatedLayout>
</template>
