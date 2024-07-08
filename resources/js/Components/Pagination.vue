<script setup> 
    import { Link } from '@inertiajs/vue3';

    defineProps({
        links: Array,
    });
</script>

<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="link in links" :key="link.label">
                <Link 
                    v-if="link.url"
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded"
                    :class="{ 'bg-blue-800 text-white': link.active, 'bg-white': !link.active }"
                    :href="link.url"
                    v-html="link.label" />
                <span 
                    v-else
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded border-transparent text-gray-500 cursor-default"
                    v-html="link.label" 
                />
            </template>
        </div>
    </div>
</template>
