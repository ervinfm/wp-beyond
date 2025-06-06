<script setup>
import { ref } from 'vue';
import { useIntersectionObserver } from '@vueuse/core';
import VueCountup from 'vue-countup-v3';

// Data baru yang sudah dimodifikasi
const profileData = ref([
    {
        label: 'Tahun Berdiri',
        value: '2021',
        type: 'numeric',
        icon: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0h18" /></svg>`
    },
    {
        label: 'Industri',
        value: 'Teknologi & Konsultasi',
        type: 'text',
        icon: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V8.25a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 8.25v7.5a2.25 2.25 0 0 0 2.25 2.25Z" /></svg>`
    },
    {
        label: 'Kantor Pusat',
        value: 'Bandung, Indonesia',
        type: 'text',
        icon: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>`
    },
    {
        label: 'Badan Hukum',
        value: 'Perseroan Terbatas (PT)',
        type: 'text',
        icon: `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h6M9 11.25h6M9 15.75h6M5.25 6.75h.008v.008H5.25V6.75Zm.008 4.5h.008v.008H5.25v-.008Zm.008 4.5h.008v.008H5.25v-.008Zm13.5-9h.008v.008h-.008V6.75Zm.008 4.5h.008v.008h-.008v-.008Zm.008 4.5h.008v.008h-.008v-.008Z" /></svg>`
    }
]);

const target = ref(null);
const isVisible = ref(false);

const { stop } = useIntersectionObserver(
    target,
    ([{ isIntersecting }]) => {
        if (isIntersecting) {
            isVisible.value = true;
            stop();
        }
    },
    { threshold: 0.2 }
);
</script>

<template>
    <section ref="target" class="relative bg-white py-10 sm:py-10 overflow-hidden">
        <div class="absolute inset-0 -z-10">
            <div class="absolute left-[50%] top-0 h-[48rem] w-[48rem] -translate-x-1/2 rounded-full bg-yellow-50/50 blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-x-12 gap-y-16">
                <div class="lg:col-span-3">
                    <p :class="['font-semibold leading-7 text-yellow-600 transition-all duration-700', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">
                        PROFIL PERUSAHAAN
                    </p>
                    <h2 :class="['mt-2 text-3xl sm:text-3xl font-extrabold tracking-tight text-gray-900 transition-all duration-700 delay-200', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">
                        Dibangun dari <span class="text-yellow-400">Visi</span>, Digerakkan oleh <span class="text-yellow-400">Inovasi</span>.
                    </h2>
                    <p :class="['mt-4 text-md leading-8 text-gray-700 transition-all duration-700 delay-300', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">
                        PT. Beyond Digital Nusantara lahir dari sebuah keyakinan: bahwa digitalisasi bukan tujuan, melainkan tuas untuk mengangkat potensi. Kami hadir sebagai mitra strategis Anda, mendedikasikan diri untuk merancang ekosistem digital yang cerdas dan berdaya. Solusi kami dibuat untuk memberikan satu hal: dampak yang terukur. Melalui kolaborasi yang kokoh dan integritas tanpa kompromi, kami siap mendorong bisnis Anda melampaui batas-batas konvensional menuju supremasi di era digital.                    </p>
                    <blockquote :class="['mt-8 border-l-4 border-yellow-600 pl-6 italic text-gray-800 transition-all duration-700 delay-500', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">
                        "Lebih dari Mitra, Bagian dari Pertumbuhan Anda"
                    </blockquote>
                </div>
                <div class="lg:col-span-3">
                    <div class="relative w-full">
                       <img src="/images/about-profile-banner.jpg" alt="Tim Profesional Berkolaborasi" :class="['w-full rounded-2xl shadow-2xl object-cover h-96 transition-all duration-1000 delay-200', isVisible ? 'opacity-100 scale-100' : 'opacity-0 scale-95']">
                    </div>
                </div>
            </div>
            <div :class="['mt-8 grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6 transition-all duration-700 delay-700', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">
                <div v-for="item in profileData" :key="item.label" class="bg-white/70 backdrop-blur-lg p-6 rounded-xl shadow-lg border border-gray-200/50 text-center flex flex-col justify-center">
                    <div class="text-yellow-600 mx-auto w-fit" v-html="item.icon"></div>
                    
                    <div class="mt-4 flex-grow flex flex-col justify-center">
                        <p v-if="item.type === 'numeric'" class="text-3xl font-bold text-gray-900 tracking-tight">
                            <VueCountup :end-val="item.value" :duration="2.5" :enable-scroll-spy="true" :scroll-spy-delay="1000" />
                        </p>
                        <p v-else class="text-lg font-semibold text-gray-900 leading-tight">
                            {{ item.value }}
                        </p>
                    </div>
                    <p class="mt-1 text-xs font-medium text-gray-500 uppercase tracking-wider">{{ item.label }}</p>
                </div>
            </div>
        </div>
    </section>
</template>