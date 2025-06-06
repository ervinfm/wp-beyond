<script setup>
import { computed, ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

// 1. Ambil data 'footerNav' (Layanan & Produk) yang dinamis dari shared props Inertia.
const dynamicNav = computed(() => usePage().props.footerNav || []);

// 2. Definisikan kolom navigasi yang statis.
const staticNav = ref([
    {
        title: 'Wawasan (Insights)',
        links: [
            { name: 'Blog & Artikel Industri', href: '/blog' },
            { name: 'White Paper & Laporan', href: '/resources/reports' },
            { name: 'Webinar & Acara', href: '/events' },
            { name: 'Glosarium Teknologi', href: '/glossary' },
            { name: 'Pusat Pengembang (Dev Hub)', href: '/developers' },
        ]
    },
    {
        title: 'Perusahaan',
        links: [
            { name: 'Tentang Kami', href: '/about' },
            { name: 'Karier', href: '/career' },
            { name: 'Investasi', href: '/investasi' },
            { name: 'Hubungi Kami', href: '/contact' }
        ]
    }
]);

// 3. Gabungkan data dinamis dan statis menjadi satu array untuk di-looping.
const footerNavigation = computed(() => [
    ...dynamicNav.value,
    ...staticNav.value
]);

// Data untuk baris bawah footer
const secondaryLinks = [
    { name: 'Privasi', href: '#' },
    { name: 'Persyaratan Penggunaan', href: '#' },
];

</script>

<template>
    <footer class="bg-white text-gray-600 border-t border-gray-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            
            <div class="grid grid-cols-12 gap-8">

                <div class="col-span-12 lg:col-span-9">
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-8">
                        
                        <div v-for="column in footerNavigation" :key="column.title">
                            <h3 class="font-semibold text-gray-900 mb-4">{{ column.title }}</h3>
                            <ul class="space-y-3">
                                <li v-for="link in column.links" :key="link.name">
                                    <Link :href="link.href" class="text-sm text-gray-500 hover:text-gray-900 hover:underline">
                                        {{ link.name }}
                                    </Link>
                                </li>
                            </ul>
                        </div>
                        </div>
                </div>

                <div class="col-span-12 lg:col-span-3">
                    <h3 class="font-semibold text-gray-900 mb-4">
                        Keamanan & Sertifikasi
                    </h3>
                    <div class="flex flex-col items-start gap-5">
                         <a href="#" target="_blank" rel="noopener noreferrer">
                            <img src="/images/licenses/iso27001.png" alt="ISO 27001 Certified" class="h-14 transition-all duration-300 grayscale opacity-70 hover:grayscale-0 hover:opacity-100" title="ISO/IEC 27001 Information Security Management">
                        </a>
                        <a href="#" target="_blank" rel="noopener noreferrer">
                            <img src="/images/licenses/APS-SSL-Secure-Connection.png" alt="SSL Secure Connection" class="h-12 transition-all duration-300 grayscale opacity-70 hover:grayscale-0 hover:opacity-100" title="Koneksi Aman Terenkripsi SSL">
                        </a>
                        <a href="#" target="_blank" rel="noopener noreferrer">
                           <img src="/images/licenses/pse.png" alt="PSE Terdaftar di Kominfo" class="h-10 transition-all duration-300 grayscale opacity-70 hover:grayscale-0 hover:opacity-100" title="Penyelenggara Sistem Elektronik Terdaftar di Kominfo">
                        </a>
                    </div>
                </div>

            </div>

            <div class="mt-12 pt-8 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-y-4">
                <div class="flex items-center space-x-4 text-sm text-gray-500">
                    <p>&copy; {{ new Date().getFullYear() }} PT. Beyond Digital Nusantara.</p>
                </div>

                <div class="flex items-center gap-x-6 text-sm">
                    <a v-for="link in secondaryLinks" :key="link.name" :href="link.href" class="text-gray-500 hover:text-gray-900 hover:underline whitespace-nowrap">
                        {{ link.name }}
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>