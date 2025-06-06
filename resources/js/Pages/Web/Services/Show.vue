<script setup>
import { faGrip } from '@fortawesome/free-solid-svg-icons';
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
// import WebLayout from '@/Layouts/WebLayout.vue'; // Uncomment jika Anda punya layout global

const props = defineProps({
    service: {
        type: Object,
        required: true, // Lebih baik tambahkan required jika service selalu ada
    },
    otherServices: { // Opsional, untuk menampilkan layanan lain yang relevan
        type: Array,
        default: () => [],
    }
});

const defaultServiceImage = '/images/services/default-service-detail.jpg'; // Pastikan path ini benar

// Handler error gambar jika diperlukan, bisa diterapkan pada <img> tag
const handleImageError = (event) => {
    event.target.src = defaultServiceImage;
};

const serviceImageUrl = computed(() => {
    if (props.service && props.service.image) {
        return `/images/services/${props.service.image}`;
    }
    return defaultServiceImage;
});

/**
 * Helper function untuk mendapatkan array ikon FontAwesome.
 * @param {string|null|undefined} iconName - Nama ikon (misal, 'users', 'code').
 * @param {string} [itemPrefix='fas'] - Prefix FontAwesome jika ada di data item (misal, 'fab' untuk brand).
 * @param {string} [defaultIconName='star'] - Nama ikon default jika iconName tidak ada.
 * @param {string} [globalDefaultPrefix='fas'] - Prefix default global jika itemPrefix tidak ada.
 */
const getIconArray = (iconName, itemPrefix, defaultIconName = 'star', globalDefaultPrefix = 'fas') => {
    const prefixToUse = itemPrefix || globalDefaultPrefix;
    if (iconName && typeof iconName === 'string' && iconName.trim() !== '') {
        return [prefixToUse, iconName.trim()];
    }
    return [prefixToUse, defaultIconName]; // Fallback ke ikon default
};

// Helper untuk debug, bisa dihapus nanti
// console.log('Service Data Received:', JSON.parse(JSON.stringify(props.service)));

</script>

<template>
    <Head :title="service.title" />
    <div class="bg-slate-50 dark:bg-slate-900">
        <section class="relative text-white">
            <div class="absolute inset-0">
                <img :src="serviceImageUrl" @error="handleImageError" :alt="`Gambar latar untuk ${service.title}`" class="w-full h-full object-cover opacity-40 md:opacity-100" />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-slate-900/30 md:bg-black/60"></div>
            </div>

            <div class="container mx-auto relative z-10 min-h-[60vh] md:min-h-[70vh] flex flex-col justify-center px-4 py-8 md:py-12">
                <div class="max-w-3xl">
                    <div v-if="service.icon" class="mb-6">
                        <span v-if="service" class="inline-flex items-center justify-center h-8 w-8 md:h-10 md:w-10 rounded-xl bg-yellow-500/80 text-white shadow-lg">
                            <font-awesome-icon :icon="getIconArray(service.icon, 'fas', 'concierge-bell')" class="text-2xl md:text-2xl" />
                        </span>
                    </div>
                    <h1 class="text-4xl sm:text-4xl md:text-4xl font-extrabold mb-6 leading-tight tracking-tight  shadow-black [text-shadow:_0_2px_4px_var(--tw-shadow-color)]">
                        {{ service.title }}
                    </h1>
                    <p class="text-xl md:text-xl text-slate-200 mb-8 max-w-2xl leading-relaxed">
                        {{ service.short_description }}
                    </p>
                    <Link
                        :href="route('contact')"
                        class="inline-block px-8 py-3 bg-yellow-500 text-slate-900 text-lg font-semibold rounded-lg shadow-md hover:bg-yellow-400 transition-colors duration-300 transform hover:scale-105"
                    >
                        Konsultasi Gratis
                    </Link>
                    <div class="mt-6 md:mt-8"> 
                        <Link
                            :href="route('services.index')"
                            class="inline-flex items-center text-sm font-semibold text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300 transition-colors duration-200 group"
                        >
                            <font-awesome-icon :icon="['fas', 'chevron-left']" class="h-4 w-4 mr-2 transition-transform duration-200 group-hover:-translate-x-1" />
                            Kembali ke Daftar Layanan
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <div class="container mx-auto px-4 py-6 md:py-6">
            <div class="max-w-6xl mx-auto">

                <section v-if="service.problem_statement" class="mb-12 md:mb-16 p-6 md:p-8 bg-white dark:bg-slate-800 rounded-xl shadow-xl transform transition-all duration-500 hover:scale-[1.02]">
                    <h2 class="text-2xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-6 flex items-center">
                        <font-awesome-icon :icon="faGrip" class="text-yellow-500 dark:text-yellow-400 mr-3 text-3xl" />
                        Tantangan yang Kami Atasi
                    </h2>
                    <div class="prose prose-lg max-w-none text-gray-700 dark:text-slate-300 link-pretty" v-html="service.problem_statement"></div>
                </section>

                 <section v-if="service.key_features && Array.isArray(service.key_features) && service.key_features.length > 0" class="mb-12 md:mb-16">
                    <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-gray-900 dark:text-white mb-10 text-center">
                        Solusi & Fitur Unggulan Kami
                    </h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                        <div v-for="(feature, index) in service.key_features" :key="`feature-${index}-${feature.title || index}`"
                                class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-xl hover:shadow-2xl transition-shadow duration-300 flex flex-col items-center text-center transform hover:-translate-y-1.5">
                            <div class="flex-shrink-0 mb-4">
                                <span class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 dark:bg-yellow-500/20 text-yellow-600 dark:text-yellow-400">
                                    <font-awesome-icon :icon="getIconArray(feature.icon, feature.prefix, 'check-circle')" class="text-2xl" />
                                </span>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">{{ feature.title }}</h3>
                                <p class="text-sm text-gray-600 dark:text-slate-300">{{ feature.description }}</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section v-if="service.long_description" class="mb-12 md:mb-16 p-6 md:p-8 bg-white dark:bg-slate-800 rounded-xl shadow-xl">
                    <h2 class="text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-6 flex items-center">
                        <font-awesome-icon :icon="['fas', 'info-circle']" class="text-yellow-500 dark:text-yellow-400 mr-3 text-3xl" />
                        Pendekatan & Detail Layanan
                    </h2>
                    <article class="prose prose-lg max-w-none text-gray-700 dark:text-slate-300 link-pretty">
                        <div v-html="service.long_description"></div>
                    </article>
                </section>
                <section v-else-if="!service.long_description && (service.key_features && service.key_features.length > 0)" class="mb-12 md:mb-16 p-6 md:p-8 bg-white dark:bg-slate-800 rounded-xl shadow-xl text-center">
                    <p class="text-gray-600 dark:text-slate-300">Informasi detail lebih lanjut akan segera hadir. Fokus utama kami adalah pada fitur-fitur yang telah disebutkan.</p>
                </section>

                <section v-if="service.client_benefits && service.client_benefits.length > 0" class="mb-12 md:mb-16">
                    <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-gray-900 dark:text-white mb-10 text-center">
                        Manfaat Nyata untuk Pertumbuhan Bisnis Anda
                    </h2>
                    <ul class="space-y-6">
                        <li v-for="(benefit, index) in service.client_benefits" :key="`benefit-${index}-${benefit.title || index}`" class="flex items-start space-x-4 p-3 bg-slate-600/50 dark:bg-slate-700/50 rounded-lg hover:bg-slate-600 dark:hover:bg-slate-700 transition-colors">
                            <div class="flex-shrink-0 pt-1">
                                <font-awesome-icon :icon="benefit.icon ? benefit.icon : ['fas', 'check-double']" class="text-2xl text-green-400" />
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ benefit.title }}</h3>
                                <p v-if="benefit.description" class="mt-1 text-sm text-slate-300 dark:text-slate-400">{{ benefit.description }}</p>
                            </div>
                        </li>
                    </ul>
                </section>

                <div class="mt-8 md:mt-12 mb-6 text-center">
                    <Link
                        :href="route('contact')"
                        class="inline-block px-10 py-4 bg-yellow-500 text-slate-900 text-xl font-semibold rounded-lg shadow-lg hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 transition-all duration-300 transform hover:scale-105"
                    >
                        Mari Diskusikan Kebutuhan Anda
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
/* Tailwind Prose styling default sudah baik, ini untuk tambahan jika perlu */
.prose h1, .prose h2, .prose h3 {
    /* color: #1f2937;  Sudah diatur oleh dark:text-white atau text-gray-900 */
    margin-bottom: 0.75em !important; /* Override jika perlu */
}
.prose p {
    line-height: 1.75;
    margin-bottom: 1.25em !important; /* Override jika perlu */
}
.prose ul, .prose ol {
    margin-left: 1.5em;
    margin-bottom: 1.25em !important;
}
.prose li {
    margin-bottom: 0.5em !important;
}

/* Custom class untuk link yang lebih cantik di dalam prose */
.link-pretty a {
    color: #f59e0b; /* Tailwind color: text-yellow-500 */
    text-decoration: none;
    font-weight: 600;
    background-image: linear-gradient(to right, currentColor 0%, currentColor 100%);
    background-repeat: no-repeat;
    background-size: 0% 2px; /* Dimulai tanpa garis bawah */
    background-position: 0% 100%;
    transition: background-size 0.3s ease-in-out;
}
.link-pretty a:hover,
.link-pretty a:focus {
    background-size: 100% 2px; /* Garis bawah muncul saat hover/focus */
    /* text-decoration: underline; */ /* Hapus jika menggunakan background-image */
}

.dark .link-pretty a {
    color: #facc15; /* Tailwind color: text-yellow-400 */
}

</style>