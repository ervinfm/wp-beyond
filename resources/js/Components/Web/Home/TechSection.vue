<script setup>
import { defineProps } from 'vue';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper modules yang dibutuhkan
// Autoplay untuk otomatis berganti slide
// Navigation untuk panah (opsional)
// Pagination untuk dots (opsional)
// Grid untuk tata letak multi-baris
import { Autoplay, Navigation, Pagination, Grid } from 'swiper/modules';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/grid'; // Penting: Import styling untuk Grid
import 'swiper/css/navigation'; // Import jika Anda menggunakan panah navigasi
import 'swiper/css/pagination'; // Import jika Anda menggunakan pagination dots

defineProps({
    technologyLogos: Array,
});

// Daftarkan modul Swiper yang akan digunakan, termasuk Grid
const modules = [Autoplay, Navigation, Pagination, Grid];
</script>

<template>
    <div class="bg-white py-16 sm:py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-base font-semibold leading-7 text-yellow-600">Teknologi Pilihan Kami</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                    Fondasi Solusi Digital Anda
                </p>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Kami membangun solusi digital yang kokoh dan inovatif dengan menggunakan teknologi terkini dan teruji.
                </p>
            </div>

            <div class="relative">
                <swiper
                    :modules="modules"
                    :loop="true"
                    :autoplay="{
                        delay: 1000,
                        disableOnInteraction: false,
                    }"
                    :grid="{
                        rows: 2,           // Mengatur slider untuk memiliki 2 baris
                        fill: 'row',       // Mengisi baris secara horizontal terlebih dahulu
                        // rowsGap: 20    // Opsional: Jarak vertikal antar baris (dalam piksel). Sesuaikan jika perlu.
                    }"
                    :breakpoints="{
                        // Konfigurasi responsif untuk jumlah kolom (slidesPerView)
                        // dan jarak horizontal (spaceBetween)
                        0: {
                            slidesPerView: 2,  // 2 kolom, 2 baris = 4 logo terlihat
                            spaceBetween: 20,
                        },
                        640: {
                            slidesPerView: 3,  // 3 kolom, 2 baris = 6 logo terlihat
                            spaceBetween: 30,
                        },
                        768: {
                            slidesPerView: 4,  // 4 kolom, 2 baris = 8 logo terlihat
                            spaceBetween: 40,
                        },
                        1024: {
                            slidesPerView: 5,  // 5 kolom, 2 baris = 10 logo terlihat
                            spaceBetween: 50,
                        },
                        1280: {
                            slidesPerView: 6,  // 6 kolom, 2 baris = 12 logo terlihat
                            spaceBetween: 60,
                        },
                    }"
                    class="mySwiper-grid" >
                    <swiper-slide
                        v-for="(tech, index) in technologyLogos"
                        :key="index"
                    >
                        <div
                            class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 transform hover:scale-105 h-full"
                        >
                            <img
                                :src="`/images/tech-icons/${tech.logo_path}`"
                                :alt="tech.name"
                                class="h-16 w-16 object-contain mb-3 hover:grayscale-0 transition-filter duration-300"
                            />
                            <p class="text-base font-semibold text-gray-800 text-center">{{ tech.name }}</p>
                        </div>
                    </swiper-slide>
                </swiper>

                </div>
        </div>
    </div>
</template>

<style scoped>
/* Kelas kustom untuk slider 2 baris */
.mySwiper-grid {
    /* Tinggi kontainer Swiper sangat penting untuk layout grid.
       Sesuaikan tinggi ini agar cukup untuk 2 baris logo dan jarak antar baris.
       Misal: (tinggi_kartu + jarak_vertikal_antar_kartu) * 2 */
    height: 350px; /* Contoh: Sesuaikan sesuai tinggi kartu logo Anda + jarak */
    padding-bottom: 50px; /* Memberi ruang untuk pagination dots jika diaktifkan */
}

/* Override gaya Swiper untuk memastikan slide menyesuaikan tinggi 2 baris */
/* Ini penting agar setiap slide mengambil tinggi yang benar dalam grid */
.mySwiper-grid .swiper-slide {
    /* Calculate height for each row based on total height and rowsGap */
    /* var(--swiper-grid-rows-gap) adalah variabel CSS yang digunakan Swiper untuk rowsGap */
    height: calc((100% - var(--swiper-grid-rows-gap, 0px)) / 2) !important;
    /* Default 0px jika rowsGap tidak diatur. Jika Anda mengatur rowsGap: 20, maka gunakan 20px */
}

/* Pastikan konten di dalam slide mengambil tinggi penuh dari slot slide-nya */
.mySwiper-grid .swiper-slide > div {
    height: 100%;
}

/* Anda bisa tambahkan styling khusus Swiper lainnya di sini jika perlu */
/* .swiper-button-prev,
.swiper-button-next {
    color: #f59e0b;
} */
</style>