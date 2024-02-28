<script setup>
import LinkPrimary from "../Link/LinkPrimary.vue";
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import CategoryIcon from "../CategoryIcon.vue";
import QuestionScore from "./QuestionScore.vue";
import AccordionBlock from "@/Components/Accordion/AccordionBlock.vue";
const page = usePage();
const props = defineProps({
    question: {
        type: Object,
        required: true,
    },
});
const isOpen = ref(false);
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
            <div class="">
                <span v-if="question.user" class="capitalize">
                    {{ question.user.name }}
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
        <div class="flex justify-between">
            <div class="mb-1">
                <div
                    class="font-medium text-sm text-green opacity-75 tracking-wide"
                >
                    Pregunta
                </div>
                <p
                    class="text-sm opacity-75 line-clamp-2"
                    :class="{ 'line-clamp-none': isOpen }"
                >
                    {{ question.question }}
                </p>
            </div>
        </div>
        <div class="flex flex-col mt-4">
            <div
                class="font-medium mb-1 text-sm text-green opacity-75 tracking-wide"
            >
                Respuesta
            </div>
            <p
                class="text-sm opacity-75 line-clamp-2"
                :class="{ 'line-clamp-none': isOpen }"
            >
                {{ question.answer }}
            </p>
        </div>
        <AccordionBlock>
            <template v-slot:trigger>
                <span v-if="!isOpen" class="text-green opacity-80"
                    >Ver más</span
                >
                <span v-else class="text-green opacity-80">Cerrar</span>
            </template>
            <template v-slot:content>
                <div class="mb-1 mt-4">
                    <span
                        class="font-medium text-sm text-green opacity-75 tracking-wide"
                    >
                        Opción A
                    </span>
                    <p class="text-sm opacity-75 line-clamp-2">
                        {{ question.opt_1 }}
                    </p>
                </div>
                <div class="mb-1 mt-4">
                    <span
                        class="font-medium text-sm text-green opacity-75 tracking-wide"
                    >
                        Opción B
                    </span>
                    <p class="text-sm opacity-75 line-clamp-2">
                        {{ question.opt_2 }}
                    </p>
                </div>
                <div class="mb-1 mt-4">
                    <span
                        class="font-medium text-sm text-green opacity-75 tracking-wide"
                    >
                        Opción C
                    </span>
                    <p class="text-sm opacity-75 line-clamp-2">
                        {{ question.opt_3 }}
                    </p>
                </div>
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
                    <LinkPrimary title="Eliminar" href="/" size="small" />
                </div>
            </template>
        </AccordionBlock>
    </div>
</template>
