<script setup>
import TextTitle from "@/Components/Text/TextTitle.vue";
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import QuestionDataCard from "@/Components/Question/QuestionDataCard.vue";
import ButtonPrimary from "@/Components/Button/ButtonPrimary.vue";
import { Head } from "@inertiajs/vue3";
import LinkSimple from "@/Components/Link/LinkSimple.vue";
const props = defineProps(["questions"]);

console.log(props.questions.meta.links);
</script>

<template>
    <Head title="Questions" />
    <AuthenticatedLayout>
        <ContainerBase>
            <TextTitle> Panel de preguntas </TextTitle>
        </ContainerBase>

        <ContainerBase class="sticky top-12 z-10 bg-gray-dark pt-4 pb-2">
            <div class="flex gap-2 justify-start align-middle w-fit">
                <template v-for="$link in questions.meta.links">
                    <LinkSimple
                        theme="dark"
                        :href="$link.url != null ? $link.url : ''"
                        :active="$link.active"
                        :disabled="$link.url === null"
                    >
                        <span v-html="$link.label"></span>
                    </LinkSimple>
                </template>
            </div>

            <div class="flex gap-2">
                <ButtonPrimary size="small">Agregar</ButtonPrimary>
                <ButtonPrimary size="small">Filtrar</ButtonPrimary>
            </div>
        </ContainerBase>

        <ContainerBase class="border-green border-t border-b border-opacity-25">
            <template v-for="$question in questions.data">
                <QuestionDataCard :question="$question" />
            </template>
        </ContainerBase>
    </AuthenticatedLayout>
</template>
