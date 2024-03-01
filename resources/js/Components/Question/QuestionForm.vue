<script setup>
import { useForm } from "@inertiajs/vue3";
import FormBlock from "../Form/FormBlock.vue";
import FormTextInput from "../Form/FormTextInput.vue";
import FormInputLabel from "../Form/FormInputLabel.vue";
import FormInputError from "../Form/FormInputError.vue";
import ButtonPrimary from "../Button/ButtonPrimary.vue";
import CategoriesSelect from "@/Pages/Dashboard/Partials/CategoriesSelect.vue";

const props = defineProps({
    question: {
        type: Object,
    },
    action: {
        type: String,
        required: true,
    },
});

const form = useForm({
    question: props.question ? props.question.question : "",
    answer: props.question ? props.question.answer : "",
    opt_1: props.question ? props.question.opt_1 : "",
    opt_2: props.question ? props.question.opt_2 : "",
    opt_3: props.question ? props.question.opt_3 : "",
    category_id: props.question ? props.question.category.id : 1,
});

const createQuestion = () => {
    form.post(route("admin.questions.store"));
};

const editQuestion = () => {
    form.patch(
        route("admin.questions.update", { question: props.question.id })
    );
};

const submitForm = () => {
    props.action === "create" ? createQuestion() : editQuestion();
};

console.log(form.errors);
</script>
<template>
    <form @submit.prevent="submitForm">
        <FormBlock>
            <FormInputLabel for="question" value="Pregunta" />
            <FormTextInput
                id="question"
                type="text"
                v-model="form.question"
                required
                autofocus
                autocomplete="question"
            />
            <FormInputError :message="form.errors.question" />
        </FormBlock>
        <FormBlock>
            <FormInputLabel for="answer" value="Respuesta" />
            <FormTextInput
                id="answer"
                type="text"
                v-model="form.answer"
                required
                autocomplete="answer"
            />
            <FormInputError :message="form.errors.answer" />
        </FormBlock>
        <FormBlock>
            <FormInputLabel for="opt_1" value="Alternativa 1" />
            <FormTextInput
                id="opt_1"
                type="text"
                v-model="form.opt_1"
                required
                autocomplete="opt_1"
            />
            <FormInputError :message="form.errors.opt_1" />
        </FormBlock>
        <FormBlock>
            <FormInputLabel for="opt_2" value="Alternativa 2" />
            <FormTextInput
                id="opt_2"
                type="text"
                v-model="form.opt_2"
                required
                autocomplete="opt_2"
            />
            <FormInputError :message="form.errors.opt_2" />
        </FormBlock>
        <FormBlock>
            <FormInputLabel for="opt_3" value="Alternativa 3" />
            <FormTextInput
                id="opt_3"
                type="text"
                v-model="form.opt_3"
                required
                autocomplete="opt_3"
            />
            <FormInputError :message="form.errors.opt_3" />
        </FormBlock>
        <FormBlock>
            <CategoriesSelect v-model:categoryValue="form.category_id" />
        </FormBlock>
        <FormBlock>
            <ButtonPrimary type="submit" :disabled="form.processing">
                Guardar Cambios
            </ButtonPrimary>
            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p
                    v-if="form.recentlySuccessful"
                    class="text-sm text-white font-medium"
                >
                    Cambios guardados.
                </p>
            </Transition>
        </FormBlock>
    </form>
</template>
