<script setup>
import NavLink from "@/Components/NavLink.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps(["message", "isAdmin"]);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard - {{ message }}
            </h2>
        </template>

        <div class="py-12 bg-blue-950">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex gap-4 bg-gray-200 p-6">
                    <NavLink
                        v-if="isAdmin"
                        :href="route('admin.users')"
                        :active="true"
                    >
                        Users List
                    </NavLink>
                    <NavLink
                        v-if="isAdmin"
                        :href="route('admin.users')"
                        :active="false"
                    >
                        Questions
                    </NavLink>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
