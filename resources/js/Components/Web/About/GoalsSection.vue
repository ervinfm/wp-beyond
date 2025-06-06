<script setup>
import { ref } from 'vue';
import { useIntersectionObserver } from '@vueuse/core';

// --- DATA ---
// Data Visi & Misi tidak berubah
const vision = "Ini bukan sekadar visi atau nilai; ini adalah janji hati kami untuk membersamai setiap langkah perjalanan Anda menuju kesuksesan.";
const mission = [
    { 
        text: "Menyediakan solusi inovatif dan transformatif yang intuitif dan mudah diakses.", 
        icon: 'rocket' // Ikon untuk inovasi & kecepatan
    },
    { 
        text: "Membangun kemitraan sejati yang didasari kepercayaan, pengertian, dan dukungan berkelanjutan.", 
        icon: 'handshake-simple' // Ikon untuk kemitraan
    },
    { 
        text: "Menginspirasi budaya belajar, berinovasi, dan beradaptasi untuk menghadapi tantangan masa depan.", 
        icon: 'brain' // Ikon untuk pembelajaran & ide
    },
    { 
        text: "Berkomitmen pada etika, integritas, dan tanggung jawab sosial dalam setiap aspek operasional kami.", 
        icon: 'shield-halved' // Ikon untuk integritas & keamanan
    }
];

// Data Nilai Inti di-update dengan ikon SVG profesional
const coreValues = ref([
    {
        title: "Pemberdayaan Sejati",
        description: "Kami hadir untuk memberi Anda lebih dari sekadar alat; kami memberikan kunci dan keyakinan untuk membuka potensi yang bahkan belum Anda sadari.",
        icon: 'wand-magic-sparkles' // Ikon relevan untuk 'empowerment'
    },
    {
        title: "Inovasi Berhati Nurani",
        description: "Bagi kami, inovasi terbaik adalah yang menyentuh sisi kemanusiaan—membuat hidup Anda lebih mudah, lebih cerah, dan membuka pintu harapan baru.",
        icon: 'lightbulb' // Ikon relevan untuk 'inovasi'
    },
    {
        title: "Kemitraan yang Tumbuh",
        description: "Anda bukan klien, Anda adalah rekan seperjuangan. Kami mendengarkan cerita Anda, memahami tujuan Anda, dan tumbuh bersama meraih puncak.",
        icon: 'handshake' // Ikon relevan untuk 'kemitraan'
    },
    {
        title: "Integritas Absolut",
        description: "Di dunia yang bising, kepercayaan adalah kemewahan. Janji kami adalah mata uang kami, dipegang teguh dalam setiap tindakan tanpa kecuali.",
        icon: 'shield-halved' // Ikon relevan untuk 'integritas'
    },
    {
        title: "Meninggalkan Jejak",
        description: "Kami tidak hanya membangun solusi, kami membangun warisan. Setiap proyek adalah kesempatan untuk meninggalkan jejak positif bagi Anda dan dunia.",
        icon: 'seedling' // Ikon relevan untuk 'dampak/pertumbuhan'
    }
]);
// --- LOGIKA ANIMASI ---
const target = ref(null);
const isVisible = ref(false);
const { stop } = useIntersectionObserver(target, ([{ isIntersecting }]) => {
    if (isIntersecting) {
        isVisible.value = true;
        stop();
    }
}, { threshold: 0.15 });
</script>

<template>
    <div ref="target">
        <div class="container mx-auto">
            <section class="mt-5 mb-5">
                <div class="relative bg-cover bg-center h-96" style="background-image: url('/images/about-goal-banner.jpg'); height: 220px;">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-start p-8">
                        <div class="text-white max-w-3xl ml-16">
                            <h1 class="text-3xl font-bold mb-4">Fokus pada Dampak dan Kemajuan</h1>
                            <p class="text-sm">Kami Berdedikasi menghadirkan solusi inovatif yang memberdayakan individu dan organisasi di seluruh dunia untuk mencapai potensi penuh mereka, mendorong produktivitas, dan membuka peluang tak terbatas</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="relative bg-gray-800 rounded-xl text-white py-8 sm:py-10 mb-5">
            <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p :class="['text-3xl font-semibold leading-7 transition-all duration-700', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">
                    <span class="text-yellow-400">Arah Langkah Kami:</span> Merajut Masa Depan Bersama Anda
                </p>
                <blockquote :class="['mt-4 text-xl sm:text-md lg:text-xl font-bold tracking-tight transition-all duration-700 delay-200', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']">
                    "{{ vision }}"
                </blockquote>
            </div>
        </section>

        <section class="bg-white py-8 sm:py-10 mb-5 rounded-xl">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
                    
                    <div class="lg:col-span-1 text-center lg:text-left">
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            <span class="text-yellow-500">Misi Kami</span>
                        </h2>
                        <p class="mt-4 text-lg text-gray-600">
                            Ini adalah langkah-langkah nyata yang kami ambil setiap hari untuk mewujudkan visi besar kami bersama Anda.
                        </p>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="space-y-8">
                            
                            <div v-for="item in mission" :key="item.text" class="flex items-start gap-5">
                                
                                <div class="flex-shrink-0 w-14 h-14 flex items-center justify-center bg-yellow-100 rounded-2xl text-yellow-600">
                                    <font-awesome-icon :icon="['fas', item.icon]" class="w-7 h-7" />
                                </div>
                                
                                <p class="text-lg text-gray-700 pt-2">{{ item.text }}</p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-50 py-8 sm:py-10 rounded-xl">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold tracking-tight text-yellow-500 sm:text-3xl">
                        Nilai dan Prinsip yang kami Pertahankan
                    </h2>
                    <p class="mt-4 text-md text-gray-600 max-w-2xl mx-auto">
                        Ini bukan aturan yang kami ikuti, tapi kode yang mendefinisikan kami. Esensi yang terpatri dalam setiap interaksi, setiap baris kode, dan setiap solusi yang kami lahirkan.
                    </p>
                </div>

                <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="(value, index) in coreValues" :key="value.title" 
                        :class="['group bg-white p-8 rounded-2xl shadow-lg border border-gray-100 transition-all duration-300 ease-in-out hover:shadow-yellow-500/10 hover:-translate-y-2', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4']" 
                        :style="{ transitionDelay: `${800 + (index * 150)}ms` }">
                        
                        <div class="flex-shrink-0 w-16 h-16 flex items-center justify-center bg-yellow-100 rounded-2xl text-yellow-600 transition-all duration-300 group-hover:scale-110 group-hover:rotate-6">
                            <font-awesome-icon :icon="['fas', value.icon]" class="w-8 h-8" />
                        </div>

                        <h3 class="mt-6 text-xl font-bold text-gray-900">{{ value.title }}</h3>
                        <p class="mt-3 text-base text-gray-600 leading-relaxed">{{ value.description }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>