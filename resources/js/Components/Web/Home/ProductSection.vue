<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    featuredProducts: {
        type: Array,
        default: () => [] // Default ke array kosong, ditangani di computed property
    }
});

const activeProductIndex = ref(0);

// Objek default untuk fallback jika tidak ada produk
const defaultProductData = {
    id: 0,
    label: 'Informasi Produk',
    title: 'Produk Unggulan Belum Tersedia',
    subtitle: 'Cek kembali nanti atau hubungi kami untuk informasi lebih lanjut.',
    buttonText: 'Hubungi Kami',
    buttonUrl: '/contact',
    image_filename: 'default-product-placeholder.png', // Pastikan gambar ini ada
};

// Computed property untuk produk yang sedang aktif
const activeProduct = computed(() => {
    if (props.featuredProducts && props.featuredProducts.length > 0) {
        return props.featuredProducts[activeProductIndex.value];
    }
    return defaultProductData; // Gunakan objek default
});

// Computed property untuk URL gambar lengkap
const currentProductImageUrl = computed(() => {
    // Mengambil nama file dari activeProduct, yang bisa jadi dari props atau defaultProductData
    const filename = activeProduct.value.image_filename;
    // Base path untuk gambar produk Anda
    const basePath = '/images/products/'; 
    return `${basePath}${filename}`;
});

// Navigasi produk
const navigateProduct = (direction) => {
    const productsCount = props.featuredProducts.length;
    if (productsCount <= 1) return;

    let newIndex = activeProductIndex.value;
    if (direction === 'next') {
        newIndex = (newIndex + 1) % productsCount;
    } else if (direction === 'prev') {
        newIndex = (newIndex - 1 + productsCount) % productsCount;
    }
    activeProductIndex.value = newIndex;
};

const goToProduct = (index) => {
    const productsCount = props.featuredProducts.length;
    if (productsCount === 0) return;
    if (index >= 0 && index < productsCount) {
        activeProductIndex.value = index;
    }
};

// Autoplay
let productAutoplayInterval = null;
onMounted(() => {
    if (props.featuredProducts && props.featuredProducts.length > 1) {
        productAutoplayInterval = setInterval(() => navigateProduct('next'), 8000);
    }
});

onUnmounted(() => {
    if (productAutoplayInterval) {
        clearInterval(productAutoplayInterval);
    }
});

</script>

<template>
    <div class="bg-gray-100 py-16 sm:py-12">
        <div class="container mx-auto p-4">
            <Transition name="product-fade" mode="out-in">
                <div 
                    :key="activeProduct.id"
                    class="mx-auto bg-white rounded-lg shadow-xl overflow-hidden"
                >
                    <div class="grid lg:grid-cols-2">
                        <div class="flex flex-col justify-center px-4 py-10 sm:px-12 lg:px-10 lg:py-16 order-last lg:order-first">
                            <div class="max-w-xl mx-auto lg:mx-0 text-center lg:text-left">
                                <h2 class="text-base font-semibold leading-7 text-yellow-600">{{ activeProduct.label }}</h2>
                                <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                                    {{ activeProduct.title }}
                                </h1>
                                <p class="mt-6 text-lg text-gray-600 min-h-[100px]"> {{ activeProduct.subtitle }}
                                </p>
                                <div class="mt-10">
                                    <Link 
                                        :href="activeProduct.buttonUrl" 
                                        class="inline-block px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 transition-colors"
                                    >
                                        {{ activeProduct.buttonText }}
                                    </Link>
                                </div>
                            </div>
                        </div>
                        
                        <div class="relative h-80 lg:h-full bg-gray-200 min-h-[320px] lg:min-h-[400px]">
                            <Transition name="image-fade" mode="out-in">
                                <img
                                    :key="currentProductImageUrl"
                                    class="absolute inset-0 h-full w-full object-contain p-4 md:p-8" 
                                    :src="currentProductImageUrl"
                                    :alt="activeProduct.title"
                                >
                            </Transition>
                        </div>
                    </div>
                </div>
            </Transition>

            <div v-if="props.featuredProducts && props.featuredProducts.length > 1" class="mt-8 flex justify-center items-center space-x-4">
                <button @click="navigateProduct('prev')" aria-label="Produk Sebelumnya" class="p-2 rounded-full hover:bg-gray-200 transition">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <div class="flex space-x-2">
                    <button
                        v-for="(product, index) in props.featuredProducts"
                        :key="`nav-${product.id}`"
                        @click="goToProduct(index)"
                        :aria-label="`Ke Produk ${index + 1}`"
                        class="w-3 h-3 rounded-full transition-colors"
                        :class="[activeProductIndex === index ? 'bg-yellow-600' : 'bg-gray-300 hover:bg-gray-400']"
                    ></button>
                </div>
                <button @click="navigateProduct('next')" aria-label="Produk Berikutnya" class="p-2 rounded-full hover:bg-gray-200 transition">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Transisi untuk pergantian antar produk (kartu keseluruhan) */
.product-fade-enter-active,
.product-fade-leave-active {
    transition: opacity 0.5s ease-in-out;
}
.product-fade-enter-from,
.product-fade-leave-to {
    opacity: 0;
}

/* Transisi untuk pergantian gambar di dalam kartu */
.image-fade-enter-active,
.image-fade-leave-active {
    transition: opacity 0.4s ease-in-out;
}
.image-fade-enter-from,
.image-fade-leave-to {
    opacity: 0;
}
</style>