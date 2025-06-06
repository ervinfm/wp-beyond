<script setup>
    import { Head } from '@inertiajs/vue3';
    import { ref } from 'vue';

    import BannerSection from '@/Components/Web/About/BannerSection.vue';
    import CompanySection from '@/Components/Web/About/CompanySection.vue';
    import GoalsSection from '@/Components/Web/About/GoalsSection.vue';
    import TeamSection from '@/Components/Web/About/TeamSection.vue';
    import JourneySection from '@/Components/Web/About/JourneySection.vue';

    // --- LANGKAH 1: DEFINISIKAN STATE & DATA NAVIGASI ---

    // State untuk melacak tab yang aktif. 'goals' akan menjadi tampilan default.
    const activeTab = ref('company');

    // Data untuk tombol navigasi, membuatnya mudah dikelola.
    const tabs = [
        { id: 'company', name: 'Company Profile' },
        { id: 'goals', name: 'Company Goals' },
        { id: 'team', name: 'Our Team' },
        { id: 'journey', name: 'The Journey' },
    ];
  
</script>

<template>
    <Head title="About" />
    <div class="bg-gray-50">
        <div class="bg-gray-100 min-h-screen">
            <div class="container mx-auto py-3 px-4">
                <div class="mb-5 flex justify-end">
                    <div class="inline-flex rounded-lg shadow-sm bg-white p-1.5 space-x-1 border">
                        <button
                            v-for="tab in tabs"
                            :key="tab.id"
                            @click="activeTab = tab.id"
                            :class="[
                                'px-6 py-1 text-sm font-semibold rounded-md transition-all duration-200 ease-in-out focus:outline-none',
                                activeTab === tab.id
                                    ? 'bg-yellow-500 text-white shadow' // Style untuk tab aktif
                                    : 'text-gray-600 hover:bg-gray-100 hover:text-black' // Style untuk tab tidak aktif
                            ]"
                        >
                            {{ tab.name }}
                        </button>
                    </div>
                </div>
                <main>
                    <CompanySection v-if="activeTab === 'company'" />
                    <GoalsSection v-if="activeTab === 'goals'" />
                    <TeamSection v-if="activeTab === 'team'" />
                    <JourneySection v-if="activeTab === 'journey'" />
                </main>
            </div>
        </div>

        <section class="bg-gray-900 py-8 px-4 text-white text-center">
            <div class="container mx-auto max-w-4xl">
                <h2 class="text-3xl font-extrabold leading-tight mb-8 animate__animated animate__fadeInDown">
                    Siap Melangkah Bersama Kami?
                </h2>
                <p class="text-sm font-light mb-6 animate__animated animate__fadeInUp animate__delay-0-5s">
                    Ini adalah saatnya untuk mengubah visi Anda menjadi kenyataan yang memberdayakan.
                    Kami mengundang Anda untuk bergabung dalam perjalanan inovasi dan pertumbuhan bersama kami PT. Beyond Digital Nusantara.
                </p>

                <div class="animate__animated animate__zoomIn animate__delay-1s">
                    <a href="/contact"
                    class="inline-block bg-white text-yellow-800 font-bold text-sm px-10 py-4 rounded-full shadow-lg hover:bg-gray-100 hover:scale-105 transition duration-300 ease-in-out transform mr-4">
                        Mulai Kolaborasi
                    </a>

                    <a href="/services"
                    class="inline-block border-2 border-white text-white font-semibold text-sm px-10 py-4 rounded-full hover:bg-white hover:text-yellow-800 hover:scale-105 transition duration-300 ease-in-out transform ml-4">
                        Lihat Solusi Kami
                    </a>
                </div>
            </div>
        </section>
    </div>

</template>