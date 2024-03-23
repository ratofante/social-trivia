<script setup>
import ButtonPrimary from "@/Components/Button/ButtonPrimary.vue";
import ContainerBase from "@/Components/Container/ContainerBase.vue";
</script>

<template>
    <div class="h-screen relative">
        <!-- hero bg -->
        <div class="absolute top-0 left-0 w-full h-screen z-1">
            <picture>
                <source
                    srcset="/imgs/bg__home-hero-mobile.webp"
                    media="(max-width: 992px)"
                    type="image/webp"
                />
                <source
                    srcset="/imgs/bg__home-hero-desktop.webp"
                    type="image/webp"
                />

                <img
                    class="img-cover opacity-80"
                    src="/imgs/bg__home-hero-desktop.webp"
                    alt="Productora musical y deportiva"
                />
            </picture>
        </div>
        <!-- hero portrait-->
        <ContainerBase>
            <div class="absolute center-absolute text-center">
                <h1
                    class="font-serif text-6xl md:text-8xl 2xl:text-9xl text-white"
                >
                    Trivium
                </h1>
                <ul
                    class="text-white opacity-65 text-base font-medium tracking-wider py-4"
                >
                    <li class="pb-2">1.5mil usuarios</li>
                    <li class="pb-2">65mil preguntas</li>
                    <li class="pb-2">2mill trivias jugadas</li>
                </ul>
                <ButtonPrimary> Juego Rápido </ButtonPrimary>
            </div>
        </ContainerBase>
    </div>
</template>
