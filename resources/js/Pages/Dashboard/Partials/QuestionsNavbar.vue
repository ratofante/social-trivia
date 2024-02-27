<script setup>
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import ButtonDropdown from "@/Components/Button/ButtonDropdown.vue";
import ButtonPrimary from "@/Components/Button/ButtonPrimary.vue";
import LinkSimple from "@/Components/Link/LinkSimple.vue";
import { usePage } from "@inertiajs/vue3";
import FilterForm from "./FilterForm.vue";

const page = usePage();
</script>

<template>
    <ContainerBase class="sticky top-12 z-10 bg-gray-dark pt-4 pb-2">
        <div class="flex gap-4 justify-between items-center">
            <div class="relative flex-1">
                <div class="flex gap-2 p-2">
                    <ButtonDropdown>
                        <template v-slot:trigger>
                            <ButtonPrimary size="small">Filtros</ButtonPrimary>
                        </template>
                        <template v-slot:content>
                            <FilterForm />
                        </template>
                    </ButtonDropdown>
                    <template v-if="page.props.roles.admin">
                        <ButtonPrimary size="small">Agregar</ButtonPrimary>
                    </template>
                </div>
                <div
                    style="
                        position: absolute;
                        right: 0;
                        top: 0;
                        bottom: 0;
                        z-index: 10;
                        width: 2rem;
                        background: rgb(255, 255, 255);
                        background: linear-gradient(
                            90deg,
                            rgba(255, 255, 255, 0) 70%,
                            rgb(36, 37, 37) 100%
                        );
                    "
                ></div>
            </div>
            <div class="w-fit">
                <LinkSimple
                    classs="text-green"
                    :href="route('dashboard')"
                    theme="dark"
                    >Volver</LinkSimple
                >
            </div>
        </div>
    </ContainerBase>
</template>
