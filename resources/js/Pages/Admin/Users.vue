<script setup>
const props = defineProps(["users"]);
console.log(props.users);
</script>

<template>
    <h1 class="text-left">This is de Admin Users Panel</h1>

    <table class="table">
        <thead>
            <tr class="">
                <th scope="col" class="py-4">ID</th>
                <th scope="col" class="text-left py-4">Name</th>
                <th scope="col" class="text-left py-4">Email</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users" :key="user.id">
                <td class="py-2 px-4">{{ user.id }}</td>
                <td class="py-2 px-4">{{ user.name }}</td>
                <td class="py-2 px-4">{{ user.email }}</td>
            </tr>
        </tbody>
    </table>
</template>

<style></style>
