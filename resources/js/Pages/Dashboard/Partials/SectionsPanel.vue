<script setup>
import LinkSimple from "@/Components/Link/LinkSimple.vue";
import { usePage } from "@inertiajs/vue3";
const page = usePage();
const roles = page.props.auth.user.roles;
</script>
<template>
    <div class="bg-white rounded-md p-4">
        <span
            class="inline-block font-serif text-lg border-b-2 border-green mb-4"
            >Sections</span
        >
        <div>
            <ul>
                <li>
                    <LinkSimple
                        :href="
                            roles[0].name === 'admin'
                                ? route('admin.questions.index')
                                : route('player.questions.index')
                        "
                    >
                        Preguntas
                    </LinkSimple>
                </li>
                <li>
                    <LinkSimple
                        v-if="roles[0].name === 'admin'"
                        href="/admin/users"
                    >
                        Jugadores
                    </LinkSimple>
                </li>
            </ul>
        </div>
    </div>
</template>
