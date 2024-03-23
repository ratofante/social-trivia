<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import TextTitle from "@/Components/Text/TextTitle.vue";

defineProps({
    trivia: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <AuthenticatedLayout>
        <ContainerBase>
            <TextTitle> Trivia Social </TextTitle>
        </ContainerBase>
    </AuthenticatedLayout>
</template>
