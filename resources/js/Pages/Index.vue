<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import VehicleCard from '@/Components/VehicleCard.vue';

defineProps({
    vehicleCategories: {
        type: Array
    }
});
</script>

<template>
    <Head title="Home" />

    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template>
        
        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div v-for="category in vehicleCategories">
                <h3 class="mt-9 mb-6 font-semibold text-lg text-gray-800 leading-tight">{{ category.name }}</h3>
                <div class="grid gap-6 lg:grid-cols-3 lg:gap-8">
                    <VehicleCard
                        v-for="vehicle in category.vehicles.slice(0, 3)"
                        :key="vehicle.id"
                        :vehicle="vehicle"
                        @cancel-reservation="cancelReservation" @reserve-vehicle="reserveVehicle">
                    </VehicleCard>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
