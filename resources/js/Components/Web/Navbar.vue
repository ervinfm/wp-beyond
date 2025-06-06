<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const isMobileMenuOpen = ref(false);

// Daftar menu di sebelah kiri logo
const primaryMenu = [
    { name: 'About', href:  route('about') },
    { name: 'Services', href:  route('services.index') },
    { name: 'Products', href:  route('products.index') },
    { name: 'Portfolio', href:  route('portfolio.index') },
    { name: 'Blog', href:  route('blog.index') },
    { name: 'Contact', href:  route('contact') },
];
</script>

<template>
    <header class="bg-white border-b border-gray-200">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14">
                <div class="flex items-center space-x-6">
                    <div class="md:hidden">
                        <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="p-1">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                        </button>
                    </div>

                    <Link :href="route('home')" class="flex items-center space-x-2">
                        <img src="/images/logo.svg" alt="Company Logo" class="w-8 h-8">
                        <span class="font-semibold text-lg text-gray-700">Beyond Diginus</span>
                    </Link>

                    <div class="hidden md:flex space-x-6">
                        <Link v-for="item in primaryMenu" :key="item.name" :href="item.href" class="text-sm text-gray-600 hover:underline">
                            {{ item.name }}
                        </Link>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-4">
                        <button class="p-1">
                            <svg class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </button>
                         <button class="p-1">
                            <svg class="h-7 w-7 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </button>
                    </div>
                </div>
            </div>

            <div v-if="isMobileMenuOpen" class="md:hidden py-4 border-t border-gray-200">
                <div class="flex flex-col space-y-2">
                    <Link v-for="item in primaryMenu" :key="item.name" :href="item.href" class="px-2 py-1 text-gray-700 rounded hover:bg-gray-100" @click="isMobileMenuOpen = false">
                        {{ item.name }}
                    </Link>
                </div>
            </div>
        </nav>
    </header>
</template>