<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    countUsers: {
        type: Number
    },
    countAdmins: {
        type: Number
    },
});
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Home</h2>
        </template>

        <div class="pt-3 pb-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
                <a v-if="countUsers > 0" :href="route('dashboard.users.index')" class="flex flex-col items-center justify-between rounded-lg border border-stroke bg-white transition duration-300 hover:border-gray-300 px-6 py-6 shadow-default">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200">
                        <svg class="fill-slate-600" width="22" height="22" viewBox="0 0 640 512"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                    </div>

                    <h4 class="mt-6 text-title-md font-bold text-black">{{ countUsers > 1 ? countUsers + ' Clientes' : countUsers + ' Cliente' }}</h4>
                </a>

                <a v-if="countAdmins > 0" :href="route('dashboard.admins.index')" class="flex flex-col items-center rounded-lg border border-stroke bg-white transition duration-300 hover:border-gray-300 px-6 py-6 shadow-default">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200">
                        <svg class="fill-slate-600" width="22" height="22" viewBox="0 0 448 512"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                    </div>

                    <h4 class="mt-6 text-title-md font-bold text-black">{{ countAdmins > 1 ? countAdmins + ' Administradores' : countAdmins + ' Administrador' }}</h4>
                </a>
            </div>
        </div>
    </AdminLayout>
</template>
