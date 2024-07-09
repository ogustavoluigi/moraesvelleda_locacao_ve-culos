<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    vehicle: Object,
    required: true
});

const form = useForm({
    vehicle_id: props.vehicle.id,
    start_date: '',
    end_date: '',
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Reservar</h2>

            <p class="mt-1 text-sm text-gray-600">
                Reserve o veículo
            </p>
        </header>

        <form v-if="$page.props.auth.user" @submit.prevent="form.post(route('account.rentals.store'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="start_date" value="Data e Hora de Retirada" />

                <TextInput
                    id="start_date"
                    type="datetime-local"
                    class="mt-1 block w-full"
                    v-model="form.start_date"
                    required
                />

                <InputError class="mt-2" :message="form.errors.start_date" />
            </div>

            <div>
                <InputLabel for="end_date" value="Data e Hora de Devolução" />

                <TextInput
                    id="end_date"
                    type="datetime-local"
                    class="mt-1 block w-full"
                    v-model="form.end_date"
                    required
                />

                <InputError class="mt-2" :message="form.errors.end_date" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Reservar</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Reservado</p>
                </Transition>
            </div>
        </form>

        <p v-else class="text-sm text-gray-600 mt-6">
            Faça login pra reservar o veículo. <a class="text-blue-600" :href="route('login')">Fazer login</a>
        </p>
    </section>
</template>
