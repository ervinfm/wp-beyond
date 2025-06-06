<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    featuredServices: Array,
});
</script>

<template>
    <div class="bg-gray-50 py-16 sm:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <h2 class="text-base font-semibold leading-7 text-yellow-600">Layanan Unggulan</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Solusi Digital untuk Mendorong Pertumbuhan Bisnis Anda
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Dari ide hingga implementasi, kami menyediakan solusi teknologi yang teruji untuk mengatasi tantangan paling kompleks dan membuka peluang baru bagi perusahaan Anda.
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <div 
                    v-for="service in featuredServices" 
                    :key="service.id" 
                    class="group relative transform hover:-translate-y-2 transition-transform duration-300"
                >
                    <Link :href="route('services.show', service.slug)" class="block h-full">
                        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 p-8 h-full flex flex-col">
                            <div class="mb-6">
                                <span class="inline-flex items-center justify-center h-12 w-12 rounded-lg bg-yellow-100 text-yellow-600">
                                   <font-awesome-icon :icon="service.icon" class="text-2xl" />
                                </span>
                            </div>
                            
                            <h3 class="font-bold text-lg text-gray-900 mb-2">{{ service.title }}</h3>
                            <p class="text-sm text-gray-600 flex-grow">{{ service.short_description }}</p>
                            
                            <div class="mt-6 font-semibold text-sm text-yellow-600 group-hover:text-yellow-800">
                                Pelajari Lebih Lanjut <span aria-hidden="true">&rarr;</span>
                            </div>
                        </div>
                    </Link>
                </div>

                <p v-if="!featuredServices || featuredServices.length === 0" class="text-center col-span-full mt-8 text-gray-600">
                    Belum ada layanan unggulan untuk ditampilkan.
                </p>
            </div>

            <div v-if="featuredServices && featuredServices.length > 0" class="text-center mt-16">
                 <Link :href="route('services.index')" class="inline-block px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 transition-colors">
                    Lihat Semua Layanan Kami
                </Link>
            </div>

        </div>
    </div>
</template>

<style scoped>
/* Tidak ada CSS tambahan yang diperlukan, semua di-handle oleh Tailwind */
</style>