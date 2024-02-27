<script setup>
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import QuestionForm from "@/Components/Question/QuestionForm.vue";
import TextTitle from "@/Components/Text/TextTitle.vue";
import AuthenticatedLayoutVue from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Edit Question" />

    <AuthenticatedLayoutVue>
        <ContainerBase>
            <TextTitle> Crear Pregunta </TextTitle>
            <div>
                <QuestionForm action="create" />
            </div>
        </ContainerBase>
    </AuthenticatedLayoutVue>
</template>
