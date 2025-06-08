<script setup>
import { Head } from '@inertiajs/vue3';

import HeroSection from '@/Components/Web/Home/HeroSection.vue';
import OverviewSection from '@/Components/Web/Home/OverviewSection.vue';
import ServiceSection from '@/Components/Web/Home/ServiceSection.vue';
import ProductSection from '@/Components/Web/Home/ProductSection.vue';
import ClientSection from '@/Components/Web/Home/ClientSection.vue';
import PortfolioSection from '@/Components/Web/Home/PortfolioSection.vue';
import TechSection from '@/Components/Web/Home/TechSection.vue';
import TestimonialSection from '@/Components/Web/Home/TestimonialSection.vue';
import CallToActionSection from '@/Components/Web/Home/CallToActionSection.vue';

defineProps({
    featuredServices: Array,
    featuredProducts: Array,
    featuredPortfolio: Array,
    testimonials: Array,
    techLogos:Array,
    latestPosts: Array,
});
</script>

<template>
    <Head title="Solusi Teknologi & Inovasi Digital" />

    <HeroSection />
    <OverviewSection />
    <ServiceSection :featured-services="featuredServices" /> 
    <ProductSection :featured-products="featuredProducts" /> 
    <ClientSection />
    <PortfolioSection :featured-portfolio="featuredPortfolio"  />
    <TechSection :technology-logos="techLogos" />
    <TestimonialSection :featured-testimonials="testimonials" />
    <CallToActionSection />
</template>