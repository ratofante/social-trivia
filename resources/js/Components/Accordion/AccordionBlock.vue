<template>
    <div
        class="grid accordion-transition my-4"
        :class="[isOpen ? 'accordion-open' : 'accordion-closed']"
    >
        <button class="flex justify-between text-sm" @click="toggleAccordion">
            <span>
                <slot name="trigger" />
            </span>
            <ChevronDownIcon
                class="w-6 h-6 transition-transform text-green opacity-80"
                :class="isOpen ? 'rotate-180' : 'rotate-0'"
            />
        </button>
        <div class="overflow-hidden">
            <slot name="content" />
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { ChevronDownIcon } from "@heroicons/vue/20/solid";

const isOpen = ref(false);
const emit = defineEmits(["accordionOpen"]);

function toggleAccordion() {
    isOpen.value = !isOpen.value;
    emit("accordionOpen");
}
</script>
