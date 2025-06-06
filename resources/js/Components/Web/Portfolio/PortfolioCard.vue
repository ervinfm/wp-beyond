<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    portfolio: {
        type: Object,
        required: true,
    }
});

const defaultCoverImage = '/images/portfolio/cover-default.jpg'; // Gambar default jika cover tidak ada

const handleImageError = (event) => {
    event.target.src = defaultCoverImage;
};
</script>

<template>
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg overflow-hidden group transition-all duration-300 hover:shadow-2xl">
        <Link :href="route('portfolio.show', portfolio.slug)" class="block">
            <div class="relative aspect-[4/3] overflow-hidden">
                <img
                    :src="portfolio.cover_image_url || defaultCoverImage"
                    :alt="`Cover image for ${portfolio.title}`"
                    @error="handleImageError"
                    class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-110"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                    <h3 class="text-white text-lg font-semibold transform group-hover:translate-y-0 translate-y-4 transition-transform duration-300">
                        {{ portfolio.title }}
                    </h3>
                </div>
            </div>
        </Link>
        <div class="p-5 md:p-6">
            <Link :href="route('portfolio.show', portfolio.slug)">
                <h3 class="text-lg md:text-xl font-semibold text-gray-800 dark:text-white mb-2 group-hover:text-yellow-600 dark:group-hover:text-yellow-400 transition-colors">
                    {{ portfolio.title }}
                </h3>
            </Link>
            <p class="text-sm text-gray-600 dark:text-slate-300 mb-3 line-clamp-3">
                {{ portfolio.short_description }}
            </p>
            <div class="text-xs text-gray-500 dark:text-slate-400 space-y-1">
                <div v-if="portfolio.client_name" class="flex items-center">
                    <font-awesome-icon :icon="['fas', 'user-tie']" class="mr-2 w-3 h-3 text-yellow-500" />
                    Klien: {{ portfolio.client_name }}
                </div>
                <div v-if="portfolio.project_date_formatted" class="flex items-center">
                    <font-awesome-icon :icon="['fas', 'calendar-alt']" class="mr-2 w-3 h-3 text-yellow-500" />
                    Tanggal: {{ portfolio.project_date_formatted }}
                </div>
                <div v-if="portfolio.service_name" class="flex items-center">
                    <font-awesome-icon :icon="['fas', 'concierge-bell']" class="mr-2 w-3 h-3 text-yellow-500" />
                    Layanan: {{ portfolio.service_name }}
                </div>
            </div>
            <div class="mt-4">
                <Link :href="route('portfolio.show', portfolio.slug)" class="inline-flex items-center text-sm font-medium text-yellow-600 hover:text-yellow-700 dark:text-yellow-400 dark:hover:text-yellow-300">
                    Lihat Detail Proyek
                    <font-awesome-icon :icon="['fas', 'arrow-right']" class="ml-2 h-3 w-3" />
                </Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.line-clamp-3 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    /* line-clamp: 3; (jika Tailwind JIT/plugin mendukung) */
}
</style>