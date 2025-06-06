<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

// State untuk melacak tab/accordion mana yang aktif
// Kita set default ke 0 (item pertama)
const activeTab = ref(0);

// Data untuk setiap tab. Anda bisa menyesuaikan judul, deskripsi, dan gambar.
const tabsData = ref([
    {
        id: 1,
        title: 'Kemitraan Strategis, Bukan Sekadar Proyek',
        description: 'Kami percaya solusi teknologi terbaik lahir dari pemahaman mendalam terhadap visi bisnis Anda. Proses kami selalu dimulai dengan lokakarya strategis untuk menyelaraskan tujuan, memahami tantangan, dan mendefinisikan kesuksesan bersama. Bagi kami, Anda bukan sekadar klien, melainkan mitra dalam inovasi.',
        image: '/images/ov-01.jpg' // Ganti dengan path gambar Anda
    },
    {
        id: 2,
        title: 'Desain Berpusat pada Pengguna (User-Centric)',
        description: 'Setiap piksel dan interaksi kami rancang dengan seksama. Melalui riset pengguna, pemetaan alur (user journey), dan prototyping interaktif, kami memastikan produk akhir tidak hanya fungsional dan canggih, tetapi juga intuitif dan dicintai oleh para penggunanya, yang pada akhirnya meningkatkan adopsi dan kepuasan.',
        image: '/images/ov-02.jpg' // Ganti dengan path gambar Anda
    },
    {
        id: 3,
        title: 'Pengembangan Gesit & Transparan (Agile)',
        description: 'Kami menerapkan metodologi Agile untuk pengembangan yang fleksibel dan adaptif terhadap perubahan. Anda akan mendapatkan akses ke dasbor manajemen proyek dan kami akan melakukan demo rutin setiap dua minggu. Transparansi ini memastikan tidak ada kejutan dan produk yang kami kirimkan sesuai dengan ekspektasi Anda.',
        image: '/images/ov-03.jpg' // Ganti dengan path gambar Anda
    },
    {
        id: 4,
        title: 'Infrastruktur Andal & Dukungan Berkelanjutan',
        description: 'Solusi kami dibangun di atas arsitektur cloud-native yang skalabel dan aman. Kami tidak hanya membangun, kami juga memastikan aplikasi Anda tetap andal dan berkinerja tinggi melalui praktik DevOps dan pemantauan proaktif. Kemitraan kita berlanjut melalui dukungan teknis berkelanjutan.',
        image: '/images/ov-04.jpg' // Ganti dengan path gambar Anda
    }
]);

// Computed property untuk mendapatkan data tab yang sedang aktif
// Ini membuat template lebih bersih
const activeTabData = computed(() => {
    return tabsData.value[activeTab.value];
});

// Fungsi untuk mengubah tab yang aktif
const changeTab = (index) => {
    activeTab.value = index;
};
</script>

<template>
    <div class="bg-white py-16 sm:py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="text-base font-semibold leading-7 text-yellow-600">Sedikit Tentang Kami</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Tim Beyond Digital Nusantara
                </p>
            </div>

            <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-12">
                <div class="flex flex-col space-y-4">
                    <div v-for="(tab, index) in tabsData" :key="tab.id">
                        <button @click="changeTab(index)" class="w-full text-left py-4 border-b-2" :class="[activeTab === index ? 'border-yellow-600 text-yellow-600' : 'border-gray-200 text-gray-700 hover:text-yellow-600']">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold">{{ tab.title }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 transition-transform duration-300" :class="{ 'rotate-180': activeTab === index }">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </button>
                        <div v-if="activeTab === index" class="mt-4 pl-2">
                            <p class="text-gray-600">{{ tab.description }}</p>
                        </div>
                    </div>
                </div>

                <div class="relative flex items-center justify-center min-h-[400px]">
                    <Transition name="fade" mode="out-in">
                        <img 
                            :key="activeTabData.id" 
                            :src="activeTabData.image" 
                            alt="Tampilan Fitur" 
                            class="rounded-lg shadow-xl object-cover"
                        >
                    </Transition>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* CSS untuk transisi 'fade' */
.fade-enter-active,
.fade-leave-active {
    transition: all 0.4s ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: scale(0.95);
}
</style>