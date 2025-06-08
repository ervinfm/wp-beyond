<script setup>
import { Head, Link } from '@inertiajs/vue3';
import WebLayout from '@/Layouts/WebLayout.vue';

defineOptions({ layout: WebLayout });
defineProps({ status: Number });
</script>

<template>
    <Head title="403 - Akses Ditolak" />
    <main class="flex items-center justify-center bg-white py-24 sm:py-32">
        <div class="text-center">
            <p class="text-base font-semibold text-yellow-600">{{ status }}</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Akses Ditolak</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">
                Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.
            </p>
            <div class="mt-10">
                <Link href="/" class="rounded-md bg-yellow-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500">
                    Kembali ke Beranda
                </Link>
            </div>
        </div>
    </main>
</template>