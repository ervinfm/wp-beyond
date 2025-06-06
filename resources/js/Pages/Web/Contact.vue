<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
 import BannerSection from '@/Components/Web/Contact/BannerSection.vue';

const props = defineProps({
    errors: Object, // Error validasi dari Laravel
    success: String, // Pesan sukses dari controller
});

// Gunakan 'useForm' dari Inertia untuk manajemen form yang mudah
const form = useForm({
    name: '',
    email: '',
    subject: '',
    message: '',
});

const submit = () => {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(), // Reset form setelah sukses
    });
};

// Data untuk FAQ
const faqs = ref([
    { question: 'Berapa lama proses pengembangan sebuah website?', answer: 'Waktu pengembangan sangat bervariasi tergantung kompleksitas proyek. Proyek website sederhana bisa memakan waktu 4-6 minggu, sementara aplikasi web kustom yang kompleks bisa memakan waktu beberapa bulan. Kami akan memberikan estimasi yang lebih akurat setelah diskusi awal.', open: false },
    { question: 'Apakah saya bisa melihat progres proyek saya?', answer: 'Tentu saja! Kami menggunakan metodologi Agile yang transparan. Anda akan memiliki akses ke project management board kami (seperti Trello atau Jira) dan kami akan mengadakan pertemuan rutin untuk update progres.', open: false },
    { question: 'Teknologi apa yang biasa Anda gunakan?', answer: 'Tim kami menguasai berbagai teknologi modern. Untuk backend, kami sering menggunakan Laravel (PHP). Untuk frontend, kami ahli dalam Vue.js dan React. Untuk mobile, kami menggunakan Flutter atau React Native. Namun, kami selalu memilih teknologi yang paling sesuai untuk kebutuhan spesifik proyek Anda.', open: false },
    { question: 'Apakah ada layanan dukungan setelah proyek selesai?', answer: 'Ya, kami menawarkan paket dukungan dan pemeliharaan (maintenance) setelah proyek selesai. Paket ini mencakup update keamanan, backup rutin, dan jam dukungan teknis untuk memastikan aplikasi Anda berjalan lancar.', open: false },
]);

const toggleFaq = (index) => {
    faqs.value[index].open = !faqs.value[index].open;
};
</script>

<template>
    <Head title="Hubungi Kami" />
    <div class="bg-slate-50 dark:bg-slate-900">
        <BannerSection />

        <section class="py-4 md:py-6">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                    <div class="lg:col-span-7 bg-white dark:bg-slate-800 p-6 md:p-10 rounded-2xl shadow-xl">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-6">Kirim Pesan kepada Kami</h2>
                        
                        <div v-if="$page.props.flash && $page.props.flash.success" class="mb-6 p-4 bg-green-100 dark:bg-green-900/50 border border-green-300 dark:border-green-700 text-green-800 dark:text-green-200 rounded-lg">
                            {{ $page.props.flash.success }}
                        </div>
                        
                        <form @submit.prevent="submit" class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-slate-300">Nama Lengkap</label>
                                <input type="text" v-model="form.name" id="name" required class="mt-1 block w-full rounded-md border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white shadow-sm focus:border-yellow-500 focus:ring-yellow-500">
                                <div v-if="form.errors.name" class="text-sm text-red-500 mt-1">{{ form.errors.name }}</div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-slate-300">Alamat Email</label>
                                <input type="email" v-model="form.email" id="email" required class="mt-1 block w-full rounded-md border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white shadow-sm focus:border-yellow-500 focus:ring-yellow-500">
                                <div v-if="form.errors.email" class="text-sm text-red-500 mt-1">{{ form.errors.email }}</div>
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-slate-300">Subjek</label>
                                <input type="text" v-model="form.subject" id="subject" required class="mt-1 block w-full rounded-md border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white shadow-sm focus:border-yellow-500 focus:ring-yellow-500">
                                <div v-if="form.errors.subject" class="text-sm text-red-500 mt-1">{{ form.errors.subject }}</div>
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-slate-300">Pesan Anda</label>
                                <textarea v-model="form.message" id="message" rows="5" required class="mt-1 block w-full rounded-md border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white shadow-sm focus:border-yellow-500 focus:ring-yellow-500"></textarea>
                                <div v-if="form.errors.message" class="text-sm text-red-500 mt-1">{{ form.errors.message }}</div>
                            </div>
                            <div>
                                <button type="submit" :disabled="form.processing" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-lg font-bold text-slate-900 bg-yellow-500 hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                                    <span v-if="form.processing">Mengirim...</span>
                                    <span v-else>Kirim Pesan</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="lg:col-span-5 space-y-8">
                            <div class="bg-white dark:bg-slate-800 p-6 md:p-8 rounded-2xl shadow-xl">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Informasi Kontak</h3>
                            <ul class="space-y-4 text-gray-700 dark:text-slate-300">
                                <li class="flex items-start space-x-4">
                                    <font-awesome-icon :icon="['fas', 'map-marker-alt']" class="w-5 h-5 mt-1 text-yellow-500 dark:text-yellow-400" />
                                    <span>Jl. Ir. Juanda No. 123,<br>Kec. Coblong, Kota Bandung,<br>Indonesia 40135</span>
                                </li>
                                <li class="flex items-start space-x-4">
                                    <font-awesome-icon :icon="['fas', 'envelope']" class="w-5 h-5 mt-1 text-yellow-500 dark:text-yellow-400" />
                                    <a href="mailto:halo@beyond-diginus.com" class="hover:text-yellow-600 dark:hover:text-yellow-300">halo@beyond-diginus.com</a>
                                </li>
                                <li class="flex items-start space-x-4">
                                    <font-awesome-icon :icon="['fas', 'phone-alt']" class="w-5 h-5 mt-1 text-yellow-500 dark:text-yellow-400" />
                                    <a href="tel:+622112345678" class="hover:text-yellow-600 dark:hover:text-yellow-300">(022) 1234-5678</a>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl overflow-hidden aspect-video">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.047159103785!2d107.61091741015079!3d-6.884954767340972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6e33227d863%3A0x1bdb90c18f112062!2sMcDonald&#39;s%20-%20Simpang%20Dago!5e0!3m2!1sid!2sid!4v1749124292166!5m2!1sid!2sid" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        
        <section class="py-16 md:py-24 bg-slate-100 dark:bg-slate-800/50">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Pertanyaan Umum</h2>
                    <p class="mt-4 text-lg text-gray-600 dark:text-slate-300">Sebelum bertanya, mungkin jawaban yang Anda cari ada di sini.</p>
                </div>
                <div class="mt-12 max-w-3xl mx-auto">
                    <div class="space-y-4">
                        <div v-for="(faq, index) in faqs" :key="index" class="bg-white dark:bg-slate-800 rounded-xl shadow-md overflow-hidden">
                            <button @click="toggleFaq(index)" class="w-full flex justify-between items-center text-left p-6 focus:outline-none">
                                <span class="font-semibold text-gray-800 dark:text-white">{{ faq.question }}</span>
                                <font-awesome-icon :icon="['fas', 'chevron-down']" :class="['w-5 h-5 text-slate-400 transition-transform duration-300', faq.open ? 'transform rotate-180' : '']" />
                            </button>
                            <div v-show="faq.open" class="px-6 pb-6 text-gray-600 dark:text-slate-300">
                                <p>{{ faq.answer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<style scoped>
/* Anda bisa menambahkan style kustom jika perlu, tapi Tailwind sudah mencakup banyak hal */
</style>