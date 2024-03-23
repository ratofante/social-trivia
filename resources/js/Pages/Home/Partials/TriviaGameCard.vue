<script setup>
import LinkPrimary from "@/Components/Link/LinkPrimary.vue";

defineProps({
    title: {
        type: String,
        required: true,
    },
    description: {
        type: String,
        required: true,
    },
    link: {
        type: Object,
        default: {
            href: "/",
            title: "Button",
        },
    },
    avalaible: {
        type: Boolean,
        default: false,
    },
    imageSource: {
        type: String,
        required: false,
    },
});
</script>
<template>
    <div class="relative bg-white px-3 pt-3 pb-4 min-h-fit rounded-sm">
        <!-- card content -->
        <div class="relative z-10">
            <h5 class="mb-2 font-serif capitalize text-xl tracking-wide">
                {{ title }}
            </h5>
            <p class="mb-8 text-black text-xs w-2/3">
                {{ description }}
            </p>
            <LinkPrimary
                :title="link.title"
                :href="route(link.href)"
                size="small"
                :active="!avalaible ? false : true"
            />
        </div>
        <!-- background -->
        <div v-if="imageSource" class="absolute top-0 right-0 w-fit h-full z-0">
            <img class="img-cover" :src="imageSource" />
        </div>
        <!-- If not available -->
        <div
            class="absolute top-0 left-0 w-full h-full z-20 bg-gray-dark opacity-50"
            :class="avalaible && 'hidden'"
        >
            <div class="w-20 absolute top-8 right-8">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 32 32"
                    class="w-full h-full text-white"
                >
                    <g fill="currentColor">
                        <path
                            d="M18.5 18.5c0 .818-.393 1.544-1 2V24a1.5 1.5 0 0 1-3 0v-3.5a2.5 2.5 0 1 1 4-2"
                        />
                        <path
                            d="M10 7a6 6 0 0 1 12 0v3h2a4 4 0 0 1 4 4v13a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4V14a4 4 0 0 1 4-4h2zm9.5 0a3.5 3.5 0 1 0-7 0v3h7zM8 12a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V14a2 2 0 0 0-2-2z"
                        />
                    </g>
                </svg>
            </div>
        </div>
    </div>
</template>
