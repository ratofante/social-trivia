<script setup>
import LinkSimple from "@/Components/Link/LinkSimple.vue";
</script>
<template>
    <div class="bg-white rounded-md p-4">
        <span
            class="inline-block font-serif text-lg border-b-2 border-green mb-4"
            >Admin Panel</span
        >
        <div>
            <ul>
                <li>
                    <LinkSimple :href="route('admin.questions.index')">
                        Preguntas
                    </LinkSimple>
                </li>
                <li>
                    <LinkSimple href="/admin/users"> Jugadores </LinkSimple>
                </li>
            </ul>
        </div>
    </div>
</template>
