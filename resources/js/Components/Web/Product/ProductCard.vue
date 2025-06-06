<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    product: {
        type: Object,
        required: true,
    },
});

const intervalMap = {
    daily: '/hari',
    weekly: '/minggu',
    monthly: '/bulan',
    yearly: '/tahun',
};

const priceDisplayString = computed(() => {
    const product = props.product;
    const rawPrice = product.price;

    if (rawPrice === null || rawPrice === undefined) {
        return 'Hubungi Penjual';
    }

    const numericPrice = Number(rawPrice);

    if (isNaN(numericPrice)) {
        return 'Harga Error';
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

const imageUrl = computed(() => {
    return props.product.image ? `/images/products/${props.product.image}` : '/images/products/default-product-image.jpg';
});
</script>

<template>
    <div
        class="bg-white dark:bg-slate-800 shadow-lg rounded-xl overflow-hidden transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-105 flex flex-col">
        
        <div class="relative group"> 
            <Link :href="route('products.show', product.slug)" class="block">
                <img :src="imageUrl" :alt="product.title"
                     class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-110" />
            </Link>
            <span v-if="product.is_featured"
                  class="absolute top-3 right-3 bg-yellow-400 text-yellow-900 text-xs font-semibold px-3 py-1 rounded-md shadow-md z-10">
                Unggulan
            </span>
        </div>

        <div class="p-6 flex flex-col flex-grow">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2 truncate" :title="product.title">
                <Link :href="route('products.show', product.slug)" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                    {{ product.title }}
                </Link>
            </h3>

            <p class="text-gray-600 dark:text-slate-300 text-sm mb-4 flex-grow line-clamp-3" :title="product.short_description">
                {{ product.short_description }}
            </p>

            <div class="mt-auto">
                <div class="flex items-baseline justify-between mb-4">
                    <span class="text-md font-bold text-yellow-600 dark:text-yellow-400">{{ priceDisplayString }}</span>
                </div>

                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                    <Link :href="route('products.show', product.slug)"
                          class="w-full text-sm text-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out transform hover:scale-105">
                        Lihat Detail
                    </Link>
                    <a v-if="product.demo_url" :href="product.demo_url" target="_blank"
                       class="w-full text-sm text-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out transform hover:scale-105">
                        Coba Demo
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.line-clamp-3 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}
</style>