<script setup>
import AuthenticatedLayout from '@/Layouts/AppLayout.vue';
import VehicleCard from '@/Components/VehicleCard.vue';
import { Head } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

defineProps({
    vehicles: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Head title="Veículos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Veículos</h2>
        </template>

        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-3 lg:gap-8">
                <vehicle-card v-for="vehicle in vehicles.data" :vehicle="vehicle"></vehicle-card>
            </div>

            <div class="flex mt-12 justify-center">
                <pagination :links="vehicles.links" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
