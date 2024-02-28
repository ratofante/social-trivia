<template>
    <BeakerIcon v-if="category === 4" :class="classes" />
    <PaintBrushIcon v-if="category === 1" :class="classes" />
    <TrophyIcon v-if="category === 2" :class="classes" />
    <GlobeAmericasIcon v-if="category === 3" :class="classes" />
</template>

<script setup>
import {
    BeakerIcon,
    PaintBrushIcon,
    TrophyIcon,
    GlobeAmericasIcon,
} from "@heroicons/vue/20/solid";

defineProps({
    category: {
        required: true,
    },
    classes: {
        default: "",
    },
});
</script>
