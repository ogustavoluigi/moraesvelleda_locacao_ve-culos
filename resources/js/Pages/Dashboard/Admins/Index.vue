<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import PrimaryButtonLink from '@/Components/PrimaryButtonLink.vue';

defineProps({
    admins: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <Head title="Administradores" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Administradores</h2>
        </template>

        <div class="pt-3 pb-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-mail</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 tracking-wider">
                            <PrimaryButtonLink :href="route('dashboard.admins.create')">Novo</PrimaryButtonLink>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    
                    <tr v-for="admin in admins.data">
                        <td class="px-6 py-6 text-left">{{ admin.name }}</td>
                        <td class="px-6 py-6 text-left">{{ admin.email }}</td>
                        <td></td>
                    </tr>

                </tbody>
            </table>

            <div class="flex mt-12 justify-center">
                <pagination :links="admins.links" />
            </div>
        </div>
    </AdminLayout>
</template>
