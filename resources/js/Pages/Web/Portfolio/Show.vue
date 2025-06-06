<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    portfolio: {
        type: Object,
        required: true,
    },
});

// Gambar placeholder default jika gambar utama tidak ada
const defaultCoverImage = '/images/portfolio/default-image.jpg';

// URL gambar utama untuk hero section
const coverImageUrl = computed(() => {
    return props.portfolio.cover_image_url || defaultCoverImage;
});

</script>

<template>
    <Head :title="portfolio.title" />
    <div class="bg-slate-50 dark:bg-slate-900">
        <section class="relative text-white">
            <div class="absolute inset-0">
                <img :src="coverImageUrl" :alt="`Gambar utama untuk ${portfolio.title}`" class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/70 to-transparent"></div>
            </div>

            <div class="container mx-auto relative z-10 min-h-[50vh] md:min-h-[60vh] flex flex-col justify-end px-4 py-12 md:py-20">
                <div class="max-w-4xl">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 leading-tight tracking-tight shadow-black [text-shadow:_0_2px_4px_var(--tw-shadow-color)]">
                        {{ portfolio.title }}
                    </h1>
                    <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-slate-200 text-sm md:text-base mb-8">
                        <div v-if="portfolio.client_name" class="flex items-center">
                            <font-awesome-icon :icon="['fas', 'user-tie']" class="mr-2" />
                            <span>{{ portfolio.client_name }}</span>
                        </div>
                        <div v-if="portfolio.project_date_formatted" class="flex items-center">
                            <font-awesome-icon :icon="['fas', 'calendar-alt']" class="mr-2" />
                            <span>{{ portfolio.project_date_formatted }}</span>
                        </div>
                        <div v-if="portfolio.service_name" class="flex items-center">
                            <Link :href="route('services.show', portfolio.service_slug)" class="flex items-center hover:text-yellow-400 transition-colors">
                                <font-awesome-icon :icon="['fas', 'concierge-bell']" class="mr-2" />
                                <span>{{ portfolio.service_name }}</span>
                            </Link>
                        </div>
                    </div>
                    <a v-if="portfolio.project_url"
                        :href="portfolio.project_url"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center px-6 py-3 bg-yellow-500 text-slate-900 text-base font-semibold rounded-lg shadow-md hover:bg-yellow-400 transition-colors duration-300 transform hover:scale-105"
                    >
                        Lihat Proyek Live
                        <font-awesome-icon :icon="['fas', 'external-link-alt']" class="ml-2 h-4 w-4" />
                    </a>
                </div>
            </div>
        </section>

        <main class="container mx-auto px-4 py-12 md:py-16">
            <div class="max-w-7xl mx-auto">
                <div class="mb-10">
                    <Link
                        :href="route('portfolio.index')"
                        class="inline-flex items-center text-sm font-medium text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300 transition-colors duration-200 group"
                    >
                        <font-awesome-icon :icon="['fas', 'chevron-left']" class="h-4 w-4 mr-2 transition-transform duration-200 group-hover:-translate-x-1" />
                        Kembali ke Semua Portfolio
                    </Link>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-12">
                    <div class="lg:col-span-2">
                        <article v-if="portfolio.description" class="prose prose-lg max-w-none text-gray-700 dark:text-slate-300 link-pretty mb-12 md:mb-16">
                            <div v-html="portfolio.description"></div>
                        </article>

                        <section v-if="portfolio.gallery_images && portfolio.gallery_images.length > 0" class="mt-12">
                            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-gray-900 dark:text-white mb-8">
                                Galeri Proyek
                            </h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                <div v-for="(imageUrl, index) in portfolio.gallery_images" :key="`gallery-${index}`" class="rounded-lg overflow-hidden shadow-md group">
                                    <a :href="imageUrl" target="_blank" rel="noopener noreferrer">
                                        <img :src="imageUrl" :alt="`Gambar galeri ${index + 1} untuk ${portfolio.title}`"
                                                class="w-full h-full object-cover aspect-square transition-transform duration-500 ease-in-out group-hover:scale-110"
                                        />
                                    </a>
                                </div>
                            </div>
                            <p class="text-xs text-center mt-4 text-gray-500 dark:text-slate-400">Klik gambar untuk memperbesar.</p>
                        </section>
                    </div>

                    <aside class="lg:col-span-1 mt-10 lg:mt-0">
                        <div class="sticky top-24 bg-white dark:bg-slate-800 p-6 rounded-xl shadow-xl">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white border-b border-slate-200 dark:border-slate-700 pb-3 mb-4">
                                Informasi Proyek
                            </h3>
                            <ul class="space-y-4 text-sm">
                                <li v-if="portfolio.client_name" class="flex items-start">
                                    <font-awesome-icon :icon="['fas', 'user-tie']" class="w-5 text-center mr-3 mt-1 text-yellow-500 dark:text-yellow-400" />
                                    <div>
                                        <span class="font-semibold text-gray-700 dark:text-slate-200">Klien</span>
                                        <p class="text-gray-600 dark:text-slate-300">{{ portfolio.client_name }}</p>
                                    </div>
                                </li>
                                <li v-if="portfolio.project_date_formatted" class="flex items-start">
                                    <font-awesome-icon :icon="['fas', 'calendar-alt']" class="w-5 text-center mr-3 mt-1 text-yellow-500 dark:text-yellow-400" />
                                    <div>
                                        <span class="font-semibold text-gray-700 dark:text-slate-200">Tanggal Proyek</span>
                                        <p class="text-gray-600 dark:text-slate-300">{{ portfolio.project_date_formatted }}</p>
                                    </div>
                                </li>
                                <li v-if="portfolio.service_name" class="flex items-start">
                                    <font-awesome-icon :icon="['fas', 'concierge-bell']" class="w-5 text-center mr-3 mt-1 text-yellow-500 dark:text-yellow-400" />
                                    <div>
                                        <span class="font-semibold text-gray-700 dark:text-slate-200">Layanan</span>
                                        <p>
                                            <Link :href="route('services.show', portfolio.service_slug)" class="text-indigo-600 hover:underline dark:text-indigo-400">
                                                {{ portfolio.service_name }}
                                            </Link>
                                        </p>
                                    </div>
                                </li>
                                <li v-if="portfolio.project_url" class="flex items-start">
                                    <font-awesome-icon :icon="['fas', 'external-link-alt']" class="w-5 text-center mr-3 mt-1 text-yellow-500 dark:text-yellow-400" />
                                    <div>
                                        <span class="font-semibold text-gray-700 dark:text-slate-200">Situs Web</span>
                                        <p>
                                            <a :href="portfolio.project_url" target="_blank" rel="noopener noreferrer" class="text-indigo-600 hover:underline dark:text-indigo-400 break-all">
                                                Kunjungi Situs Proyek
                                            </a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </main>

        <section class="py-12 md:py-16 bg-slate-100 dark:bg-slate-800">
            <div class="container mx-auto px-4 text-center">
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-8">
                    Ingin Proyek Serupa atau Lebih Inovatif ??
                </h3>
                <Link
                    :href="route('contact')"
                    class="inline-block px-10 py-4 bg-yellow-500 text-slate-900 text-xl font-semibold rounded-lg shadow-lg hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 transition-all duration-300 transform hover:scale-105"
                >
                    Hubungi Kami Sekarang
                </Link>
            </div>
        </section>
    </div>
</template>

<style>
/* Gaya ini bisa Anda pindahkan ke file CSS utama jika diinginkan */
.prose a {
    color: #4f46e5; /* Atur warna link di dalam prose */
}
.prose a:hover {
    text-decoration: underline;
}

.dark .prose a {
    color: #818cf8;
}

.link-pretty a {
    color: #f59e0b; /* Tailwind color: text-yellow-500 */
    text-decoration: none;
    font-weight: 600;
    background-image: linear-gradient(to right, currentColor 0%, currentColor 100%);
    background-repeat: no-repeat;
    background-size: 0% 2px;
    background-position: 0% 100%;
    transition: background-size 0.3s ease-in-out;
}
.link-pretty a:hover,
.link-pretty a:focus {
    background-size: 100% 2px;
}

.dark .link-pretty a {
    color: #facc15; /* Tailwind color: text-yellow-400 */
}
</style>