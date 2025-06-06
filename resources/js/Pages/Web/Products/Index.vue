<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BannerSection from '@/Components/Web/Product/BannerSection.vue';
import ProductCard from '@/Components/Web/Product/ProductCard.vue'; // Import ProductCard
import Pagination from '@/Components/Shared/Pagination.vue';

defineProps({
    products: Object, // Lebih spesifik menggunakan Array jika itu adalah array
});
</script>

<template>
    <Head title="Products" />

    <BannerSection />

    <section class="py-5 md:py-10 bg-slate-50">
        <div class="container mx-auto px-4">
            <div v-if="products && products.data && products.data.length > 0">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
                    <ProductCard
                        v-for="product in products.data"
                        :key="product.id"
                        :product="product" />
                </div>

                <Pagination :links="products.links" class="mt-12" />

            </div>
            <div v-else class="text-center py-5">
              
                <h3 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-black">Belum Ada Produksi</h3>
                <p class="mt-1 text-black-300">
                    Saat ini belum ada produk yang tersedia. Silakan kembali lagi nanti!
                </p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-slate-50 dark:bg-slate-900">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">
                Siap Mengubah Bisnis Anda?
            </h2>
            <p class="text-yellow-100 dark:text-yellow-200 text-lg mb-8 max-w-xl mx-auto">
                Diskusikan kebutuhan Anda dengan tim ahli kami dan temukan solusi SaaS terbaik.
            </p>
            <Link href="/contact" class="bg-white hover:bg-gray-100 text-yellow-600 font-bold py-3 px-8 rounded-lg text-lg transition duration-150 ease-in-out transform hover:scale-105">
                Hubungi Kami
            </Link>
        </div>
    </section>

</template>