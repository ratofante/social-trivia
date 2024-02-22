<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { usePage, Head } from "@inertiajs/vue3";
import CardDashboard from "@/Components/Card/CardDashboard.vue";
import SectionsPanel from "@/Pages/Dashboard/Partials/SectionsPanel.vue";
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import TextTitle from "@/Components/Text/TextTitle.vue";
const page = usePage();
defineProps({
    isAdmin: {
        type: Boolean,
        required: true,
    },
    permissions: {
        type: Array,
    },
});
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Panel" />
        <ContainerBase>
            <TextTitle>
                Bienvenido/a,<br />
                <span class="capitalize">{{ page.props.auth.user.name }}</span
                >!
            </TextTitle>
            <SectionsPanel />

            <div class="flex flex-col gap-4 py-4 md:flex-wrap">
                <CardDashboard
                    title="trivia simple"
                    description="Contesta 10 preguntas al azar y marca tu record personal."
                    :link="{ href: '/trivia/simple', title: 'Empezar' }"
                    :avalaible="true"
                />
                <CardDashboard
                    title="Trivia Social"
                    description="Contesta
                    preguntas de otros jugadores. Vota por las mejores preguntas, marca tu record personal y aporta nuevas preguntas."
                    :link="{ href: '/trivia/social', title: 'social trivia' }"
                    :avalaible="permissions.includes('trivia social')"
                />
            </div>
        </ContainerBase>
    </AuthenticatedLayout>
</template>
