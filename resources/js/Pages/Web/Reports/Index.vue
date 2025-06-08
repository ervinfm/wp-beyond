<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useIntersectionObserver } from '@vueuse/core';
import Pagination from '@/Components/Shared/Pagination.vue';

import BannerSection from '@/Components/Web/resources/BannerSection.vue';

const props = defineProps({
    featuredReport: Object,
    otherReports: Object
});

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
};

// Logika untuk animasi saat scroll
const target = ref(null);
const isVisible = ref(false);
const { stop } = useIntersectionObserver(target, ([{ isIntersecting }]) => {
    if (isIntersecting) {
        isVisible.value = true;
        stop();
    }
}, { threshold: 0.1 });
</script>

<template>
    <Head title="White Paper & Laporan" />

    <BannerSection />
    <div ref="target" class="bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-4 py-2 sm:py-2">
            <section v-if="featuredReport" class="">
                <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center bg-slate-50 rounded-3xl p-8 lg:p-12">
                    <Link :href="route('reports.show', featuredReport.slug)" :class="['block w-full h-full transition-all duration-700 delay-300', isVisible ? 'opacity-100 scale-100' : 'opacity-0 scale-95']">
                        <img :src="`/images/reports/${featuredReport.cover_image}`" :alt="featuredReport.title" class="rounded-2xl shadow-2xl object-cover w-full h-full min-h-[300px]">
                    </Link>
                    <div :class="['relative bg-white/70 backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-white/50 lg:-ml-24 transition-all duration-700 delay-500', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10']">
                        <div class="flex justify-between items-center">
                            <p class="text-sm font-bold text-blue-600 uppercase tracking-wider">{{ featuredReport.category }}</p>
                            <p class="text-sm text-gray-500">{{ featuredReport.reading_time }} min baca</p>
                        </div>
                        <h2 class="mt-4 text-3xl font-bold tracking-tight text-gray-900">
                            <Link :href="route('reports.show', featuredReport.slug)" class="hover:text-blue-700 transition-colors">
                                {{ featuredReport.title }}
                            </Link>
                        </h2>
                        <p class="mt-4 text-gray-600 line-clamp-3">{{ featuredReport.summary }}</p>
                        <div class="mt-6 text-sm text-gray-500">
                            <span>{{ formatDate(featuredReport.published_at) }}</span>
                        </div>
                        <Link :href="route('reports.show', featuredReport.slug)" class="mt-6 inline-flex items-center gap-x-2 rounded-md bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                            Unduh Laporan
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path d="M10.75 2.75a.75.75 0 0 0-1.5 0v8.614L6.295 8.235a.75.75 0 1 0-1.09 1.03l4.25 4.5a.75.75 0 0 0 1.09 0l4.25-4.5a.75.75 0 0 0-1.09-1.03l-2.955 3.129V2.75Z" /><path d="M3.5 12.75a.75.75 0 0 0-1.5 0v2.5A2.75 2.75 0 0 0 4.75 18h10.5A2.75 2.75 0 0 0 18 15.25v-2.5a.75.75 0 0 0-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5Z" /></svg>
                        </Link>
                    </div>
                </div>
            </section>

            <section v-if="otherReports.data.length > 0" class="mt-5">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center">Jelajahi Arsip Riset Kami</h2>
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <article v-for="(report, index) in otherReports.data" :key="report.id" :class="['relative group transition-all duration-700', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10']" :style="{ transitionDelay: `${500 + (index * 100)}ms` }">
                        <div class="absolute -inset-2.5 bg-gradient-to-r from-blue-400 to-purple-600 rounded-xl blur opacity-0 group-hover:opacity-75 transition-opacity duration-300"></div>
                        
                        <Link :href="route('reports.show', report.slug)" class="relative block bg-white p-6 rounded-xl h-full shadow-md border border-gray-200">
                            <div class="flex justify-between items-center text-xs text-gray-500">
                                <span class="font-bold text-blue-600 uppercase">{{ report.category }}</span>
                                <span>{{ report.reading_time }} min baca</span>
                            </div>
                            <h3 class="mt-4 text-lg font-bold text-gray-900">
                                {{ report.title }}
                            </h3>
                            <p class="mt-2 line-clamp-2 text-sm text-gray-600">{{ report.summary }}</p>
                            <p class="mt-4 text-xs text-gray-400">{{ formatDate(report.published_at) }}</p>
                        </Link>
                    </article>
                </div>
                <Pagination :links="otherReports.links" class="mt-16" />
            </section>
        </div>
    </div>
</template>