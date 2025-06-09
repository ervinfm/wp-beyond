<script setup>
import { Link } from '@inertiajs/vue3';
// Di sini Anda bisa mengimpor komponen Navbar dan Footer nanti
import Navbar from '@/Components/Web/Navbar.vue';
import Footer from '@/Components/Web/Footer.vue';
import CookieConsent from '@/Components/Shared/CookieConsent.vue';

</script>

<template>
    <div class="bg-light-100 text-dark-800">
        
        <Navbar />

        <main>
            <slot />
        </main>

        <Footer />

        <CookieConsent />
    </div>
</template>