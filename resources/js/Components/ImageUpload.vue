<template>
    <div class="flex flex-col w-60 mb-6 p-4 rounded-lg bg-gray-100 border border-1 border-gray-300">
        <img :src="imagePath" @click="triggerFileInput" class="w-full h-[200px] object-contain  object-center object-contain">
        <input type="file" :name="name" ref="fileInput" @change="onFileChange" class="hidden" accept="image/*">
        <div class="flex justify-around mt-4">
            <button type="button" v-if="!imageUrl" @click="triggerFileInput" class="p-1 text-blue-600">Escolher arquivo</button>
            <button type="button" v-if="imageUrl" @click="triggerFileInput" class="p-1 text-blue-600">Alterar</button>
            <button type="button" v-if="imageUrl" @click="removeImage" class="p-1 text-red-600">Remover</button>
        </div>
    </div>
</template>
  
<script>
    import defaultImage from '../../images/image.png'

    export default {
        props: {
            name: String,
            image: String
        },
        data() {
            return {
                imageUrl: null,
            }
        },
        /* watch: {
            value(newValue) {
                this.imageUrl = newValue;
            },
        }, */
        computed: {            
            imagePath(){
                return this.imageUrl ?? defaultImage;
            }
        },
        methods: {
            triggerFileInput() {
                this.$refs.fileInput.click();
            },
            onFileChange(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.imageUrl = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },
            removeImage(event){
                this.imageUrl = null;
                this.$emit('change', event);
            }
        },
        mounted: function(){
            this.imageUrl = this.image;
        }
    };
</script>
