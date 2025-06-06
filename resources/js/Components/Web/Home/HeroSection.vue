<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Impor Swiper & modul yang dibutuhkan (tanpa Pagination)
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay } from 'swiper/modules';

// Impor CSS dasar Swiper saja
import 'swiper/css';

const modules = [Autoplay];

// --- State Management untuk Kontrol Kustom ---
const swiperInstance = ref(null);
const isPlaying = ref(true);
const activeIndex = ref(0); // State baru untuk melacak slide yang aktif

// Fungsi untuk menyimpan instance Swiper
const onSwiper = (swiper) => {
    swiperInstance.value = swiper;
};

// Fungsi untuk mengupdate index aktif saat slide berubah
const onSlideChange = (swiper) => {
    // swiper.realIndex digunakan agar index benar saat mode loop aktif
    activeIndex.value = swiper.realIndex;
};

// Fungsi kontrol yang sudah ada
const toggleAutoplay = () => {
    if (isPlaying.value) {
        swiperInstance.value?.autoplay.stop();
    } else {
        swiperInstance.value?.autoplay.start();
    }
    isPlaying.value = !isPlaying.value;
};

const slidePrev = () => {
    swiperInstance.value?.slidePrev();
};

const slideNext = () => {
    swiperInstance.value?.slideNext();
};

// Fungsi baru untuk navigasi via titik paginasi
const goToSlide = (index) => {
    // slideToLoop digunakan karena kita mengaktifkan mode loop
    swiperInstance.value?.slideToLoop(index);
}


// Data untuk slide (tetap sama)
const slides = ref([
    {
        id: 1,
        title: 'Realita Baru di Depan Mata',
        description: 'Perubahan digital ada di mana-mana. Ini bukan lagi soal "jika" kita harus berubah, tapi "bagaimana" kita bisa beradaptasi dengan cepat agar tetap relevan.',
        button_text: 'Lihat Dampaknya',
        button_link: '#',
        background_type: 'video',
        background_src: '/videos/inovation.mp4'
    },
    {
        id: 2,
        title: 'Di Persimpangan Jalan',
        description: 'Kita awali dengan fakta bahwa adaptasi digital adalah keharusan, lalu langsung tawarkan pilihan tegas: stagnan dan tertinggal, atau bertransformasi untuk memimpin.',
        button_text: 'Temukan Jalan Transformasi',
        button_link: '#',
        background_type: 'video',
        background_src: '/videos/programming.mp4'
    },
    {
        id: 3,
        title: 'Strategi Holistik Kami',
        description: 'Strategi digitalisasi kami secara menyeluruh bertujuan untuk membuat operasi Anda lebih efisien, memperluas jangkauan ke audiens yang tepat, dan meningkatkan kualitas layanan, di mana setiap langkahnya didukung oleh data akurat untuk pengambilan keputusan yang lebih cerdas.',
        button_text: 'Kenali Mitra Anda',
        button_link: '/about',
        background_type: 'video',
        background_src: '/videos/ar_vr.mp4'
    },
    {
        id: 4,
        title: 'Lebih dari Vendor, Kami Mitra Anda',
        description: 'Kami bukan sekadar penyedia teknologi, melainkan mitra strategis yang berkomitmen untuk mendengarkan visi Anda, berkolaborasi secara erat, dan memastikan setiap solusi digital yang kita bangun bersama memberikan dampak dan kesuksesan nyata bagi organisasi Anda.',
        button_text: 'Ayo Berdiskusi',
        button_link: '/contact',
        background_type: 'video',
        background_src: '/videos/ai_developer.mp4'
    },
    {
        id: 5,
        title: 'Mari Mulai Perjalanan Anda',
        description: 'Perjalanan ribuan kilometer dimulai dengan satu langkah. Apapun skala dan sektor organisasi Anda—perusahaan, instansi pemerintah, UMKM, atau yayasan—langkah pertama menuju masa depan yang lebih efisien dan berdampak dimulai dengan sebuah percakapan.',
        button_text: 'Jadwalkan Konsultasi Gratis Sekarang ',
        button_link: '/',
        background_type: 'video',
        background_src: '/videos/digitalisasi.mp4'
    }
]);
</script>

<template>
    <section>
        <div class="h-screen w-full">
            <Swiper
                @swiper="onSwiper"
                @slideChange="onSlideChange"
                :modules="modules"
                :slides-per-view="1"
                :space-between="1"
                :loop="true"
                :autoplay="{
                    delay: 8000,
                    disableOnInteraction: false,
                }"
                class="h-full w-full"
            >
                <SwiperSlide v-for="slide in slides" :key="slide.id">
                     <div class="relative h-full w-full flex items-center justify-start text-white overflow-hidden">
                        <template v-if="slide.background_type === 'video'">
                            <video autoplay loop muted playsinline class="absolute z-10 w-full h-full object-cover">
                                <source :src="slide.background_src" type="video/mp4">
                            </video>
                        </template>
                        <template v-else>
                            <img :src="slide.background_src" class="absolute z-10 w-full h-full object-cover" alt="Slide Background">
                        </template>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/60 to-purple-800/20 z-20"></div>
                        <div class="relative z-30 container mx-20 px-6 lg:px-8 max-w-2xl">
                            <h1 class="text-4xl md:text-3xl font-extrabold leading-tight mb-4">{{ slide.title }}</h1>
                            <p class="text-md md:text-md text-gray-200 mb-8">{{ slide.description }}</p>
                            <Link :href="slide.button_link" class="bg-yellow-600 hover:bg-yellow-700 text-white py-3 px-6 rounded-md text-sm transition duration-300">{{ slide.button_text }}</Link>
                        </div>
                    </div>
                </SwiperSlide>
            </Swiper>
        </div>

        <div class="bg-white py-4">
            <div class="container mx-auto flex justify-center items-center space-x-6">
                <button @click="toggleAutoplay" class="text-gray-700 hover:text-black transition">
                    <svg v-if="isPlaying" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9v6m-4.5 0v-6m.375 0l-.375.375M10.5 18.75h.008v.008h-.008v-.008zm0-12h.008v.008h-.008V6.75zm.375 0l.375.375M13.5 18.75h.008v.008h-.008v-.008zm.375 0l.375-.375M13.5 6.75h.008v.008h-.008V6.75zm-.375 0l-.375-.375m-3.75 12h.008v.008h-.008v-.008zM9.75 6.75h.008v.008h-.008V6.75zm-.375 0l-.375.375M16.5 18.75h.008v.008h-.008v-.008zm.375 0l.375-.375M16.5 6.75h.008v.008h-.008V6.75zm-.375 0l-.375-.375M6 12a6 6 0 1112 0 6 6 0 01-12 0z" />
                    </svg>
                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.972l-11.54 6.347a1.125 1.125 0 01-1.667-.986V5.653z" />
                    </svg>
                </button>
                
                <button @click="slidePrev" class="text-gray-700 hover:text-black transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <div class="flex items-center space-x-3">
                    <button
                        v-for="(slide, index) in slides"
                        :key="`dot-${slide.id}`"
                        @click="goToSlide(index)"
                        class="h-3 w-3 rounded-full transition"
                        :class="[activeIndex === index ? 'bg-gray-800' : 'bg-gray-300 hover:bg-gray-400']"
                    ></button>
                </div>
                
                <button @click="slideNext" class="text-gray-700 hover:text-black transition">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </section>
</template>

<style>
/* Hapus semua style swiper sebelumnya karena sudah tidak relevan */
/* Kita bisa mengontrol semuanya dengan Tailwind atau style inline jika perlu */
</style>