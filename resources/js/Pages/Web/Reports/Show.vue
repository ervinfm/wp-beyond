<script setup>
import { Head, Link, useForm  } from '@inertiajs/vue3';
import WebLayout from '@/Layouts/WebLayout.vue'; // Asumsi layout utama Anda
import { ref } from 'vue';
import { useIntersectionObserver } from '@vueuse/core';

// Memberitahu Inertia untuk menggunakan WebLayout
defineOptions({ layout: WebLayout });

const props = defineProps({
    report: Object,
    otherReports: Array,
});

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
};

// Logika untuk animasi saat scroll
const target = ref(null);
const isVisible = ref(false);
const { stop } = useIntersectionObserver(target, ([{ isIntersecting }]) => {
    if (isIntersecting) { isVisible.value = true; stop(); }
}, { threshold: 0.1 });

const form = useForm({
    email: '',
});

// Fungsi untuk menangani submit form
const submitDownloadRequest = () => {
    form.post(route('reports.download', props.report.slug), {
        preserveScroll: true,
        onSuccess: () => {
            // Ini akan berjalan jika backend berhasil, tapi karena backend mengembalikan
            // response download, browser akan langsung memulai unduhan.
            // Anda bisa membersihkan form di sini jika perlu.
            form.reset('email');
        },
        onError: () => {
            // Ini akan berjalan jika ada error validasi dari backend.
            // Pesan error akan otomatis tersedia di 'form.errors'
        }
    });
};
</script>

<template>
    <Head :title="report.title" />

    <div ref="target">
        <section class="relative bg-gray-900 py-24 sm:py-32 text-white">
            <img :src="`/images/reports/${report.cover_image}`" :alt="report.title" class="absolute inset-0 w-full h-full object-cover opacity-20 blur-sm">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/80 to-transparent"></div>

            <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p :class="['font-semibold text-yellow-400 uppercase tracking-wider transition-all duration-500', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">{{ report.category }}</p>
                <h1 :class="['mt-4 text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight transition-all duration-500 delay-100', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">{{ report.title }}</h1>
                <div :class="['mt-6 flex justify-center items-center gap-x-6 text-sm text-gray-300 transition-all duration-500 delay-200', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">
                    <span>Oleh {{ report.author }}</span>
                    <span class="opacity-50">&bull;</span>
                    <span>{{ formatDate(report.published_at) }}</span>
                    <span class="opacity-50">&bull;</span>
                    <span>{{ report.reading_time }} min baca</span>
                </div>
                <div class="mt-5">
                    <Link :href="route('reports.index')" class="dark:text-yellow-500 hover:underline">
                        &larr; Kembali ke Semua Riset
                    </Link>
                </div>
            </div>
        </section>

        <div class="bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <article :class="['lg:col-span-2 space-y-8 transition-all duration-700 delay-300', isVisible ? 'opacity-100' : 'opacity-0']">
                        <div>
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                                Ringkasan Eksekutif
                            </h2>
                            <p class="mt-4 text-lg text-gray-600">
                                {{ report.summary }}
                            </p>
                        </div>
                    </article>

                    <aside :class="['lg:col-span-1 transition-all duration-700 delay-500', isVisible ? 'opacity-100' : 'opacity-0']">
                        <div class="sticky top-8 bg-slate-50 border border-slate-200 rounded-2xl p-6">
                            <img :src="`/images/reports/${report.cover_image}`" :alt="report.title" class="w-full rounded-lg shadow-md mb-6">
                            <h3 class="font-bold text-gray-900">Dapatkan Wawasan Penuh</h3>
                            <p class="text-sm text-gray-600 mt-1">Unduh laporan lengkap (PDF) secara gratis dengan mengisi form di bawah.</p>
                            
                            <form @submit.prevent="submitDownloadRequest" class="mt-6 space-y-2">
                                <div>
                                    <label for="email" class="sr-only">Alamat Email</label>
                                    <input 
                                        v-model="form.email" 
                                        type="email" 
                                        name="email" 
                                        id="email" 
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500 sm:text-sm" 
                                        placeholder="Masukkan alamat email Anda"
                                        required
                                    >
                                    <div v-if="form.errors.email" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.email }}
                                    </div>
                                </div>
                                
                                <button 
                                    type="submit" 
                                    :disabled="form.processing"
                                    :class="[
                                        'w-full flex justify-center rounded-md bg-yellow-600 px-4 py-3 text-base font-semibold text-white shadow-sm hover:bg-yellow-700',
                                        { 'opacity-50 cursor-not-allowed': form.processing }
                                    ]"
                                >
                                    <span v-if="form.processing">Memproses...</span>
                                    <span v-else>Unduh Sekarang</span>
                                </button>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

        <section v-if="otherReports.length > 0" class="bg-slate-50 py-6 sm:py-6 border-t">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center mb-12">Baca Juga Laporan Lainnya</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <article v-for="other in otherReports" :key="other.id" class="group relative">
                        <Link :href="route('reports.show', other.slug)" class="block bg-white p-6 rounded-xl h-full shadow-md border border-gray-200 hover:border-yellow-300 transition-all duration-300">
                            <div class="flex justify-between items-center text-xs text-gray-500">
                                <span class="font-bold text-yellow-600 uppercase">{{ other.category }}</span>
                                <span>{{ other.reading_time }} min baca</span>
                            </div>
                            <h3 class="mt-4 text-lg font-bold text-gray-900 group-hover:text-yellow-600">
                                {{ other.title }}
                            </h3>
                        </Link>
                    </article>
                </div>
            </div>
        </section>

    </div>
</template>