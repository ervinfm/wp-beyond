<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Grid, FreeMode } from 'swiper/modules'; // Hapus Pagination jika tidak dipakai

// Impor CSS Swiper
import 'swiper/css';
import 'swiper/css/grid'; // <-- CSS khusus untuk modul Grid

// Impor data dari file terpisah
import { clientList } from '@/../js/_data/clientLogos.js'; // Sesuaikan path jika perlu

// Definisikan modul yang akan digunakan
const modules = [Autoplay, Grid, FreeMode];
</script>

<template>
    <div class="bg-white py-12 sm:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h5 class="text-lg text-yellow-600 mb-2">Semangat dalam Perjalanan kami</h5>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Dipercaya oleh Klien Terkemuka
                </h2>
                <p class="mt-4 text-lg leading-8 text-gray-600">
                    Kami bangga telah menjadi mitra teknologi bagi berbagai bidang dan skala bisnis.
                </p>
            </div>

            <div class="client-swiper-container">
                <swiper
                    :modules="modules"
                    :grid="{ rows: 2, fill: 'row' }"
                    :spaceBetween="40"
                    :freeMode="true"  
                    :loop="false"  
                    :autoplay="{
                        delay: 0, // Atur delay ke angka sangat kecil untuk gerakan kontinu
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true, // Berhenti saat mouse di atas slider
                    }"
                    :speed="1000" 
                    :breakpoints="{
                        320: { slidesPerView: 2, spaceBetween: 20 },
                        640: { slidesPerView: 3, spaceBetween: 30 },
                        768: { slidesPerView: 4, spaceBetween: 40 },
                        1024: { slidesPerView: 5, spaceBetween: 50 },
                        1280: { slidesPerView: 6, spaceBetween: 60 },
                    }"
                >
                    <swiper-slide v-for="client in clientList" :key="client.id">
                        <div class="flex items-center justify-center p-4 h-full group">
                            <img
                                :src="client.imageUrl"
                                :alt="client.name"
                                class="max-h-16 max-w-full object-contain opacity-60 transition-all duration-300 group-hover:grayscale-0 group-hover:opacity-100 group-hover:scale-110"
                                :title="client.name"
                            />
                        </div>
                    </swiper-slide>
                </swiper>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Menghapus semua CSS custom untuk tinggi, biarkan Swiper yang mengatur */
.client-swiper-container {
    /* Kita bisa beri sedikit padding bawah jika ingin ada pagination dots */
    padding-bottom: 2rem; 
}

/* Override gaya Swiper untuk memastikan slide menyesuaikan tinggi 2 baris */
.client-swiper-container .swiper-slide {
    height: calc((100% - 30px) / 2); /* 30px adalah contoh spaceBetween untuk grid */
    align-self: stretch;
}

/* Styling untuk pagination dots jika Anda ingin menggunakannya */
:deep(.swiper-pagination-bullet) {
    background-color: #d1d5db; /* gray-300 */
    opacity: 0.8;
}

:deep(.swiper-pagination-bullet-active) {
    background-color: #3b82f6; /* blue-500 */
    opacity: 1;
}
</style>