<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import TextTitle from "@/Components/Text/TextTitle.vue";

const props = defineProps(["answers", "trivia", "score"]);

console.log(props.answers, props.trivia, props.score);
</script>

<template>
    <AuthenticatedLayout>
        <ContainerBase>
            <div class="flex justify-between">
                <TextTitle>Resultados</TextTitle>
            </div>
        </ContainerBase>
    </AuthenticatedLayout>
</template>
