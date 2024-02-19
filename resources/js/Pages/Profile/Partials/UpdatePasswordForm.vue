<script setup>
import InputError from "@/Components/Form/FormInputError.vue";
import InputLabel from "@/Components/Form/FormInputLabel.vue";
import PrimaryButton from "@/Components/Button/ButtonPrimary.vue";
import TextInput from "@/Components/Form/FormTextInput.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
import FormBlock from "@/Components/Form/FormBlock.vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);
const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    current_password: "",
    password: "",
    password_confirmation: "",
});

const updatePassword = () => {
    form.put(route("password.update"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset("current_password");
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium capitalize text-green">
                cambiar contraseña
            </h2>

            <p class="mt-1 text-sm text-gray-light">
                Utiliza una contraseña que sea larga y aleatoria para que sea
                más segura.
            </p>
        </header>

        <form @submit.prevent="updatePassword" class="mt-6 space-y-6">
            <FormBlock>
                <input
                    class="absolute w-0 h-0 p-0 m-[-1px] overflow-hidden border-0"
                    type="text"
                    name="name"
                    v-model="form.name"
                    autocomplete="name"
                />
                <InputLabel for="current_password" value="contraseña actual" />

                <TextInput
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="current-password"
                />

                <InputError
                    :message="form.errors.current_password"
                    class="mt-2"
                />
            </FormBlock>

            <FormBlock>
                <InputLabel for="password" value="Nueva Contraseña" />

                <TextInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />

                <InputError :message="form.errors.password" class="mt-2" />
            </FormBlock>

            <FormBlock>
                <InputLabel
                    for="password_confirmation"
                    value="Confirmar Contraseña"
                />

                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                />

                <InputError
                    :message="form.errors.password_confirmation"
                    class="mt-2"
                />
            </FormBlock>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing"
                    >Confirmar</PrimaryButton
                >

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-white font-medium"
                    >
                        Cambios Guardados
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
