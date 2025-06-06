<script setup>
    import { Head } from '@inertiajs/vue3';
    defineProps({ upcomingEvents: Array, pastEvents: Object });
</script>
<template>
    <Head title="Webinar & Acara" />
    <div class="container mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold text-center mb-12">Webinar & Acara</h1>
        
        <section v-if="upcomingEvents.length > 0">
            <h2 class="text-2xl font-bold mb-6">Acara Mendatang</h2>
        </section>

        <section class="mt-16">
            <h2 class="text-2xl font-bold mb-6">Arsip Rekaman Webinar</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div v-for="event in pastEvents.data" :key="event.id" class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="font-bold">{{ event.title }}</h3>
                    <p class="text-sm text-gray-500 mt-2">Oleh: {{ event.speaker_name }}</p>
                    <a :href="event.video_recording_url" target="_blank" class="mt-4 inline-block text-blue-600 font-semibold">
                        Tonton Rekaman
                    </a>
                </div>
            </div>
        </section>
    </div>
</template>