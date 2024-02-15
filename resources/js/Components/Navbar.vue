<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    showingNavigationDropdown: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <nav
        class="fixed right-0 top-0 left-0 z-50 h-12 flex justify-between items-center p-4 bg-gray"
    >
        <!--logo-->
        <div class="flex justify-center">
            <div class="w-4 h-4 bg-white rounded-full"></div>
        </div>

        <!--panel-->
        <div v-if="canLogin" class="text-end">
            <!-- login /register -->
            <template>
                <Link
                    :href="route('login')"
                    class="font-medium text-white white pl-2 text-sm"
                    >Ingresar</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="font-medium text-emerald-400 pl-2 text-sm"
                    >Registrarse</Link
                >
            </template>
        </div>
        <!-- burger -->
        <div
            v-if="$page.props.auth.user"
            class="-me-2 flex items-center sm:hidden"
        >
            <button
                @click="showingNavigationDropdown = !showingNavigationDropdown"
                class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out z-50"
            >
                <svg
                    class="h-6 w-6"
                    stroke="currentColor"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <path
                        :class="{
                            hidden: showingNavigationDropdown,
                            'inline-flex': !showingNavigationDropdown,
                        }"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                    <path
                        :class="{
                            hidden: !showingNavigationDropdown,
                            'inline-flex': showingNavigationDropdown,
                        }"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>
        <!-- responsive navigation -->
        <div
            :class="{
                hidden: !showingNavigationDropdown,
            }"
            class="absolute top-0 left-0 right-0 pt-12 z-40"
        >
            <ul class="text-gray bg-white">
                <li>lorem</li>
                <li>lorem</li>
                <li>lorem</li>
                <li>lorem</li>
                <li>lorem</li>
            </ul>
        </div>
    </nav>
</template>

<style lang="scss" scoped></style>
