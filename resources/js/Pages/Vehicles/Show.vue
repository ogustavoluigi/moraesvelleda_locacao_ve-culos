<script setup>
import AuthenticatedLayout from '@/Layouts/AppLayout.vue';
import ReseveForm from './Partials/ReserveForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    vehicle: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Head title="Veículos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ vehicle.model }}</h2>
        </template>

        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="relative p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="mb-3 border-b pb-3">
                    <img :src="vehicle.photo" class="h-40 object-contain mb-6">

                    <span class="font-bold">Marca:</span> {{ vehicle.brand }}<br>
                    <span class="font-bold">Ano:</span> {{ vehicle.year }}<br>
                    <span class="font-bold">Custo de Aluguel:</span> {{ vehicle.rental_cost }}<br>
                    <span class="font-bold">Placa:</span> {{ vehicle.plate }}<br>
                    <span class="font-bold">Descrição:</span> {{ vehicle.description }}<br>
                    <span class="font-bold">Categoria:</span> {{ vehicle.category.name }}
                </div>
                
                <form v-if="vehicle.active_rental && ($page.props.auth.user && vehicle.active_rental.user_id == $page.props.auth.user.id)" @submit.prevent="cancelReservation">
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Cancelar Reserva</button>
                </form>
                <div v-else-if="vehicle.active_rental" class="absolute top-2 right-2 h-fit py-1 px-3 rounded-full bg-blue-600 text-sm text-white font-medium">Reservado</div>
                <ReseveForm v-else :vehicle="vehicle" class="max-w-xl"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
