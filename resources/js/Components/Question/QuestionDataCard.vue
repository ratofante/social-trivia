<script setup>
import LinkPrimary from "@/Components/Link/LinkPrimary.vue";
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import CategoryIcon from "../CategoryIcon.vue";
import QuestionScore from "./QuestionScore.vue";
import AccordionBlock from "@/Components/Accordion/AccordionBlock.vue";
import QuestionField from "./QuestionField.vue";
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
} from "@headlessui/vue";
import ButtonPrimary from "@/Components/Button/ButtonPrimary.vue";
import ButtonSecondary from "@/Components/Button/ButtonSecondary.vue";

const page = usePage();
const props = defineProps({
    question: {
        type: Object,
        required: true,
    },
});

/* Delete button */
const isOpen = ref(false);
function setIsOpen(value) {
    isOpen.value = value;
}
function deleteQuestion() {
    setIsOpen(false);
}

/*Accordion toggle*/
const isCardOpen = ref(false);

/*Date format*/
const createdAt = new Date(props.question.created_at);
const options = {
    year: "numeric",
    month: "short",
    day: "2-digit",
    hour: "2-digit",
    minute: "2-digit",
};

const formattedDate = createdAt.toLocaleString("es-ES", options);
</script>

<template>
    <div
        class="text-white border-b border-green border-opacity-25 py-8 first:pt-0"
    >
        <div class="flex justify-between mb-4">
            <div>
                <span class="capitalize">
                    {{ question.user ? question.user.name : "Admin" }}
                </span>
                <span
                    class="inline-block ml-2 text-xs text-gray-light opacity-50"
                >
                    {{ formattedDate }}
                </span>
            </div>
            <div class="flex gap-2 align-bottom">
                <CategoryIcon
                    :category="question.category.id"
                    classes="w-4 h-4"
                />
                <QuestionScore :score="question.score" />
            </div>
        </div>
        <QuestionField
            label="Pregunta"
            :value="question.question"
            :isCardOpen="isCardOpen"
            classes="mb-1"
        />
        <QuestionField
            label="Respuesta"
            :value="question.answer"
            :isCardOpen="isCardOpen"
            classes="mt-4"
        />
        <AccordionBlock @accordion-open="isCardOpen = !isCardOpen">
            <template v-slot:trigger>
                <div>
                    <span v-if="!isCardOpen" class="text-green opacity-80"
                        >Ver más</span
                    >
                    <span v-else class="text-green opacity-80">Cerrar</span>
                </div>
            </template>
            <template v-slot:content>
                <QuestionField
                    label="Opción A"
                    :value="question.opt_1"
                    :isCardOpen="isCardOpen"
                    classes="mb-1 mt-4"
                />
                <QuestionField
                    label="Opción B"
                    :value="question.opt_2"
                    :isCardOpen="isCardOpen"
                    classes="mb-1 mt-4"
                />
                <QuestionField
                    label="Opción C"
                    :value="question.opt_3"
                    :isCardOpen="isCardOpen"
                    classes="mb-1 mt-4"
                />
                <div v-if="page.props.roles.admin" class="flex gap-4 mt-4">
                    <LinkPrimary
                        title="Editar"
                        :href="
                            route('admin.questions.edit', {
                                question: question.id,
                            })
                        "
                        size="small"
                    />
                    <ButtonPrimary @click="setIsOpen(true)" size="small">
                        Eliminar
                    </ButtonPrimary>
                    <Dialog
                        :open="isOpen"
                        @close="setIsOpen(false)"
                        class="relative z-50"
                    >
                        <div
                            class="fixed inset-0 bg-gray-dark/50"
                            aria-hidden="true"
                        />
                        <div
                            class="fixed inset-0 flex w-screen items-center justify-center p-4"
                        >
                            <DialogPanel
                                class="w-full max-w-sm p-4 text-gray-light bg-gray-dark border-2 border-green rounded"
                            >
                                <DialogTitle class="font-serif mb-2 text-lg"
                                    >Eliminar pregunta</DialogTitle
                                >
                                <DialogDescription
                                    class="text-sm tracking-wide mb-4"
                                >
                                    <span class="text-green/80">
                                        ¿Estás seguro que quieres eliminar la
                                        pregunta?
                                    </span>
                                    Será borrada permanentemente con su puntaje
                                    y datos asociados.
                                </DialogDescription>

                                <LinkPrimaryVue
                                    title="Eliminar"
                                    :href="
                                        route('admin.questions.destroy', {
                                            question: question.id,
                                        })
                                    "
                                    size="small"
                                    @click="deleteQuestion"
                                    >Eliminar</LinkPrimaryVue
                                >
                                <ButtonSecondary
                                    @click="setIsOpen(false)"
                                    size="small"
                                    class="mx-2"
                                >
                                    Cancelar
                                </ButtonSecondary>
                            </DialogPanel>
                        </div>
                    </Dialog>
                </div>
            </template>
        </AccordionBlock>
    </div>
</template>
