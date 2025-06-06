<script setup>
import { Head, Link } from '@inertiajs/vue3';
defineProps({ reports: Object });
</script>
<template>
    <Head title="White Paper & Laporan" />
    <div class="container mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold text-center mb-12">Laporan & Riset Industri</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div v-for="report in reports.data" :key="report.id" class="bg-white rounded-lg shadow-md overflow-hidden">
                <img :src="report.cover_image" alt="" class="h-48 w-full object-cover">
                <div class="p-6">
                    <p class="text-sm text-gray-500">{{ report.published_at }}</p>
                    <h2 class="text-xl font-bold mt-2">{{ report.title }}</h2>
                    <p class="text-gray-600 mt-2 text-sm">{{ report.summary }}</p>
                    <Link :href="route('reports.show', report.slug)" class="mt-4 inline-block text-blue-600 font-semibold">
                        Selengkapnya & Unduh &rarr;
                    </Link>
                </div>
            </div>
        </div>
        </div>
</template>