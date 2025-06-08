<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import BannerSection from '@/Components/Web/Glossary/BannerSection.vue';

const props = defineProps({
    groupedTerms: Object
});

// --- STATE UNTUK INTERAKTIVITAS ---
const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split('');
const searchQuery = ref('');
const activeLetter = ref('All'); // State untuk filter huruf, defaultnya 'All'
const openTermId = ref(null);   // State untuk melacak item accordion mana yang terbuka

// --- LOGIKA FILTER & PENCARIAN ---
const displayList = computed(() => {
    let result = {};

    // 1. Filter berdasarkan huruf yang aktif
    if (activeLetter.value === 'All') {
        result = props.groupedTerms;
    } else if (props.groupedTerms[activeLetter.value]) {
        result[activeLetter.value] = props.groupedTerms[activeLetter.value];
    }

    // 2. Filter berdasarkan pencarian (jika ada)
    if (searchQuery.value.length > 2) {
        const query = searchQuery.value.toLowerCase();
        const searchResult = {};
        for (const letter in result) {
            const matchingTerms = result[letter].filter(term =>
                term.term.toLowerCase().includes(query) ||
                term.definition.toLowerCase().includes(query)
            );
            if (matchingTerms.length > 0) {
                searchResult[letter] = matchingTerms;
            }
        }
        return searchResult;
    }
    
    return result;
});

// Cek apakah hasil filter atau pencarian kosong
const isListEmpty = computed(() => Object.keys(displayList.value).length === 0);

// --- FUNGSI UNTUK INTERAKSI ---
const selectLetter = (letter) => {
    searchQuery.value = ''; // Reset pencarian saat filter huruf diklik
    activeLetter.value = letter;
};

const toggleTerm = (termId) => {
    // Jika term yang sama diklik, tutup. Jika beda, buka yang baru.
    openTermId.value = openTermId.value === termId ? null : termId;
};

</script>

<template>
    <Head title="Glosarium Teknologi" />

    <BannerSection />

    <div class="bg-white">
        <section class="border-slate-200">
            <div class="mt-8 max-w-xl mx-auto">
                    <input 
                        type="text" 
                        v-model.lazy="searchQuery" 
                        placeholder="Cari istilah (cth: API, SaaS, Docker...)" 
                        class="w-full p-4 border border-gray-300 rounded-full shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>
        </section>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">

                <aside class="lg:col-span-3 mb-12 lg:mb-0">
                    <div class="sticky top-8">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Indeks Alfabet</h2>
                        <div class="flex flex-wrap gap-2">
                            <button @click="selectLetter('All')" :class="['px-3 py-1.5 text-xs font-bold rounded-full transition', activeLetter === 'All' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200']">SEMUA</button>
                            <button 
                                v-for="letter in alphabet" 
                                :key="letter"
                                @click="selectLetter(letter)"
                                :class="['w-10 h-10 text-sm font-semibold rounded-full transition', activeLetter === letter ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200']"
                            >
                                {{ letter }}
                            </button>
                        </div>
                    </div>
                </aside>

                <main class="lg:col-span-9">
                    <div v-if="!isListEmpty" class="space-y-12">
                        <section v-for="(terms, letter) in displayList" :key="letter" :id="`letter-${letter}`">
                            <h2 class="text-3xl font-bold text-blue-600 border-b-2 border-blue-200 pb-2 mb-6">{{ letter }}</h2>
                            <div class="space-y-4">
                                <div v-for="term in terms" :key="term.id" class="border border-gray-200 rounded-lg overflow-hidden">
                                    <button @click="toggleTerm(term.id)" class="w-full flex justify-between items-center p-5 text-left bg-white hover:bg-slate-50 transition">
                                        <h3 class="font-bold text-lg text-gray-800">{{ term.term }}</h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" :class="['w-5 h-5 text-gray-500 transition-transform duration-300', openTermId === term.id ? 'rotate-180' : '']">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <transition name="expand">
                                        <div v-if="openTermId === term.id" class="px-5 pb-5 pt-2 bg-white border-t">
                                            <p class="text-gray-700 leading-relaxed">{{ term.definition }}</p>
                                        </div>
                                    </transition>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div v-else class="text-center py-20 bg-gray-50 rounded-lg">
                        <h3 class="text-xl font-semibold text-gray-800">Istilah Tidak Ditemukan</h3>
                        <p class="mt-2 text-gray-500">
                            Coba ubah kata kunci pencarian atau pilih filter alfabet yang lain.
                        </p>
                    </div>
                </main>

            </div>
        </div>
    </div>
</template>

<style scoped>
/* Transisi untuk expand/collapse accordion */
.expand-enter-active, .expand-leave-active {
    transition: grid-template-rows 0.3s ease;
    display: grid;
    grid-template-rows: 0fr;
}
.expand-enter-to, .expand-leave-from {
    grid-template-rows: 1fr;
}
.expand-enter-from, .expand-leave-to {
    grid-template-rows: 0fr;
}
.expand-enter-active > div, .expand-leave-active > div {
    overflow: hidden;
}
</style>