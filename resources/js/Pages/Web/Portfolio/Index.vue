<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BannerSection from '@/Components/Web/Portfolio/BannerSection.vue';
import PortfolioCard from '@/Components/Web/Portfolio/PortfolioCard.vue'; 
import Pagination from '@/Components/Shared/Pagination.vue';

defineProps({
    portfolios: Object,
});
</script>

<template>
    <Head title="Portfolio" />

    <BannerSection />
    
    <section class="py-3 md:py-2 bg-slate-100 ">
        <div class="container mx-auto px-4">
            <div v-if="portfolios && portfolios.data && portfolios.data.length > 0">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    <PortfolioCard
                        v-for="portfolioItem in portfolios.data"
                        :key="portfolioItem.id"
                        :portfolio="portfolioItem"
                    />
                </div>

                <Pagination :links="portfolios.links" class="mt-12 md:mt-16" />

            </div>
            <div v-else class="text-center py-16">
                <svg class="mx-auto h-20 w-20 md:h-24 md:w-24 text-gray-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.012-1.244h3.86M2.25 9h3.86a2.25 2.25 0 002.012-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.218a2.25 2.25 0 012.013 1.244l.256.512a2.25 2.25 0 002.012 1.244h3.86m-19.5 0h19.5M5.625 7.5h.008v.008H5.625V7.5zz" />
                </svg>
                <h3 class="mt-4 text-xl md:text-2xl font-semibold text-gray-700 dark:text-slate-200">
                    Portfolio Belum Tersedia
                </h3>
                <p class="mt-2 text-gray-500 dark:text-slate-400">
                    Saat ini kami sedang memperbarui daftar karya kami. Silakan kembali lagi nanti!
                </p>
            </div>
        </div>
    </section>

</template>