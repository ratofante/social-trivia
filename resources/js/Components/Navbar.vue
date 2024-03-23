<script setup>
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import NavbarBurgerButton from "@/Components/NavbarBurgerButton.vue";

import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const showingNavigationDropdown = ref(false);
</script>

<template>
    <nav class="fixed right-0 top-0 left-0 z-50 h-12">
        <div
            class="relative z-50 h-full px-4 flex justify-between items-center bg-gray"
        >
            <!-- LOGO -->
            <div class="flex justify-center">
                <Link href="/"
                    ><span class="font-serif text-white">Trivium</span></Link
                >
            </div>

            <!-- LOGIN/REGISTER -->
            <div v-if="canLogin && !$page.props.auth.user" class="text-end">
                <!-- login /register -->
                <Link
                    :href="route('login')"
                    class="font-medium text-gray-light white pl-2 text-sm"
                    >Ingresar</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="font-medium text-green pl-2 text-sm"
                    >Registrarse</Link
                >
            </div>

            <!-- BURGER MENU -->
            <div v-if="$page.props.auth.user" class="-me-2 flex items-center">
                <NavbarBurgerButton
                    @on-click="
                        showingNavigationDropdown = !showingNavigationDropdown
                    "
                    :open="showingNavigationDropdown"
                />
            </div>
        </div>

        <!-- TOGGLE MENU -->
        <div
            v-if="$page.props.auth.user"
            :class="!showingNavigationDropdown && 'translate-y-[-100%]'"
            class="absolute top-0 right-0 pb-6 pt-12 z-40 bg-white flex flex-col items-end w-fit rounded-bl-md shadow-sm translate-y-0 transition-transform ease-in-out duration-500"
        >
            <div
                class="w-full flex items-center justify-end gap-4 p-3 pl-12 bg-gray-light"
            >
                <div class="flex flex-col">
                    <span class="font-medium text-sm text-end">{{
                        $page.props.auth.user.name
                    }}</span>
                    <span class="font-normal text-xs text-end">{{
                        $page.props.auth.user.email
                    }}</span>
                </div>
                <div>
                    <img
                        class="w-10 h-10 rounded-full overflow-hidden"
                        src="/imgs/avatar.jpg"
                        alt=""
                    />
                </div>
            </div>
            <div class="pt-6 flex flex-col gap-2 px-4 text-end">
                <ResponsiveNavLink :href="route('profile.edit')">
                    Perfil
                </ResponsiveNavLink>
                <ResponsiveNavLink :href="route('home')">
                    Social Trivia
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    :href="route('logout')"
                    method="post"
                    as="button"
                >
                    Cerrar Sesión
                </ResponsiveNavLink>
            </div>
        </div>

        <!-- MASK -->
        <div
            @click="showingNavigationDropdown = false"
            :class="
                !showingNavigationDropdown
                    ? 'opacity-0 pointer-events-none'
                    : 'opacity-30'
            "
            class="fixed z-20 bg-gray-dark top-0 left-0 right-0 h-screen transition-opacity duration-500 ease-in-out"
        ></div>
    </nav>
</template>

<style lang="scss" scoped></style>
