<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { usePage, Head } from "@inertiajs/vue3";
import CardDashboard from "@/Components/Card/CardDashboard.vue";
import AdminDashboardMenu from "@/Components/Admin/AdminDashboardMenu.vue";
const page = usePage();

defineProps({
    isAdmin: {
        type: Boolean,
        required: true,
    },
});
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Panel" />

        <div class="p-4 pt-12">
            <div class="font-serif text-white text-2xl mb-4">
                Bienvenido/a, <br />
                <span class="capitalize">{{ page.props.auth.user.name }}</span
                >!
            </div>

            <template v-if="isAdmin">
                <AdminDashboardMenu />
            </template>

            <div class="flex flex-col gap-4 py-4">
                <CardDashboard
                    title="trivia simple"
                    description="Contesta 10 preguntas al azar y marca tu record personal."
                    :link="{ href: '/trivia/simple', title: 'Empezar' }"
                    :avalaible="true"
                />
                <CardDashboard
                    title="Trivia Social"
                    description="Contesta
                preguntas de otros jugadores. Vota por las mejores preguntas,
                marca tu record personal y aporta nuevas preguntas."
                    :link="{ href: '/trivia/social', title: 'social trivia' }"
                    :avalaible="false"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
