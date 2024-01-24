<script setup>
const props = defineProps(["users"]);
console.log(props.users);
</script>

<template>
    <h1>This is de Admin Users Panel</h1>
    <ul>
        <li v-for="user in users" :key="user.id">
            {{ user.name }}
        </li>
    </ul>
</template>
