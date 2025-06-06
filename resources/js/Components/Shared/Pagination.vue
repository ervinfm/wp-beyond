<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links: Array,
});
</script>

<template>
    <div v-if="links.length > 3" class="flex justify-center items-center space-x-1 mt-12">
        <template v-for="(link, key) in links" :key="key">
            <div
                v-if="link.url === null"
                class="px-4 py-2 text-sm text-gray-400 border rounded-md"
                v-html="link.label"
            />
            <Link
                v-else
                class="px-4 py-2 text-sm border rounded-md hover:bg-blue-600 hover:text-white transition-colors"
                :class="{ 'bg-blue-600 text-white': link.active }"
                :href="link.url"
                v-html="link.label"
            />
        </template>
    </div>
</template>