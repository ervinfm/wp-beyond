<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

// State untuk menampilkan atau menyembunyikan banner
const showBanner = ref(false);

// Saat komponen dimuat, periksa localStorage
onMounted(() => {
    // Jika item 'cookie_consent' tidak ada di localStorage, tampilkan banner
    if (!localStorage.getItem('cookie_consent')) {
        showBanner.value = true;
    }
});

// Fungsi saat tombol "Setuju" diklik
const acceptCookies = () => {
    // Simpan persetujuan di localStorage agar tidak muncul lagi
    localStorage.setItem('cookie_consent', 'true');
    // Sembunyikan banner
    showBanner.value = false;
};
</script>

<template>
    <transition
        enter-active-class="transition-opacity duration-300"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-opacity duration-300"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div v-if="showBanner" class="fixed inset-x-0 bottom-0 z-50">
            <div class="bg-gray-800/90 text-white backdrop-blur-sm p-4 sm:p-6">
                <div class="container mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-center sm:text-left">
                        Website ini menggunakan cookie untuk memastikan Anda mendapatkan pengalaman terbaik. Dengan melanjutkan, Anda menyetujui
                        <Link href="/privacy-policy" class="font-bold underline hover:text-gray-200">Kebijakan Privasi</Link> kami.
                    </p>
                    <button
                        @click="acceptCookies"
                        class="flex-shrink-0 rounded-lg bg-yellow-600 px-5 py-2 text-sm font-semibold text-white shadow-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    >
                        Saya Mengerti & Setuju
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>