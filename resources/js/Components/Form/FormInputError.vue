<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="mt-2 text-sm text-green opacity-80 font-medium">
            {{ message }}
        </p>
    </div>
</template>
