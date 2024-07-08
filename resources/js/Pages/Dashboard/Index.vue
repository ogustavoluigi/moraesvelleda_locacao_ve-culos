<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    countUsers: Number,
    countAdmins: Number,
    countVehicles: Number,
    countRentals: Number,
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
                <a v-if="countVehicles > 0" :href="route('dashboard.vehicles.index')" class="flex flex-col items-center rounded-lg border border-stroke bg-white transition duration-300 hover:border-gray-300 px-6 py-6 shadow-default">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200">
                        <svg class="fill-slate-600" width="20" height="20" viewBox="0 0 512 512"><path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                    </div>

                    <h4 class="mt-6 text-title-md font-bold text-black">{{ countVehicles > 1 ? countVehicles + ' Veículos' : countVehicles + ' Veículo' }}</h4>
                </a>
                
                <a v-if="countRentals > 0" :href="route('dashboard.rentals.index')" class="flex flex-col items-center rounded-lg border border-stroke bg-white transition duration-300 hover:border-gray-300 px-6 py-6 shadow-default">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-200">
                        <svg class="fill-slate-600" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
                    </div>

                    <h4 class="mt-6 text-title-md font-bold text-black">{{ countRentals > 1 ? countRentals + ' Reservas' : countRentals + ' Reserva' }}</h4>
                </a>
                
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
