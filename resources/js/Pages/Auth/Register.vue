<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ContainerBase from "@/Components/Container/ContainerBase.vue";
import FormInputError from "@/Components/Form/FormInputError.vue";
import FormInputLabel from "@/Components/Form/FormInputLabel.vue";
import ButtonPrimary from "@/Components/Button/ButtonPrimary.vue";
import FormTextInput from "@/Components/Form/FormTextInput.vue";

import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Registrarse" />

        <ContainerBase>
            <form @submit.prevent="submit" class="w-full max-w-md">
                <div>
                    <FormInputLabel for="name" value="Nombre" />

                    <FormTextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <FormInputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <FormInputLabel for="email" value="Email" />

                    <FormTextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />

                    <FormInputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <FormInputLabel for="password" value="Contraseña" />

                    <FormTextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />

                    <FormInputError
                        class="mt-2"
                        :message="form.errors.password"
                    />
                </div>

                <div class="mt-4">
                    <FormInputLabel
                        for="password_confirmation"
                        value="Confirmar Contraseña"
                    />

                    <FormTextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <FormInputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>

                <div class="flex items-center justify-end mt-12">
                    <Link
                        :href="route('login')"
                        class="underline text-sm text-white opacity-75 hover:text-green focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        ¿Ya estás registrado?
                    </Link>

                    <ButtonPrimary
                        class="ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Registrarse
                    </ButtonPrimary>
                </div>
            </form>
        </ContainerBase>
    </GuestLayout>
</template>
