<script setup>
import TextTitle from "@/Components/Text/TextTitle.vue";
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import QuestionDataCard from "@/Components/Question/QuestionDataCard.vue";
import { Head } from "@inertiajs/vue3";
import LinkSimple from "@/Components/Link/LinkSimple.vue";
import QuestionsNavbar from "./Partials/QuestionsNavbar.vue";
const props = defineProps(["questions", "messages"]);

console.log(props.messages);
</script>

<template>
    <Head title="Questions" />
    <AuthenticatedLayout>
        <ContainerBase>
            <TextTitle> Panel de preguntas </TextTitle>
        </ContainerBase>

        <!-- Question Nav Options -->
        <QuestionsNavbar />

        <!-- Questions List-->
        <ContainerBase class="border-green border-t border-b border-opacity-25">
            <template v-for="$question in questions.data">
                <QuestionDataCard :question="$question" />
            </template>
        </ContainerBase>

        <!-- Pagination -->
        <ContainerBase class="pt-6 pb-8">
            <div class="flex gap-2 justify-start align-middle w-fit">
                <template
                    v-if="questions.meta"
                    v-for="$link in questions.meta.links"
                >
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
        </ContainerBase>
    </AuthenticatedLayout>
</template>
