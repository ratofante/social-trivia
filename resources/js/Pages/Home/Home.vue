<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import TextTitle from "@/Components/Text/TextTitle.vue";
import TriviaGameCard from "@/Pages/Home/Partials/TriviaGameCard.vue";

import { Head, usePage } from "@inertiajs/vue3";

defineProps({
    permissions: {
        type: Array,
        required: true,
    },
});

const page = usePage();
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

            <!-- Trivias -->
            <div class="flex flex-col gap-8">
                <TriviaGameCard
                    title="trivia simple"
                    description="Contesta 10 preguntas al azar y marca tu record personal."
                    :link="{ href: 'trivia.simple', title: 'Empezar' }"
                    :avalaible="true"
                    image-source="/imgs/home/trivia_simple_card.webp"
                />
                <TriviaGameCard
                    title="Trivia Social"
                    description="Contesta
                    preguntas de otros jugadores. Vota por las mejores preguntas, marca tu record personal y aporta nuevas preguntas."
                    :link="{ href: 'trivia.social', title: 'social trivia' }"
                    :avalaible="permissions.includes('trivia social')"
                    image-source="/imgs/home/trivia_social_card.webp"
                />
            </div>
        </ContainerBase>
    </AuthenticatedLayout>
</template>
