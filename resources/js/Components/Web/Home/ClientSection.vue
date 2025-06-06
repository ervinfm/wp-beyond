<script setup>
import { ref } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination, FreeMode } from 'swiper/modules';

// Impor CSS Swiper
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/free-mode';


const modules = [Autoplay, Pagination, FreeMode];

// Daftar logo klien. GANTI DENGAN DATA ASLI ANDA
// Untuk 'imageUrl', gunakan path ke logo Anda di folder public
// Contoh placeholder: `https://placehold.co/200x100/EFEFEF/AAAAAA&text=NamaKlien`
const clientLogos = ref([
    { id: 1, name: 'KPU Indonesia', imageUrl: 'images/clients/kpu.png' },
    { id: 2, name: 'Telkom Indonesia', imageUrl: 'images/clients/telkom.png' },
    { id: 3, name: 'Bank Central Asia (BCA)', imageUrl: 'images/clients/bca.png' },
    { id: 4, name: 'Pemda Lebong', imageUrl: 'images/clients/lebong.png' },
    { id: 5, name: 'SMA N 1 Teladan Yogyakarta', imageUrl: 'images/clients/sma1yk.png' },
    { id: 6, name: 'Kementrian Kebudayaan RI', imageUrl: 'images/clients/kementrian-kebudayaan.png' },
    { id: 7, name: 'Pemprov Bengkulu', imageUrl: 'images/clients/bengkulu.png' },
    { id: 8, name: 'Garuda Indonesia', imageUrl: 'images/clients/garuda.png' },
    { id: 9, name: 'Indika Energy', imageUrl: 'images/clients/indika.png' },
    { id: 10, name: 'BUMN', imageUrl: 'images/clients/bumn.png' },
]);

const swiperOptions = {
    modules: modules,
    loop: true,
    freeMode: true, // Membuat slider terasa lebih mengalir bebas
    grabCursor: true,
    autoplay: {
        delay: 2000, // Waktu antar slide dalam milidetik
        disableOnInteraction: false, // Lanjutkan autoplay setelah interaksi user
        pauseOnMouseEnter: true, // Jeda autoplay saat kursor di atas slider
    },
    slidesPerView: 2, // Default untuk layar terkecil
    spaceBetween: 30,
    pagination: {
        clickable: true,
        dynamicBullets: true,
    },
    breakpoints: {
        // Responsive breakpoints
        640: { // sm
            slidesPerView: 3,
            spaceBetween: 30,
        },
        768: { // md
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1024: { // lg
            slidesPerView: 5,
            spaceBetween: 50,
        },
        1280: { // xl
            slidesPerView: 6,
            spaceBetween: 60,
        }
    }
};

</script>

<template>
    <div class="bg-white py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Dipercaya oleh Client Terkemuka
                </h2>
                <p class="mt-4 text-lg leading-8 text-yellow-600">
                    Kami bangga telah menjadi mitra teknologi bagi berbagai industri dan skala bisnis.
                </p>
            </div>

            <Swiper v-bind="swiperOptions">
                <SwiperSlide v-for="client in clientLogos" :key="client.id">
                    <div class="flex items-center justify-center h-full mb-10">
                        <img 
                            :src="client.imageUrl" 
                            :alt="client.name" 
                            class="max-h-16 w-auto object-contain transition-all duration-300  opacity-70 hover:grayscale-0 hover:opacity-100 hover:scale-110"
                        >
                        </div>
                </SwiperSlide>
            </Swiper>
        </div>
    </div>
</template>

<style scoped>
/* Kustomisasi tampilan paginasi Swiper jika diperlukan */
:deep(.swiper-pagination-bullet) {
    background-color: #9ca3af; /* Warna abu-abu untuk titik non-aktif */
    opacity: 0.8;
    transition: background-color 0.3s ease;
}

:deep(.swiper-pagination-bullet-active) {
    background-color: #3b82f6 !important; /* Warna biru untuk titik aktif (sesuaikan dengan brand Anda) */
    opacity: 1;
}

/* Menghilangkan panah navigasi default (jika tidak ingin digunakan) */
/* :deep(.swiper-button-next),
:deep(.swiper-button-prev) {
    display: none !important;
} */
</style>