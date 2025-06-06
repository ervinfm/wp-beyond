<script setup>
import { Head, Link } from '@inertiajs/vue3';
// Anda mungkin perlu library untuk merender Markdown, misal: 'marked'
// import { marked } from 'marked'; 
defineProps({ resources: Object, firstResource: Object });
</script>
<template>
    <Head title="Pusat Pengembang" />
    <div class="flex min-h-screen bg-gray-100 font-sans">
        <aside class="w-80 flex-shrink-0 bg-white border-r p-6 sticky top-0 h-screen overflow-y-auto">
            <h2 class="text-lg font-bold mb-6">Dokumentasi</h2>
            <nav v-for="(items, category) in resources" :key="category" class="mb-6">
                <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">{{ category }}</h3>
                <ul class="space-y-1">
                    <li v-for="item in items" :key="item.id">
                        <Link href="#" class="block px-3 py-2 text-sm rounded hover:bg-gray-100">{{ item.title }}</Link>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="flex-1 p-8 sm:p-12 overflow-y-auto">
            <article class="prose max-w-none">
                <h1>{{ firstResource.title }}</h1>
                <div v-html="firstResource.content"></div>
            </article>
        </main>
    </div>
</template>