<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Navbar from "@/Components/Navbar.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import DashboardNavbar from "@/Components/Dashboard/DashboardNavbar.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
const props = defineProps(["user", "canLogin", "canRegister"]);
</script>

<template>
    <div class="min-h-screen">
        <Navbar :canLogin="canLogin" :canRegister="canRegister" />
        <div class="min-h-screen bg-gray-dark">
            <!-- Page Content -->
            <main class="pt-12">
                <slot />
            </main>
        </div>
    </div>
</template>
