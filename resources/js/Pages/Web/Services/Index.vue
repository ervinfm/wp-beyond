<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Shared/Pagination.vue';
import BannerSection from '@/Components/Web/Service/BannerSection.vue';

defineProps({
    services: Object, // services.data akan berisi array layanan
});

const defaultServiceImage = '/images/services/default-service.jpg'; // Sediakan gambar default ini
const handleImageError = (event) => {
    event.target.src = defaultServiceImage;
};
</script>

<template class="bg-gray-50">
    <Head title="Layanan Kami" />

    <BannerSection />

    <div class="bg-gray-50 py-16 sm:py-10">
        <div class="container mx-auto sm:px-6 lg:px-8">
            <div v-if="services.data && services.data.length > 0">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div 
                        v-for="service in services.data" 
                        :key="service.id"
                        class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col relative border border-gray-200 hover:border-yellow-500"
                    >
                        <div v-if="service.is_featured" 
                             class="absolute top-0 right-0 mt-4 mr-4 px-3 py-1 bg-yellow-500 text-white text-xs font-bold rounded-full shadow-md flex items-center z-10">
                            <i class="fas fa-star mr-1 text-xs"></i>
                            Unggulan
                        </div>

                        <Link :href="route('services.show', service.slug)" class="flex flex-col h-full">
                            <div class="h-52 w-full overflow-hidden">
                                <img 
                                    :src="service.image_url || defaultServiceImage" 
                                    :alt="service.title" 
                                    @error="handleImageError"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500 ease-out"
                                >
                            </div>

                            <div class="p-6 flex-grow flex flex-col">
                                <div class="mb-5">
                                    <span class="inline-flex items-center justify-center h-14 w-14 rounded-xl bg-yellow-100 text-yellow-600 group-hover:bg-yellow-600 group-hover:text-white transition-colors duration-300 shadow">
                                        <font-awesome-icon :icon="service.icon" class="text-2xl" />
                                    </span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-yellow-700 transition-colors duration-300">
                                    {{ service.title }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-4 flex-grow min-h-[60px]">
                                    {{ service.short_description }}
                                </p>
                                <div class="mt-auto pt-4 border-t border-gray-100">
                                    <span class="font-semibold text-sm text-yellow-600 group-hover:underline group-hover:tracking-wider transition-all duration-300">
                                        Pelajari Selengkapnya <span aria-hidden="true">&rarr;</span>
                                    </span>
                                </div>
                            </div>
                        </Link>
                    </div>
                </div>

                <Pagination :links="services.links" class="mt-16" />

            </div>
            <div v-else class="text-center py-16">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zm-7.518-.267A8.25 8.25 0 1120.25 10.5M8.288 14.212A5.25 5.25 0 1117.25 10.5" />
                </svg>
                <h3 class="mt-4 text-lg font-semibold text-gray-900">Layanan Belum Tersedia</h3>
                <p class="mt-2 text-base text-gray-500">Saat ini belum ada layanan yang dapat kami tampilkan. Silakan kunjungi kembali nanti.</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Style tambahan jika diperlukan, contohnya untuk tinggi kartu yang seragam jika deskripsi sangat bervariasi */
/* .group { min-height: 450px; } /* Anda bisa uncomment dan sesuaikan jika perlu */
</style>