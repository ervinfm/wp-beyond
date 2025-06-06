<script setup>
import { Head } from '@inertiajs/vue3';
import WebLayout from '@/Layouts/WebLayout.vue';

defineOptions({ layout: WebLayout });
defineProps({ status: Number });
</script>

<template>
    <Head title="503 - Dalam Perawatan" />
    <main class="flex items-center justify-center bg-white py-24 sm:py-32">
        <div class="text-center">
            <p class="text-base font-semibold text-yellow-600">{{ status }}</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Situs Sedang dalam Perawatan</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">
                Kami sedang melakukan beberapa pembaruan. Mohon kembali lagi dalam beberapa saat. Terima kasih atas kesabaran Anda!
            </p>
        </div>
    </main>
</template>