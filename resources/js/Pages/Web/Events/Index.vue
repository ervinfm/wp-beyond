<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted, computed } from 'vue';
import Pagination from '@/Components/Shared/Pagination.vue';

const props = defineProps({
    featuredEvent: Object,
    otherUpcomingEvents: Array,
    pastEvents: Object
});

// --- LOGIKA UNTUK COUNTDOWN TIMER ---
const countdown = ref({ days: '00', hours: '00', minutes: '00', seconds: '00' });
let timerInterval = null;

const calculateCountdown = () => {
    if (!props.featuredEvent) return;

    const targetDate = new Date(props.featuredEvent.event_date).getTime();
    const now = new Date().getTime();
    const distance = targetDate - now;

    if (distance < 0) {
        countdown.value = { days: '00', hours: '00', minutes: '00', seconds: '00' };
        clearInterval(timerInterval);
        return;
    }

    countdown.value.days = Math.floor(distance / (1000 * 60 * 60 * 24)).toString().padStart(2, '0');
    countdown.value.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2, '0');
    countdown.value.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0');
    countdown.value.seconds = Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(2, '0');
};

onMounted(() => {
    if (props.featuredEvent) {
        calculateCountdown();
        timerInterval = setInterval(calculateCountdown, 1000);
    }
});

onUnmounted(() => {
    clearInterval(timerInterval);
});

// Helper untuk format tanggal
const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    return new Date(dateString).toLocaleDateString('id-ID', options) + ' WIB';
};
</script>

<template>
    <Head title="Webinar & Acara" />

    <div class="bg-slate-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">
            <div class="text-center mb-16 max-w-3xl mx-auto">
                <p class="font-semibold text-yellow-600">KOMUNITAS & PENGETAHUAN</p>
                <h1 class="mt-2 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                    Terhubung, Belajar, dan Tumbuh Bersama Kami
                </h1>
                <p class="mt-4 text-xl text-gray-600">
                    Ikuti acara eksklusif kami untuk mendapatkan wawasan terbaru langsung dari para ahli di industri teknologi.
                </p>
            </div>

            <section v-if="featuredEvent" class="bg-gray-900 text-white rounded-3xl p-8 sm:p-12 lg:p-16">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <p class="font-semibold text-yellow-400">ACARA BERIKUTNYA</p>
                        <h2 class="mt-4 text-3xl lg:text-4xl font-bold tracking-tight">{{ featuredEvent.title }}</h2>
                        <div class="mt-6 flex items-center gap-4">
                            <img :src="featuredEvent.speaker_image" :alt="featuredEvent.speaker_name" class="w-16 h-16 rounded-full object-cover border-2 border-white">
                            <div>
                                <p class="font-semibold">{{ featuredEvent.speaker_name }}</p>
                                <p class="text-sm text-gray-300">{{ featuredEvent.speaker_title }}</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-300">{{ featuredEvent.description }}</p>

                        <div class="mt-8 grid grid-cols-4 gap-4 text-center">
                            <div><div class="text-4xl font-bold">{{ countdown.days }}</div><div class="text-xs uppercase text-gray-400">Hari</div></div>
                            <div><div class="text-4xl font-bold">{{ countdown.hours }}</div><div class="text-xs uppercase text-gray-400">Jam</div></div>
                            <div><div class="text-4xl font-bold">{{ countdown.minutes }}</div><div class="text-xs uppercase text-gray-400">Menit</div></div>
                            <div><div class="text-4xl font-bold">{{ countdown.seconds }}</div><div class="text-xs uppercase text-gray-400">Detik</div></div>
                        </div>

                        <a :href="featuredEvent.registration_link" target="_blank" class="mt-8 inline-block rounded-md bg-yellow-500 px-8 py-3 text-base font-bold text-black shadow-lg hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-500 transform transition-transform hover:scale-105">
                            Daftar Sekarang, Gratis!
                        </a>
                    </div>
                    <div class="hidden lg:block">
                        <img :src="featuredEvent.speaker_image" :alt="featuredEvent.title" class="rounded-2xl shadow-2xl object-cover w-full h-full">
                    </div>
                </div>
            </section>
            
            <div v-else class="text-center py-16 bg-white rounded-2xl shadow-sm">
                <p class="text-gray-500">Saat ini belum ada acara yang dijadwalkan. Silakan periksa kembali nanti!</p>
            </div>

            <section v-if="pastEvents.data.length > 0" class="mt-24">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center mb-12">Arsip Webinar Lainnya</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="event in pastEvents.data" :key="event.id" class="group bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <div class="relative">
                           <img :src="event.speaker_image" :alt="event.title" class="h-56 w-full object-cover transition-transform duration-300 group-hover:scale-105" />
                           <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                           <p class="absolute bottom-4 left-4 text-white font-bold text-lg">{{ event.title }}</p>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-gray-500">Pembicara: <span class="font-medium text-gray-800">{{ event.speaker_name }}</span></p>
                            <p class="text-sm text-gray-500 mt-1">Diselenggarakan pada: {{ formatDate(event.event_date) }}</p>
                            <a :href="event.video_recording_url" target="_blank" class="mt-4 inline-flex items-center gap-2 text-yellow-600 font-semibold">
                                Tonton Rekaman
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .328.025l5.5 3.25a.75.75 0 0 1 0 1.266l-5.5 3.25A.75.75 0 0 1 8 14.25V5.75a.75.75 0 0 1 .39-.658Z" clip-rule="evenodd" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <Pagination :links="pastEvents.links" class="mt-16" />
            </section>
        </div>
    </div>
</template>