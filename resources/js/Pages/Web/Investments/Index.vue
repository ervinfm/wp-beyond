<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import BannerSection from '@/Components/Web/Investment/BannerSection.vue';
import MatricSection from '@/Components/Web/Investment/MatricSection.vue';

// Menerima props yang dikirim dari InvestmentController@index
const props = defineProps({
    investments: Array,
    pageTitle: String
});

// --- State untuk filter ---
const selectedCategory = ref('Semua');

// --- Computed properties untuk data dinamis ---
const categories = computed(() => {
    const allCategories = props.investments.map(inv => inv.category);
    return ['Semua', ...new Set(allCategories)];
});

const filteredInvestments = computed(() => {
    if (selectedCategory.value === 'Semua') {
        return props.investments;
    }
    return props.investments.filter(inv => inv.category === selectedCategory.value);
});


// --- Helper Functions ---
const formatCurrency = (value) => {
    if (!value) return 'Rp 0';
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    }).format(value);
};

const calculatePercentage = (current, target) => {
    if (target === 0) return 0;
    const percentage = (current / target) * 100;
    return Math.min(percentage, 100);
};

const getStatusClass = (status) => {
    switch (status) {
        case 'open':
            return 'bg-green-100 text-green-800 ring-1 ring-inset ring-green-600/20';
        case 'fully_funded':
            return 'bg-blue-100 text-blue-800 ring-1 ring-inset ring-blue-600/20';
        case 'closed':
            return 'bg-gray-100 text-gray-700 ring-1 ring-inset ring-gray-500/20';
        default:
            return 'bg-yellow-100 text-yellow-800 ring-1 ring-inset ring-yellow-600/20';
    }
};

</script>

<template>
    <Head :title="pageTitle" />

    <div class="bg-gray-50">
        <BannerSection />
        
        <MatricSection />

        <section id="investment-list" class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Jelajahi Peluang Investasi</h2>
                <div class="mt-6 flex justify-center items-center flex-wrap gap-2">
                    <button
                        v-for="category in categories"
                        :key="category"
                        @click="selectedCategory = category"
                        :class="[
                            'px-4 py-2 text-sm sm:text-base font-semibold rounded-full transition-all duration-200',
                            selectedCategory === category
                                ? 'bg-blue-600 text-white shadow'
                                : 'bg-white text-gray-700 hover:bg-gray-200 border border-gray-300'
                        ]">
                        {{ category }}
                    </button>
                </div>
            </div>
            
            <div v-if="filteredInvestments.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div v-for="investment in filteredInvestments" :key="investment.id"
                    class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2 flex flex-col">
                    <div class="relative">
                        <div class="aspect-w-16 aspect-h-9">
                            <img class="object-cover w-full h-full" :src="investment.cover_image" :alt="investment.title">
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <span class="text-sm font-semibold text-blue-600 mb-2">{{ investment.category }}</span>
                        <h2 class="text-xl font-bold text-gray-900 leading-tight">
                            <Link :href="route('investments.show', investment.slug)" class="hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded focus:ring-offset-2">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                {{ investment.title }}
                            </Link>
                        </h2>
                        <p class="mt-3 text-gray-600 text-sm flex-grow">
                            {{ investment.short_description }}
                        </p>
                        <div class="mt-6">
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-sky-400 to-blue-600 h-3 rounded-full" :style="{ width: calculatePercentage(investment.current_amount, investment.target_amount) + '%' }"></div>
                            </div>
                            <div class="flex justify-between mt-2">
                                <span class="text-sm font-bold text-gray-800">{{ formatCurrency(investment.current_amount) }}</span>
                                <span class="text-sm font-semibold text-blue-600">{{ calculatePercentage(investment.current_amount, investment.target_amount).toFixed(0) }}%</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-3 border-t">
                        <span :class="getStatusClass(investment.status)" class="text-xs font-bold uppercase px-3 py-1 rounded-full inline-flex items-center">
                            {{ investment.status.replace('_', ' ') }}
                        </span>
                    </div>
                </div>
            </div>

            <div v-else class="text-center py-16 px-6 bg-white rounded-lg border">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada hasil</h3>
                <p class="mt-1 text-sm text-gray-500">Tidak ada peluang investasi yang cocok dengan kategori "{{ selectedCategory }}".</p>
            </div>
        </section>
    </div>
</template>