<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import TriviaQuestion from "@/Components/Trivia/TriviaQuestion.vue";
import TriviaLoading from "@/Components/Trivia/TriviaLoading.vue";
import TextTitle from "@/Components/Text/TextTitle.vue";

import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    trivia: {
        type: Object,
        required: true,
    },
    nQuestions: {
        type: Number,
        required: true,
    },
});

const totalSteps = props.nQuestions;
const step = ref(0);

const form = useForm({
    answers: [],
    trivia: props.trivia,
    score: 0,
});

function getQuestionAlternatives(question) {
    return (({ answer, opt_1, opt_2, opt_3 }) => ({
        answer,
        opt_1,
        opt_2,
        opt_3,
    }))(question);
}

function getUserAnswer(question, userAnswer) {
    for (const [key, value] of Object.entries(question)) {
        if (value === userAnswer) {
            return key;
        }
    }
    return new Error("Can't get user answer");
}

function calculateScore(trivia, userAnswers) {
    trivia.questions.forEach((question, i) => {
        console.log(question.answer, userAnswers[i].user_answer);
        if (question.answer === userAnswers[i].user_answer) {
            console.log("correct answer");
            form.score = form.score + 1;
        } else {
            console.log("bad answer!");
            form.score = form.score - 0.5;
        }
    });
}

const handleAnswer = (userAnswer) => {
    const alternatives = getQuestionAlternatives(
        props.trivia.questions[step.value]
    );
    const userAnswerKey = getUserAnswer(alternatives, userAnswer);
    form.answers.push({
        question_id: props.trivia.questions[step.value].id,
        answer: props.trivia.questions[step.value].answer,
        user_answer: userAnswerKey,
    });

    console.log(form.answers);

    if (step.value === totalSteps - 1) {
        calculateScore(props.trivia, form.answers);
        form.post(route("trivia.simple.store"));
        console.log("FINISH");
    } else {
        step.value++;
    }
};
</script>

<template>
    <AuthenticatedLayout>
        <ContainerBase>
            <div class="flex justify-between">
                <TextTitle>Trivia Simple</TextTitle>
                <div class="w-fit inline-block text-white opacity-85">
                    <span v-if="step < totalSteps"
                        >{{ step + 1 }} / {{ trivia.questions.length }}</span
                    >
                    <span v-else class="text-green">Finalizado</span>
                </div>
            </div>

            <template v-for="(question, i) in trivia.questions" :key="i">
                <Transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="absolute ease-in duration-200"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <TriviaQuestion
                        v-if="step === i && step < totalSteps"
                        @submit-answer="handleAnswer"
                        :question="question"
                    />
                </Transition>
            </template>
            <Transition
                enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <TriviaLoading v-if="step === totalSteps" />
            </Transition>
        </ContainerBase>
    </AuthenticatedLayout>
</template>
