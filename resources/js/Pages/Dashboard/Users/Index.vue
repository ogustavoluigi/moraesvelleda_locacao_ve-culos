<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';

defineProps({
    users: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Head title="Veículos" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clientes</h2>
        </template>

        <div class="pt-3 pb-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-5 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                        <th scope="col" class="px-6 py-5 text-right text-xs font-medium text-gray-500 tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    <tr v-for="user in users.data">
                        <td class="px-6 text-left">{{ user.name }}</td>
                        <td class="px-6 text-left">{{ user.email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap w-0">
                            <PrimaryButtonLink class="me-3" :href="route('dashboard.users.edit', user.id)">Editar</PrimaryButtonLink>

                            <DeleteUserForm :user="user" class="inline max-w-xl" />
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="flex mt-12 justify-center">
                <pagination :links="users.links" />
            </div>
        </div>
    </AdminLayout>
</template>
