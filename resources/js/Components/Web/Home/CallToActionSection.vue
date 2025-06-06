<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="bg-gray-900 text-white py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-base font-semibold leading-7 text-yellow-500">Siap untuk Berkolaborasi?</h2>
            <p class="mt-2 text-4xl font-bold tracking-tight sm:text-4xl">
                Mari Wujudkan Proyek Impian Anda Bersama Kami
            </p>
            <p class="mt-6 text-lg text-gray-300 max-w-3xl mx-auto">
                Kami siap membantu Anda membangun solusi digital yang inovatif dan efektif.
                Hubungi kami sekarang untuk memulai perjalanan kesuksesan Anda.
            </p>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
                <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-white mb-4">Alur Kerja Sama</h3>
                    <ul class="space-y-4 text-gray-300">
                        <li>
                            <strong class="font-semibold text-yellow-400">1. Diskusi Awal:</strong>
                            <p>Sampaikan ide dan kebutuhan Anda. Kami akan mendengarkan dengan seksama.</p>
                        </li>
                        <li>
                            <strong class="font-semibold text-yellow-400">2. Perencanaan & Proposal:</strong>
                            <p>Kami siapkan proposal detail dengan strategi, jadwal, dan estimasi biaya.</p>
                        </li>
                        <li>
                            <strong class="font-semibold text-yellow-400">3. Pengembangan & Iterasi:</strong>
                            <p>Proyek dibangun secara transparan dengan feedback berkala dari Anda.</p>
                        </li>
                        <li>
                            <strong class="font-semibold text-yellow-400">4. Peluncuran & Dukungan:</strong>
                            <p>Kami pastikan solusi Anda berjalan lancar dan siap untuk dukungan berkelanjutan.</p>
                        </li>
                    </ul>
                </div>

                <div class="bg-gray-800 p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-white mb-4">Informasi Kontak</h3>
                    <ul class="space-y-4 text-gray-300">
                        <li>
                            <strong class="font-semibold text-yellow-400">Alamat:</strong>
                            <p>Jl. Contoh Nomor 123, Kel. Suka Maju, Kec. Jaya, Kota Sukses, 12345</p>
                        </li>
                        <li>
                            <strong class="font-semibold text-yellow-400">Email:</strong>
                            <a href="mailto:info@perusahaananda.com" class="hover:underline">info@perusahaananda.com</a>
                        </li>
                        <li>
                            <strong class="font-semibold text-yellow-400">Telepon:</strong>
                            <a href="tel:+628123456789" class="hover:underline">+62 812-3456-789</a>
                        </li>
                        <li>
                            <strong class="font-semibold text-yellow-400">Jam Kerja:</strong>
                            <p>Senin - Jumat: 09.00 - 17.00 WIB</p>
                        </li>
                    </ul>
                </div>

                <div class="bg-gray-800 p-8 rounded-lg shadow-lg flex flex-col justify-center items-center">
                    <h3 class="text-2xl font-bold text-white mb-4">Masih Punya Pertanyaan?</h3>
                    <p class="text-gray-300 mb-6 text-center">
                        Jangan ragu untuk menghubungi kami melalui form kontak lengkap kami.
                    </p>
                    <Link 
                        :href="route('contact')" 
                        class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-yellow-500 hover:bg-yellow-600 transition duration-300 shadow-md"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Hubungi Kami
                    </Link>
                    </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Tambahkan styling khusus jika diperlukan */
</style>