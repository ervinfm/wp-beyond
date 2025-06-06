<script setup>
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    job: Object,
});
</script>

<template>
    <Head :title="job.title" />

    <div class="bg-gray-50 font-sans">
        <div class="container mx-auto p-4 sm:p-6 lg:p-8">
            <div class="mb-6">
                <Link :href="route('career.index')" class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                    &larr; Kembali ke semua lowongan
                </Link>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-8">
                <div class="lg:col-span-8 bg-white p-6 sm:p-8 rounded-xl shadow-md">
                    <div class="border-b border-gray-200 pb-4 mb-6">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full mb-2 inline-block"
                            :class="{
                                'bg-green-100 text-green-800': job.type === 'Full-time',
                                'bg-blue-100 text-blue-800': job.type === 'Part-time',
                                'bg-yellow-100 text-yellow-800': job.type === 'Contract',
                                'bg-purple-100 text-purple-800': job.type === 'Internship',
                            }">
                            {{ job.type }}
                        </span>
                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900">{{ job.title }}</h1>
                        <p class="mt-2 text-lg text-gray-500">{{ job.location }}</p>
                    </div>

                    <div class="prose prose-lg max-w-none text-gray-700">
                        <h2 class="font-semibold text-xl text-gray-800 !mb-3">Deskripsi Pekerjaan</h2>
                        <div v-html="job.description"></div>
                    </div>

                    <div v-if="job.responsibilities && job.responsibilities.length > 0" class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800 border-b pb-2 mb-4">Tanggung Jawab Utama</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-700">
                            <li v-for="(item, index) in job.responsibilities" :key="`resp-${index}`" class="leading-relaxed">
                                {{ item }}
                            </li>
                        </ol>
                    </div>

                    <div v-if="job.qualifications && job.qualifications.length > 0" class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800 border-b pb-2 mb-4">Kualifikasi yang Dibutuhkan</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-700">
                            <li v-for="(item, index) in job.qualifications" :key="`qual-${index}`" class="leading-relaxed">
                                {{ item }}
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="lg:col-span-4 lg:mt-0">
                    <div class="sticky top-8 bg-white p-6 rounded-xl shadow-md border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-3">Ringkasan Lowongan</h3>
                        <div class="space-y-4 py-4">
                            <div class="flex items-start">
                                <i class="fas fa-calendar-alt text-gray-400 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Batas Lamaran</p>
                                    <p class="font-semibold text-gray-800">{{ job.closing_date_formatted }}</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-briefcase text-gray-400 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Jenis Pekerjaan</p>
                                    <p class="font-semibold text-gray-800">{{ job.type }}</p>
                                </div>
                            </div>
                             <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-gray-400 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Lokasi</p>
                                    <p class="font-semibold text-gray-800">{{ job.location }}</p>
                                </div>
                            </div>
                        </div>
                        <a :href="job.apply_url" class="mt-4 w-full inline-block text-center bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition-all duration-300 shadow-sm">
                            Lamar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
/* Styling tambahan untuk konten dari v-html jika diperlukan */
.prose h2 {
    margin-bottom: 0.5em; /* Memberi sedikit jarak bawah pada heading di dalam prose */
}
.prose ul {
    margin-top: 1em;
}
</style>