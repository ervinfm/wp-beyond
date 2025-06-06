<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

// Menerima prop 'investment' dari InvestmentController@show
const props = defineProps({
    investment: Object
});

// Helper functions (bisa juga dibuat file terpisah jika ingin reusable)
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

// Computed property untuk data yang dihitung
const investmentData = computed(() => {
    const target = parseFloat(props.investment.target_amount);
    const current = parseFloat(props.investment.current_amount);
    const percentage = calculatePercentage(current, target);
    const remaining = target - current;

    return {
        target,
        current,
        percentage,
        remaining: remaining > 0 ? remaining : 0,
        statusInfo: getStatusInfo(props.investment.status, percentage)
    };
});

// Helper untuk info status yang lebih detail
const getStatusInfo = (status, percentage) => {
    switch (status) {
        case 'open':
            return { text: 'Terbuka Untuk Investasi', class: 'bg-green-100 text-green-800', button_text: 'Investasi Sekarang' };
        case 'fully_funded':
            return { text: 'Pendanaan Terpenuhi', class: 'bg-blue-100 text-blue-800', button_text: 'Pendanaan Penuh' };
        case 'closed':
            return { text: 'Pendanaan Ditutup', class: 'bg-gray-100 text-gray-800', button_text: 'Ditutup' };
        default:
            return { text: 'Status Tidak Diketahui', class: 'bg-yellow-100 text-yellow-800', button_text: 'Hubungi Kami' };
    }
};

</script>

<template>
    <Head :title="investment.title" />

    <div class="bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="mb-6">
                <Link :href="route('investments.index')" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Kembali ke Semua Peluang
                </Link>
            </div>

            <div class="lg:grid lg:grid-cols-3 lg:gap-x-8">
                <div class="lg:col-span-2">
                    <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden mb-6">
                        <img :src="investment.cover_image" :alt="investment.title" class="w-full h-full object-cover">
                    </div>
                    
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 lg:hidden mb-4">
                        {{ investment.title }}
                    </h1>

                    <div class="prose prose-lg max-w-none text-gray-700" v-html="investment.full_content">
                    </div>
                </div>

                <div class="mt-8 lg:mt-0 lg:col-span-1">
                    <div class="bg-gray-50 rounded-lg shadow-md p-6 sticky top-8">
                        <h1 class="hidden lg:block text-2xl font-bold tracking-tight text-gray-900">
                            {{ investment.title }}
                        </h1>
                        <span :class="investmentData.statusInfo.class" class="mt-2 inline-block text-xs font-bold uppercase px-3 py-1 rounded-full">
                           {{ investmentData.statusInfo.text }}
                        </span>

                        <div class="mt-6">
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-blue-600 h-3 rounded-full" :style="{ width: investmentData.percentage + '%' }"></div>
                            </div>
                            <p class="text-center font-semibold text-blue-700 mt-2">{{ investmentData.percentage.toFixed(2) }}% Terkumpul</p>
                        </div>

                        <div class="mt-6 space-y-4 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Dana Terkumpul</span>
                                <span class="font-semibold text-gray-900">{{ formatCurrency(investmentData.current) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Target Pendanaan</span>
                                <span class="font-semibold text-gray-900">{{ formatCurrency(investmentData.target) }}</span>
                            </div>
                            <div class="flex justify-between border-t pt-4">
                                <span class="text-gray-600">Sisa Kebutuhan</span>
                                <span class="font-semibold text-gray-900">{{ formatCurrency(investmentData.remaining) }}</span>
                            </div>
                        </div>

                        <div class="mt-8">
                            <button 
                                type="button" 
                                :disabled="investment.status !== 'open'"
                                class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition-all duration-300 ease-in-out
                                       hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500
                                       disabled:bg-gray-400 disabled:cursor-not-allowed">
                                {{ investmentData.statusInfo.button_text }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>