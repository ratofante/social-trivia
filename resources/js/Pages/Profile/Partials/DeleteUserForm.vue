<script setup>
import DangerButton from "@/Components/DangerButton.vue";
import InputError from "@/Components/Form/FormInputError.vue";
import InputLabel from "@/Components/Form/FormInputLabel.vue";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/Form/FormTextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: "",
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route("profile.destroy"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium capitalize text-green">
                Eliminar cuenta
            </h2>

            <p class="mt-1 text-sm text-gray-light">
                Una vez que tu cuenta haya sido eliminada, todos tus datos serán
                borrados permanentemente. Antes de eliminar tu cuenta, asegurate
                de guardar o descargar los datos que quieras conservar.
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion"
            >Eliminar Cuenta</DangerButton
        >

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-green">
                    Estás seguro que quieres eliminar tu cuenta?
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Una vez que tu cuenta haya sido eliminada, todos tus datos
                    serán borrados permanentemente. Por favor, ingresa tu
                    contraseña para confirmar que deseas eliminar tu cuenta.
                </p>

                <div class="mt-6">
                    <InputLabel
                        for="password"
                        value="Contraseña"
                        class="sr-only"
                    />

                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Contraseña"
                        @keyup.enter="deleteUser"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6">
                    <SecondaryButton @click="closeModal">
                        Cancelar
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Account
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
