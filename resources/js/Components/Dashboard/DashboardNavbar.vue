<script setup>
import NavLink from "@/Components/NavLink.vue";
const props = defineProps(["user"]);
</script>

<template>
    <div class="py-12 bg-blue-950">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-4 bg-gray-200 p-6">
                <NavLink
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                >
                    General
                </NavLink>
                <NavLink
                    v-if="user.isAdmin"
                    :href="route('dashboard.users')"
                    :active="route().current('dashboard.users')"
                >
                    Users List
                </NavLink>
                <NavLink
                    :href="route('dashboard.questions')"
                    :active="route().current('dashboard.questions')"
                >
                    Questions
                </NavLink>
            </div>
        </div>
    </div>
</template>
