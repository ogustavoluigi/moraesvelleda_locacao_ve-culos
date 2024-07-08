<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const props = defineProps({
    vehicle: {
        type: Array,
        required: true
    }
});

const confirmingVehicleDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmVehicleDeletion = () => {
    confirmingVehicleDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteVehicle = () => {
    form.delete(route('dashboard.vehicles.destroy', props.vehicle.id), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingVehicleDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <DangerButton @click="confirmVehicleDeletion">Excluir</DangerButton>

        <Modal :show="confirmingVehicleDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Você realmente deseja excluir este veículo?
                </h2>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteVehicle"
                    >
                        Excluir
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
