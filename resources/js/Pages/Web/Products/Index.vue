<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3'; // <-- Import router dari Inertia

import BannerSection from '@/Components/Web/Product/BannerSection.vue';
import ProductCard from '@/Components/Web/Product/ProductCard.vue';
import Pagination from '@/Components/Shared/Pagination.vue';

// 1. Sesuaikan props dengan yang dikirim dari controller
const props = defineProps({
    products: Object,
    productCategories: Array, // <-- Ganti nama & tipe data
    filters: Object, // <-- Prop baru untuk menampung filter aktif
});

// 2. State untuk tab yang aktif, diambil dari prop 'filters'
const activeCategory = ref(props.filters.category || 'all');

// 3. Fungsi untuk memfilter produk
const filterByCategory = (slug) => {
    activeCategory.value = slug; // Update state lokal untuk style aktif

    router.get(route('products.index'), { // Ganti dengan nama route Anda jika berbeda
        category: slug === 'all' ? null : slug, // Kirim slug sebagai query, atau null jika 'Semua'
    }, {
        preserveState: true, // Jaga state komponen (seperti input search)
        replace: true, // Ganti history state agar tombol back berfungsi normal
    });
};

</script>

<template>
    <Head title="Products" />

    <BannerSection />

    <section class="py-6 md:py-8 bg-slate-50">
        <div class="container mx-auto px-4">
            
            <div class="mb-10">
                <div class="flex justify-center flex-wrap gap-2">
                    <button
                        @click="filterByCategory('all')"
                        :class="[
                            'px-5 py-2 text-sm font-semibold rounded-full transition-all duration-200 ease-in-out focus:outline-none',
                            activeCategory === 'all'
                                ? 'bg-yellow-500 text-white shadow'
                                : 'bg-white text-gray-600 hover:bg-gray-100 border'
                        ]"
                    >
                        Semua Kategori
                    </button>
                    <button
                        v-for="category in productCategories"
                        :key="category.id"
                        @click="filterByCategory(category.slug)"
                        :class="[
                            'px-5 py-2 text-sm font-semibold rounded-full transition-all duration-200 ease-in-out focus:outline-none',
                            activeCategory === category.slug
                                ? 'bg-yellow-500 text-white shadow'
                                : 'bg-white text-gray-600 hover:bg-gray-100 border'
                        ]"
                    >
                        {{ category.name }}
                    </button>
                </div>
            </div>
            <div v-if="products.data.length > 0">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
                    <ProductCard
                        v-for="product in products.data"
                        :key="product.id"
                        :product="product" />
                </div>
                <Pagination :links="products.links" class="mt-12" />
            </div>
            
            <div v-else class="text-center py-16 bg-white rounded-lg shadow-sm">
                <h3 class="mt-2 text-2xl font-semibold text-gray-800">Produk Tidak Ditemukan</h3>
                <p class="mt-2 text-gray-500">
                    Saat ini belum ada produk yang cocok dengan filter yang Anda pilih.
                </p>
                <button @click="filterByCategory('all')" class="mt-6 text-blue-600 font-semibold hover:underline">
                    Lihat Semua Produk
                </button>
            </div>
        </div>
    </section>

    </template>