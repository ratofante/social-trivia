<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import FormInputError from "@/Components/Form/FormInputError.vue";
import FormInputLabel from "@/Components/Form/FormInputLabel.vue";
import ButtonPrimary from "@/Components/Button/ButtonPrimary.vue";
import FormTextInput from "@/Components/Form/FormTextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import FormBlock from "@/Components/Form/FormBlock.vue";

const props = defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Iniciar Sesión" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="w-full max-w-md">
            <FormBlock>
                <FormInputLabel for="email" value="Email" />
                <FormTextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />
                <FormInputError class="mt-2" :message="form.errors.email" />
            </FormBlock>
            <FormBlock class="mt-4">
                <FormInputLabel for="password" value="Password" />
                <FormTextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />
                <FormInputError class="mt-2" :message="form.errors.password" />
            </FormBlock>
            <FormBlock class="mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-white opacity-75"
                        >Remember me</span
                    >
                </label>
            </FormBlock>
            <div class="flex items-center justify-end mt-12">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-white opacity-75 hover:text-green rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>
                <ButtonPrimary
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </ButtonPrimary>
            </div>
        </form>
    </GuestLayout>
</template>
