<script setup>
import { Link } from '@inertiajs/vue3';

// Definisikan prop untuk menerima data portofolio dari Main.vue
defineProps({
    featuredPortfolio: {
        type: Array,
        default: () => [], // Pastikan ada nilai default array kosong
    },
});
</script>

<template>
    <div class="bg-gray-100 py-16 sm:py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-base font-semibold leading-7 text-yellow-600">Proyek Unggulan Kami</h2>
                <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                    Karya Terbaik Kami
                </p>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Lihatlah beberapa proyek terbaru yang telah kami selesaikan, menunjukkan keahlian dan dedikasi kami.
                </p>
            </div>

            <template v-if="featuredPortfolio && featuredPortfolio.length > 0">
                <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-x-8 gap-y-12">
                    <Link 
                        v-for="(portfolio, index) in featuredPortfolio" 
                        :key="portfolio.id" 
                        :href="route('portfolio.show', portfolio.slug)"
                        class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 flex flex-col md:flex-row overflow-hidden group"
                    >
                        <div v-if="portfolio.cover_image" class="md:w-1/3 flex-shrink-0">
                            <img 
                                :src="`/images/portfolio/${portfolio.cover_image}`" 
                                :alt="portfolio.title" 
                                class="w-full h-48 md:h-full object-cover"
                            />
                        </div>
                        
                        <div class="p-6 flex flex-col justify-between md:w-2/3">
                            <div>
                                <h3 class="font-bold text-xl mb-2 text-gray-900 group-hover:text-yellow-700 transition-colors duration-200">{{ portfolio.title }}</h3>
                                <p class="text-sm text-gray-700">{{ portfolio.description.substring(0, 150) + (portfolio.description.length > 150 ? '...' : '') }}</p>
                            </div>
                            <div class="mt-4 text-sm text-gray-500">
                                <p v-if="portfolio.client_name">Klien: <span class="font-semibold">{{ portfolio.client_name }}</span></p>
                                <p>Tanggal Proyek: {{ new Date(portfolio.project_date).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' }) }}</p>
                                <span class="block mt-2 text-yellow-600 group-hover:underline font-semibold">Lihat Detail &rarr;</span>
                            </div>
                        </div>
                    </Link>

                </div>
            </template>
            <p v-else class="text-center mt-8 text-gray-600 text-lg">
                Belum ada proyek portofolio untuk ditampilkan saat ini.
            </p>
        </div>
    </div>
</template>

<style scoped>
/* Tambahkan styling khusus jika diperlukan */
</style>