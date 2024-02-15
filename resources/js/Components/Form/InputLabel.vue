<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="block font-medium text-sm text-gray-50 tracking-wider">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
