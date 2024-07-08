<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import DeleteVehicleForm from './Partials/DeleteVehicleForm.vue';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';
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

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Veículos</h2>
        </template>

        <div class="pt-3 pb-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Imagem</th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Categoria</th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modelo</th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Description</th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Reservado</th>
                        <th scope="col" class="p-4 text-right text-xs font-medium text-gray-500 tracking-wider">
                            <PrimaryButtonLink :href="route('dashboard.vehicles.create')">Novo</PrimaryButtonLink>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    <tr v-for="vehicle in vehicles.data">
                        <td class="px-6 py-4 whitespace-nowrap w-0 hidden sm:table-cell">
                            <img v-if="vehicle.photo" class="object-cover w-20" :src="vehicle.photo">
                        </td>
                        <td class="px-4 text-left hidden sm:table-cell">{{ vehicle.category.name }}</td>
                        <td class="px-4 text-left">{{ vehicle.model }}</td>
                        <td class="px-4 text-left hidden sm:table-cell">{{ vehicle.description }}</td>
                        <td class="px-4 text-left hidden sm:table-cell">{{ vehicle.active_rental?'Sim':'Não' }}</td>
                        <td class="px-4 py-4 whitespace-nowrap w-0">
                            <PrimaryButtonLink class="me-3" :href="route('dashboard.vehicles.edit', vehicle.id)">Editar</PrimaryButtonLink>

                            <DeleteVehicleForm :vehicle="vehicle" class="inline max-w-xl" />
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="flex mt-12 justify-center">
                <pagination :links="vehicles.links" />
            </div>
        </div>
    </AdminLayout>
</template>
