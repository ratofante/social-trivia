<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="block text-sm text-white tracking-wider capitalize">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
