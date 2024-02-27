<script setup>
import FormBlock from "@/Components/Form/FormBlock.vue";
import FormInputLabel from "@/Components/Form/FormInputLabel.vue";
import ButtonPrimary from "@/Components/Button/ButtonPrimary.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";

const recent = ref(null);
const oldest = ref(null);
const best = ref(null);
const worse = ref(null);

const { props } = usePage();

const form = useForm({
    time: props.filters.time || null,
    score: props.filters.score || null,
});

function submit() {
    let url = props.roles.admin
        ? "admin.questions.index"
        : "user.questions.index";

    form.get(
        route(url, {
            time: form.time,
            score: form.score,
        })
    );
}

onMounted(() => {
    if (props.filters.time) {
        recent.value.checked = true;
    } else {
        oldest.value.checked = true;
    }
    if (props.filters.score) {
        best.value.checked = true;
    } else {
        worse.value.checked = true;
    }
});
</script>
<template>
    <form @submit.prevent="submit">
        <FormBlock class="flex flex-col gap-2">
            <div class="flex items-center gap-2">
                <input
                    ref="recent"
                    id="recent"
                    type="radio"
                    v-model="form.time"
                    value="recent"
                />
                <FormInputLabel
                    id="recent"
                    class="inline-block text-gray-light opacity-75"
                    >Más reciente</FormInputLabel
                >
            </div>
            <div class="flex items-center gap-2">
                <input
                    ref="oldest"
                    id="oldest"
                    type="radio"
                    v-model="form.time"
                    value="oldest"
                />
                <FormInputLabel
                    for="oldest"
                    class="inline-block text-gray-light opacity-75"
                >
                    Menos reciente
                </FormInputLabel>
            </div>
        </FormBlock>
        <FormBlock class="flex flex-col gap-2">
            <div class="flex items-center gap-2">
                <input
                    ref="best"
                    id="best"
                    type="radio"
                    v-model="form.score"
                    value="best"
                />
                <FormInputLabel
                    for="best"
                    class="inline-block text-gray-light opacity-75"
                >
                    Mejor puntaje
                </FormInputLabel>
            </div>
            <div class="flex items-center gap-2">
                <input
                    ref="worse"
                    id="worse"
                    type="radio"
                    v-model="form.score"
                    value="worse"
                />
                <FormInputLabel
                    for="worse"
                    class="inline-block text-gray-light opacity-75"
                >
                    Menor puntaje
                </FormInputLabel>
            </div>
        </FormBlock>
        <div class="mt-4">
            <ButtonPrimary
                size="small"
                class="text-center w-full"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Aplicar
            </ButtonPrimary>
        </div>
    </form>
</template>
