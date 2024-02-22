<script setup>
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import ButtonPrimary from "@/Components/Button/ButtonPrimary.vue";
import LinkSimple from "@/Components/Link/LinkSimple.vue";
import Dropdown from "@/Components/Dropdown.vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
</script>

<template>
    <ContainerBase class="sticky top-12 z-10 bg-gray-dark pt-4 pb-2">
        <div class="flex gap-4 justify-between">
            <div class="relative flex-1 overflow-hidden">
                <div class="flex gap-2 overflow-x-auto">
                    <template v-if="page.props.roles.admin">
                        <ButtonPrimary size="small">Agregar</ButtonPrimary>
                    </template>

                    <ButtonPrimary size="small">Ordenar</ButtonPrimary>
                    <Dropdown>
                        <template v-slot:trigger> Filtrar </template>
                        <template v-slot:content>
                            <ul>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                            </ul>
                        </template>
                    </Dropdown>
                    <ButtonPrimary size="small">Filtrar</ButtonPrimary>
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
