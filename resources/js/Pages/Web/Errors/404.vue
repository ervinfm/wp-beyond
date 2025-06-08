<script setup>
import { Head, Link } from '@inertiajs/vue3';
import WebLayout from '@/Layouts/WebLayout.vue'; 

// Memberitahu Inertia untuk menggunakan WebLayout pada halaman ini
defineOptions({ layout: WebLayout });

// Menerima prop 'status' yang kita kirim dari backend
defineProps({
    status: Number,
});
</script>

<template>
    <Head title="404 - Halaman Tidak Ditemukan" />

    <main class="flex items-center justify-center bg-white py-24 sm:py-32">
        <div class="text-center">
            <p class="text-base font-semibold text-yellow-600">{{ status }}</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Halaman Tidak Ditemukan</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">
                Maaf, kami tidak dapat menemukan halaman yang Anda cari. Mungkin telah dipindahkan atau dihapus.
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <Link 
                    href="/" 
                    class="rounded-md bg-yellow-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600"
                >
                    Kembali ke Beranda
                </Link>
                <a href="/contact" class="text-sm font-semibold text-gray-900">
                    Hubungi Dukungan <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
            </div>
    </main>
</template>