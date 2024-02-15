<script setup></script>

<template>
    <div class="h-screen relative bg-gray-dark">
        <!-- hero bg -->
        <div class="w-full h-full relative z-1">
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
        <div class="absolute center-absolute text-center">
            <h1 class="font-serif text-6xl text-white">Trivium</h1>
            <ul
                class="font-sans text-white opacity-65 text-base font-medium tracking-wider py-2"
            >
                <li class="pb-1">1.5mil usuarios</li>
                <li class="pb-1">65mil preguntas</li>
                <li class="pb-1">2mill trivias jugadas</li>
            </ul>
            <div>
                <button class="font-serif text-2xl py-2 px-4 rounded bg-green">
                    Juego Rápido
                </button>
                <div></div>
            </div>
        </div>
    </div>
</template>
