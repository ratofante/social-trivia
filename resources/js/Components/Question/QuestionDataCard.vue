<script setup>
import LinkPrimary from "../Link/LinkPrimary.vue";
import { reactive, ref } from "vue";

const props = defineProps({
    question: {
        type: Object,
        required: true,
    },
});

const isOpen = ref(false);
</script>

<template>
    <div
        class="grid grid-cols-12 text-white border-b border-green border-opacity-25 py-8 first:pt-0 last:pb-0"
    >
        <div class="col-span-8">
            <div
                class="font-medium text-sm mb-1 text-green opacity-75 tracking-wide"
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
        <div class="col-span-4 text-end justify-self-end text-sm tracking-wide">
            Puntaje:
            <span class="text-green font-medium tracking-tight"
                >{{ question.score }}/100</span
            >
        </div>
        <div class="col-span-8">
            <div
                class="font-medium text-sm mb-1 mt-4 text-green opacity-75 tracking-wide"
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
        <div class="col-span-4 justify-self-end self-end">
            <button
                @click="() => (isOpen = !isOpen)"
                class="w-6 h-6 flex align-middle justify-center text-green opacity-50 border-green border rounded-full"
            >
                <svg
                    class="w-full h-full transition-transform relative top-[1px]"
                    :class="{ 'rotate-180 top-[-1px]': isOpen }"
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill="currentColor"
                        d="M12 14.975q-.2 0-.375-.062T11.3 14.7l-4.6-4.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l3.9 3.9l3.9-3.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-4.6 4.6q-.15.15-.325.213t-.375.062"
                    />
                </svg>
            </button>
        </div>
        <!-- Expanded Info -->
        <div
            class="col-span-12 overflow-hidden h-0 transition-all"
            :class="{ 'h-fit': isOpen }"
        >
            <div
                class="font-medium text-sm mb-1 mt-4 text-green opacity-75 tracking-wide"
            >
                Opción A
            </div>
            <p class="text-sm opacity-75 line-clamp-2">{{ question.opt_1 }}</p>
            <div
                class="font-medium text-sm mb-1 mt-4 text-green opacity-75 tracking-wide"
            >
                Opción B
            </div>
            <p class="text-sm opacity-75 line-clamp-2">{{ question.opt_2 }}</p>
            <div
                class="font-medium text-sm mb-1 mt-4 text-green opacity-75 tracking-wide"
            >
                Opción C
            </div>
            <p class="text-sm opacity-75 line-clamp-2">{{ question.opt_3 }}</p>
            <div class="flex gap-4 mt-4">
                <LinkPrimary
                    title="Editar"
                    :href="
                        route('admin.questions.edit', { question: question.id })
                    "
                    size="small"
                />
                <LinkPrimary title="Eliminar" href="/" size="small" />
            </div>
        </div>
    </div>
</template>
