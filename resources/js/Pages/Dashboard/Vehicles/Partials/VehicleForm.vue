<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import ImageUpload from '@/Components/ImageUpload.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { usePage, useForm, router } from '@inertiajs/vue3';

const props = defineProps({
    vehicle: {
        type: Object
    },
    categories: {
        type: Array
    }
});

const form = useForm({
  photo: props.vehicle ? props.vehicle.photo : null,
  model: props.vehicle ? props.vehicle.model : '',
  brand: props.vehicle ? props.vehicle.brand : '',
  plate: props.vehicle ? props.vehicle.plate : '',
  year: props.vehicle ? props.vehicle.year : '',
  description: props.vehicle ? props.vehicle.description : '',
  rental_cost: props.vehicle ? props.vehicle.rental_cost : '',
  category: props.vehicle ? props.vehicle.category.name : '',
});

const photoChange = (event) =>{
    if(event.target.files) form.photo = event.target.files[0];
    else form.photo = null;
}

const saveVehicle = () => {
    if(props.vehicle) router.post(usePage().props.base.url+'/dashboard/veiculos/'+props.vehicle.id, {
        _method: 'put',
        photo: form.photo,
        model: form.model,
        brand: form.brand,
        category: form.category,
        plate: form.plate,
        year: form.year,
        description: form.description,
        rental_cost: form.rental_cost,
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => form.reset(),
        onError: (error) => {
            console.log(error);
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
    else form.post(route('dashboard.vehicles.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: (error) => {
            console.log(error);
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <form @submit.prevent="saveVehicle" class="space-y-6">
            <ImageUpload name="photo" @change="photoChange" :image="vehicle && vehicle.photo? (vehicle.photo):null"></ImageUpload>

            <div>
                <InputLabel for="category" value="Categoria" />

                <TextInput
                    list="categories"
                    id="category"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.category"
                    required/>

                    <datalist id="categories">
                        <option v-for="category in categories" :value="category.name"/>
                    </datalist>

                <InputError class="mt-2" :message="form.errors.category" />
            </div>

            <div>
                <InputLabel for="plate" value="Placa" />

                <TextInput
                    id="plate"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.plate"
                    required/>

                <InputError class="mt-2" :message="form.errors.plate" />
            </div>

            <div>
                <InputLabel for="rental_cost" value="Valor do Aluguel" />

                <TextInput
                    id="rental_cost"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.rental_cost"
                    required/>

                <InputError class="mt-2" :message="form.errors.rental_cost" />
            </div>

            <div>
                <InputLabel for="year" value="Ano" />

                <TextInput
                    id="year"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.year"
                    required/>

                <InputError class="mt-2" :message="form.errors.year" />
            </div>

            <div>
                <InputLabel for="description" value="Descrição" />

                <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.description"
                    required/>

                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div>
                <InputLabel for="model" value="Modelo" />

                <TextInput
                    id="model"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.model"
                    required/>

                <InputError class="mt-2" :message="form.errors.model" />
            </div>

            <div>
                <InputLabel for="brand" value="Marca" />

                <TextInput
                    id="brand"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.brand"
                    required/>
                <InputError class="mt-2" :message="form.errors.brand" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Salvar</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Adicionado</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
