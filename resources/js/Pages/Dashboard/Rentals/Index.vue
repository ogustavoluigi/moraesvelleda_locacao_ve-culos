<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import { formatDateBR } from '@/utils';

defineProps({
    rentals: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Head title="Reservas" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reservas</h2>
        </template>

        <div class="pt-3 pb-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Veículo</th>
                        <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuário</th>
                        <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Data e Hora de Retirada</th>
                        <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">Data e Hora de Devolução</th>
                        <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-5 text-right text-xs font-medium text-gray-500 tracking-wider">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    <tr v-for="rental in rentals.data">
                        <td class="px-6 py-5 text-left">{{ rental.vehicle.model }}</td>
                        <td class="px-6 py-5 text-left">{{ rental.user.name }}</td>
                        <td class="px-6 py-5 text-left hidden sm:table-cell">{{ formatDateBR(rental.start_date) }}</td>
                        <td class="px-6 py-5 text-left hidden sm:table-cell">{{ formatDateBR(rental.end_date) }}</td>
                        <td class="px-6 py-5 text-left">{{ rental.status }}</td>
                        <td class="px-6 py-5 whitespace-nowrap w-0">
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="flex mt-12 justify-center">
                <pagination :links="rentals.links" />
            </div>
        </div>
    </AdminLayout>
</template>