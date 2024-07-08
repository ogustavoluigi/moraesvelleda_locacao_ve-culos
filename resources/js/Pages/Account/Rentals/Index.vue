<script setup>
import AuthenticatedLayout from '@/Layouts/AppLayout.vue';
import VehicleCard from '@/Components/VehicleCard.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    rentals:{
        type: Array,
        required: true
    }
})
</script>

<template>
    <Head title="Veículos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Minhas Reservas</h2>
        </template>

        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-3 lg:gap-8">
                <vehicle-card v-for="rental in rentals" :vehicle="rental.vehicle"></vehicle-card>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
