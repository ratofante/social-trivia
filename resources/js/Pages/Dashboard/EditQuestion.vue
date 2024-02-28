<script setup>
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import QuestionForm from "@/Components/Question/QuestionForm.vue";
import TextTitle from "@/Components/Text/TextTitle.vue";
import AuthenticatedLayoutVue from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    question: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Edit Question" />

    <AuthenticatedLayoutVue>
        <ContainerBase>
            <TextTitle> Editar pregunta </TextTitle>
            <div>
                <QuestionForm :question="question" action="edit" />
            </div>
        </ContainerBase>
    </AuthenticatedLayoutVue>
</template>
