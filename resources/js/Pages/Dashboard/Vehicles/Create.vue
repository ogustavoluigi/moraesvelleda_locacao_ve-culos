<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import VehicleForm from './Partials/VehicleForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    categories: Array,
});
</script>

<template>
    <Head title="Veículos" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Adicionar novo veículo</h2>
        </template>

        <div class="pt-3 pb-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> 
                <VehicleForm :categories="categories" class="max-w-xl"/>
            </div>
        </div>
    </AdminLayout>
</template>
