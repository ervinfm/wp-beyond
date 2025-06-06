<script setup>
import { Head, Link } from '@inertiajs/vue3';
// import WebLayout from '@/Layouts/WebLayout.vue'; // Jika Anda menggunakan layout terpisah
import { computed } from 'vue';

const props = defineProps({
    product: Object,
});

const intervalMap = {
    daily: '/hari',
    weekly: '/minggu',
    monthly: '/bulan',
    yearly: '/tahun',
};

// Computed property untuk menampilkan string harga yang lengkap
const priceDisplayString = computed(() => {
    const product = props.product;
    const rawPrice = product.price;

    if (rawPrice === null || rawPrice === undefined) {
        return 'Hubungi untuk Penawaran';
    }

    const numericPrice = Number(rawPrice);

    if (isNaN(numericPrice)) {
        return 'Format harga salah';
    }

    if (numericPrice === 0) {
        return 'Tanya Admin';
    }

    const formattedNumPrice = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    }).format(numericPrice);

    if (product.pricing_type === 'one_time_purchase') {
        return `${formattedNumPrice} (Sekali Beli)`;
    }

    if (product.pricing_type === 'subscription') {
        const intervalString = intervalMap[product.subscription_interval] || '';
        return `${formattedNumPrice}${intervalString}`;
    }
    return formattedNumPrice;
});

// Gambar placeholder jika product.image null
const imageUrl = computed(() => {
    return props.product.image ? `/images/products/${props.product.image}` : '/images/products/default-product-image.jpg';
});
</script>

<template>
    <Head :title="product.title" />
    <div class="bg-grey-200 py-0 md:py-5">
            <div class="container mx-auto px-4">
                <div class="mb-6">
                    <Link :href="route('products.index')" class="text-yellow-600 dark:text-yellow-800 hover:underline">
                        &larr; Kembali ke Semua Produk
                    </Link>
                </div>

                <div class="lg:flex lg:space-x-12 bg-white dark:bg-slate-800 p-6 md:p-10 rounded-xl shadow-xl">
                    <div class="relative group">
                        <Link :href="route('products.show', product.slug)" class="block">
                            <img :src="imageUrl" :alt="product.title"
                                class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110" />
                        </Link>
                        
                    </div>

                    <div class="lg:w-1/2">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-3">
                            {{ product.title }}
                        </h1>
                        <span v-if="product.is_featured"
                              class="inline-block bg-yellow-400 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full mb-4">
                            Produk Unggulan
                        </span>

                        <p class="text-gray-600 dark:text-slate-300 mb-6 text-lg">
                            {{ product.short_description }}
                        </p>

                        <div class="mb-6">
                            <span class="text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ priceDisplayString }}</span>
                            <span v-if="product.pricing_type === 'subscription' && product.price !== null && product.price !== 0" class="text-sm text-gray-500 dark:text-slate-400 ml-1">
                            </span>
                        </div>

                        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 mb-8">
                            <a v-if="product.demo_url" :href="product.demo_url" target="_blank"
                               class="w-full sm:w-auto text-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-150 ease-in-out transform hover:scale-105 text-md">
                                Lihat Demo Live
                            </a>
                            <Link :href="route('contact')" class="w-full sm:w-auto text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg transition duration-150 ease-in-out transform hover:scale-105 text-md">
                                Dapatkan Penawaran
                            </Link>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold text-gray-700 dark:text-slate-200 mb-3">Deskripsi Lengkap:</h2>
                            <div class="text-white text-md" v-html="product.long_description">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="py-12 md:py-16 bg-slate-100 dark:bg-slate-800"> <div class="container mx-auto px-4 text-center">
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-8">Punya Pertanyaan Lebih Lanjut?</h3>
                <Link :href="route('contact')" class="bg-yellow-700 hover:bg-yellow-800 text-white font-semibold py-3 px-8 rounded-lg transition duration-150 ease-in-out">
                    Hubungi Tim Sales Kami
                </Link>
            </div>
        </section>
    </template>

<style scoped>
.prose :where(img):not(:where([class~="not-prose"] *)) {
  margin-top: 2em;
  margin-bottom: 2em;
  border-radius: 0.5rem;
}
</style>