<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    vehicle: {
        type: Object,
        required: true
    }
});

const cancelReservation = () => {
    let rental = props.vehicle.active_rental;
    let rentalId = rental.id;

    try {
        useForm({status: "Cancelada"}).put(route('account.rentals.update', rentalId), {
            onFinish: () => {},
        });
    } catch (error) {
        console.error('Error when canceling rental:', error);
    }
}

</script>

<template>
    <div class="relative flex flex-col items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10">
        <img :class="{ 'invisible': !vehicle.photo }" class="w-full h-[200px] object-cover" :src="vehicle.photo">

        <div class="pt-3 sm:pt-5">
            <h2 class="text-xl font-semibold text-black">{{ vehicle.model }} - {{ vehicle.category.name }} - {{ vehicle.brand }}</h2>
            <p class="mt-4 text-sm/relaxed">{{ vehicle.description }}</p>
        </div>

        <div class="flex">
            <form v-if="vehicle.active_rental && ($page.props.auth.user && vehicle.active_rental.user_id == $page.props.auth.user.id)" @submit.prevent="cancelReservation">
                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Cancelar Reserva</button>
            </form>
            <div v-else-if="vehicle.active_rental" class="absolute top-2 right-2 h-fit py-1 px-3 rounded-full bg-blue-600 text-sm text-white font-medium">Reservado</div>
            <a v-else :href="route('vehicles.show', vehicle.slug)" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Reservar</a>

            <a class="text-gray-900 bg-white border border-1 border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2" :href="route('vehicles.show', vehicle.slug)">Ver Detalhes</a>
        </div>
    </div>
</template>
