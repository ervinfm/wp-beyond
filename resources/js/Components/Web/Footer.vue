<script setup>
import { Link } from '@inertiajs/vue3';

// Data untuk footer agar mudah dikelola (Tidak perlu diubah)
const footerLinkColumns = [
    {
        title: 'Layanan Kami',
        links: [
            { name: 'Konsultasi & Perancangan Sistem', href: '/services/system-design' },
            { name: 'Pengembangan Aplikasi & Web', href: '/services/development' },
            { name: 'Manajemen Infrastruktur & Cloud', href: '/services/infrastructure' },
            { name: 'Keamanan Siber (Cyber Security)', href: '/services/security' },
            { name: 'Lihat Semua Layanan', href: '/services' }
        ]
    },
    {
        title: 'Produk SaaS',
        links: [
            // Ganti ini dengan nama produk Anda
            { name: 'ConnectVerse Health', href: '/products/crm' },
            { name: 'SmartGov Daerah', href: '/products/hris' },
            { name: 'AsetFlow Management', href: '/products/analytics' },
            { name: 'Lihat Semua Produk', href: '/products' }
        ]
    },
    {
        title: 'Wawasan (Insights)',
        links: [
            { name: 'Studi Kasus', href: '/case-studies' },
            { name: 'Blog dan Berita', href: '/blog' },
            { name: 'Portofolio Proyek', href: '/portfolio' },
            { name: 'Dokumentasi API', href: '/docs' }
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
];

const secondaryLinks = [
    'Hubungi Tim Kami', 'Privasi', 'Persyaratan penggunaan', 'Merek dagang',
];
</script>

<template>
    <footer class="bg-gray-100 text-gray-600">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-5">
            
            <div class="grid grid-cols-12 gap-8">

                <div class="col-span-12 lg:col-span-9">
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-8">
                        <div v-for="column in footerLinkColumns" :key="column.title">
                            <h3 class="font-semibold text-gray-500 mb-4">{{ column.title }}</h3>
                            <ul class="space-y-3">
                                <li v-for="link in column.links" :key="link.name">
                                    <Link :href="link.href" class="text-xs hover:underline">{{ link.name }}</Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-3">
                    <h3 class="font-semibold text-gray-500 mb-4">
                        Keamanan & Sertifikasi
                    </h3>
                    <div class="flex items-center gap-4 flex-wrap lg:flex-col lg:items-start lg:gap-5">
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

            <div class="mt-12 pt-8 border-t border-gray-200 flex flex-wrap items-center justify-between gap-y-3">
                <div class="flex items-center space-x-2">
                    <a href="#" class="flex items-center hover:underline text-gray-700 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                        <span>Indonesia (Indonesia)</span>
                    </a>
                </div>

                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs">
                    <a v-for="link in secondaryLinks" :key="link" href="#" class="hover:underline whitespace-nowrap">{{ link }}</a>
                    <span>&copy; PT. Beyond Didital Nusantara {{ new Date().getFullYear() }}</span>
                </div>
            </div>
        </div>
    </footer>
</template>