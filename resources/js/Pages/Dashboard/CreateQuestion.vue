<script setup>
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import QuestionForm from "@/Components/Question/QuestionForm.vue";
import TextTitle from "@/Components/Text/TextTitle.vue";
import AuthenticatedLayoutVue from "@/Layouts/AuthenticatedLayout.vue";
import LinkSimple from "@/Components/Link/LinkSimple.vue";
import { Head } from "@inertiajs/vue3";
import { ArrowLeftIcon } from "@heroicons/vue/20/solid";
</script>

<template>
    <Head title="Edit Question" />

    <AuthenticatedLayoutVue>
        <ContainerBase>
            <div class="flex justify-between items-start">
                <TextTitle> Crear Pregunta </TextTitle>
                <LinkSimple
                    class="flex items-center gap-2 text-gray-light"
                    :href="route('admin.questions.index')"
                    theme="dark"
                >
                    <ArrowLeftIcon class="w-4 h-4" />Volver
                </LinkSimple>
            </div>

            <div>
                <QuestionForm action="create" />
            </div>
        </ContainerBase>
    </AuthenticatedLayoutVue>
</template>
