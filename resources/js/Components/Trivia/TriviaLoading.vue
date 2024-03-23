<script setup>
// import { ref, onMounted } from 'vue';

// const portrait = ref();

// const portraitAnimationIn = [
//     {clipPath: 'polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)'},
//     {clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)'}
// ];

// const startLoadingAnimation = () => {
//     portrait.value.animate(portraitAnimationIn, {
//         duration: 1800,
//         fill: 'forwards',
//         easing: 'cubic-bezier(0.190, 1.000, 0.220, 1.000)'
//     });
// }

// onMounted(() => {
//     startLoadingAnimation();
// })


</script>

<template>
<div class="relative grid place-items-center w-full h-64 mx-auto my-12">
                <p
                    class="relative z-10w-fit whitespace-nowrap uppercase text-sm text-center"
                >
                    <div class="relative text-green">cargando resultados</div>
                </p>
                <!-- <div class="w-1/3 center-absolute">
                    <div
                    ref="portrait"
                        class="border-2 border-green border-opacity-30 rounded-sm overflow-hidden"
                    >
                        <img
                            class="opacity-40 scale-150"
                            src="/imgs/trivia/trivia_simple_loading.png"
                            alt=""
                        />
                    </div>
                </div> -->
            </div>
</template>

<style scoped>

</style>