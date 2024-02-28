<template>
    <div class="flex gap-2 text-end text-sm text-gray-light tracking-wide">
        Puntaje:
        <span
            class="font-medium tracking-tight"
            :class="{
                'text-green': score >= 75,
                'text-blue-500': score >= 50 && score < 75,
                'text-orange-500': score >= 25 && score < 50,
                'text-red-500': score < 25,
            }"
            >{{ score }}/100</span
        >
    </div>
</template>

<script setup>
defineProps(["score"]);
</script>
