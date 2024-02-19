<script setup>
import Navbar from "@/Components/Navbar.vue";
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
