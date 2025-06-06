<script setup>
    import { Head } from '@inertiajs/vue3';

      // --- DATA UNTUK SECTION PERJALANAN KAMI ---
const milestones = [
    {
        year: 2021,
        event: "Lahirnya PT Ameerta Teknologi Group",
        description: "Untuk memperkuat struktur dan memperluas jangkauan layanan, kami resmi mendirikan **PT Ameerta Teknologi Group** sebagai software house yang berfokus pada solusi teknologi inovatif. Ini adalah langkah strategis untuk masa depan.",
        icon: "🌱" // Icon baru yang melambangkan pertumbuhan/kelahiran
    },
    {
        year: 2023,
        event: "Transformasi Menjadi PT. Beyond Digital Nusantara",
        description: "Seiring dengan ambisi yang kian meluas dan komitmen untuk melampaui batasan digital, **PT Ameerta Teknologi Group** bertransformasi menjadi **PT. Beyond Digital Nusantara**. Nama baru ini merefleksikan dedikasi kami untuk membawa inovasi yang melampaui ekspektasi.",
        icon: "💡" // Icon baru yang melambangkan ide/transformasi
    },
    {
        year: 2024, // Tahun disesuaikan setelah 2023
        event: "Pengakuan Industri & Kemitraan Strategis",
        description: "Komitmen kami pada inovasi dan pemberdayaan diakui melalui berbagai penghargaan dan serangkaian kemitraan strategis global yang memperluas jangkauan dampak positif kami.",
        icon: "🏆"
    },
    {
        year: 2025, // Tahun disesuaikan
        event: "Masa Depan Bersama: Anda Adalah Pusat Inovasi Kami",
        description: "Hari ini, di bawah bendera **PT. Beyond Digital Nusantara**, kami terus berinovasi, beradaptasi, dan yang terpenting, mendengarkan Anda. Perjalanan kami adalah perjalanan kita bersama, dan kami sangat antusias untuk merajut masa depan digital yang lebih cerah bersama Anda.",
        icon: "🌟"
    }
    // Tambahkan tonggak sejarah lain sesuai kebutuhan
];
</script>

<template>
    <div class="container mx-auto px-4 py-5">
        <section class="mb-5">
            <div class="relative bg-cover bg-center h-96" style="background-image: url('/images/about-journey-banner.jpg'); height: 200px;">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-start p-8">
                    <div class="text-white max-w-3xl ml-16">
                        <h1 class="text-3xl font-bold mb-4"><span class="text-yellow-400">Perjalanan Kami:</span> Setiap Langkah, Sebuah Kisah Pemberdayaan</h1>
                        <p class="text-sm"> Mari kita menengok ke belakang, menelusuri jejak langkah yang telah kami ukir. Setiap tonggak adalah bukti dari komitmen kami untuk berinovasi dan terus memberikan yang terbaik untuk Anda.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-8 px-4 bg-gray-50 bordered-lg">
            <div class="relative">
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-1 bg-yellow-200 h-full"></div>

                <div class="space-y-16">
                    <div v-for="(milestone, index) in milestones" :key="index"
                        class="flex flex-col md:flex-row items-center justify-between relative"
                        :class="{ 'md:flex-row-reverse': index % 2 !== 0 }">
                        <div class="md:absolute md:left-1/2 md:transform md:-translate-x-1/2 z-10 flex items-center justify-center w-24 h-24 bg-yellow-600 rounded-full shadow-lg text-white text-5xl font-bold flex-shrink-0 animate__animated animate__bounceIn"
                            :style="{ 'animation-delay': `${0.3 * index}s` }">
                            {{ milestone.icon }}
                        </div>

                        <div class="md:w-5/12 w-full p-8 rounded-2xl shadow-xl bg-white border border-yellow-100 transition duration-500 hover:shadow-2xl hover:scale-[1.01] mt-8 md:mt-0 animate__animated animate__fadeIn"
                            :class="{ 'md:ml-[calc(50%+4rem)]': index % 2 === 0, 'md:mr-[calc(50%+4rem)]': index % 2 !== 0 }"
                            :style="{ 'animation-delay': `${0.4 * index}s` }">
                            <h3 class="text-xl font-bold text-yellow-700 mb-3">{{ milestone.year }}: {{ milestone.event }}</h3>
                            <p class="text-lg text-gray-700 leading-relaxed">
                                {{ milestone.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>