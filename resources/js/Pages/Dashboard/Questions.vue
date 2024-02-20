<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
const props = defineProps(["questions"]);
console.log(props.questions);
</script>

<template>
    <Head title="Questions" />
    <AuthenticatedLayout>
        <div class="text-white">
            <ul>
                <template v-for="question in questions">
                    <li>{{ question.question }}</li>
                </template>
            </ul>
        </div>
    </AuthenticatedLayout>
</template>
