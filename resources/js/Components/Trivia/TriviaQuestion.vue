<script setup>
import ButtonPrimary from "@/Components/Button/ButtonPrimary.vue";

import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";

import { ref } from "vue";
import shuffleArray from "@/utils/shuffleArray.js";

const props = defineProps({
    question: {
        type: Object,
        required: true,
    },
});

const answer = ref();
const alternatives = shuffleArray([
    props.question.answer,
    props.question.opt_1,
    props.question.opt_2,
    props.question.opt_3,
]);
</script>

<template>
    <div>
        <RadioGroup v-model="answer">
            <RadioGroupLabel>
                <span class="block mb-4 text-green">Pregunta:</span>
                <h4 class="text-white mb-8 text-lg">
                    {{ question.question }}
                </h4>
            </RadioGroupLabel>
            <template v-for="(alternative, i) in alternatives" :key="i">
                <RadioGroupOption
                    v-slot="{ checked, active }"
                    :value="alternative"
                >
                    <div
                        class="flex items-center gap-4 my-2 py-4 px-4 text-white rounded-sm bg-gray transition-colors"
                        :class="{
                            'text-green': checked,
                            'border-2 border-gray-light border-opacity-50 outline-none ring-0':
                                active,
                        }"
                    >
                        <span
                            class="inline-block w-4 h-4 rounded-full border-2 border-gray-light border-opacity-50"
                            :class="{
                                'bg-green border-gray-dark': checked,
                            }"
                        ></span
                        ><span :class="{ 'text-green': checked }">{{
                            alternative
                        }}</span>
                    </div>
                </RadioGroupOption>
            </template>
        </RadioGroup>
        <div class="w-fit mx-auto mt-8">
            <ButtonPrimary @click="$emit('submit-answer', answer)">
                Contestar
            </ButtonPrimary>
        </div>
    </div>
</template>
