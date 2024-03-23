<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="block text-md text-white tracking-wide capitalize">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
