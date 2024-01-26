<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps(["user", "questions"]);
console.log(props.questions);

function dateFormat(str) {
    let options = {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
        hour: "2-digit",
        minute: "2-digit",
        hour12: false, // Use 24-hour format
    };
    let date = new Date(str);
    return date.toLocaleDateString("en-GB", options);
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout :user="user">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard - Questions
            </h2>
        </template>

        <!-- Results Table -->
        <div class="py-12">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Option A</th>
                        <th>Option B</th>
                        <th>Option C</th>
                        <th>User ID</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="question in props.questions">
                        <td>{{ question.id }}</td>
                        <td>{{ question.question }}</td>
                        <td>{{ question.answer }}</td>
                        <td>{{ question.opt_1 }}</td>
                        <td>{{ question.opt_2 }}</td>
                        <td>{{ question.opt_3 }}</td>
                        <td>{{ question.user_id }}</td>
                        <td>{{ dateFormat(question.created_at) }}</td>
                        <td>{{ dateFormat(question.updated_at) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
