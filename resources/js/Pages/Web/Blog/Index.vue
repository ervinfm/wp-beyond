<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PostCard from '@/Components/Web/Blog/PostCard.vue';
import Pagination from '@/Components/Shared/Pagination.vue';

// 1. Impor komponen Splide dan CSS-nya
import { Splide, SplideSlide } from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css'; // Impor tema default Splide

const props = defineProps({
    highlightedPosts: Array,
    posts: Object, // Objek Paginator
    categories: Array,
    currentCategory: { // Akan ada jika di halaman kategori
        type: Object,
        default: null
    },
});


const mainHighlight = props.highlightedPosts[0] || null;
const secondaryHighlights = props.highlightedPosts.slice(1, 3);

// 2. Definisikan opsi untuk slider Splide
const splideOptions = {
  rewind: false,       // Jangan kembali ke awal setelah slide terakhir
  autoWidth: true,     // Lebar setiap slide akan menyesuaikan kontennya (penting!)
  gap: '0.5rem',         // Jarak antar kategori (16px)
  padding: '1rem',     // Beri sedikit padding di sisi kiri dan kanan track
  pagination: false,   // Sembunyikan navigasi titik-titik
  arrows: true,        // Tampilkan tombol panah Sebelumnya/Berikutnya
  drag: 'free',        // Memungkinkan pengguna "melempar" slider dengan mouse/jari
  snap: false,         // Jangan otomatis snap ke slide terdekat saat dilempar
  slideFocus: false,   // Hilangkan outline biru saat slide difokuskan
};
</script>

<template>
    <Head title="Blog & Wawasan Terbaru" />

    <section class="py-6 md:py-8 bg-grey-200">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10 md:mb-8">
                <h1 v-if="currentCategory" class="text-xl md:text-2xl lg:text-3xl font-extrabold text-black">
                    Artikel Kategori: <span class="text-yellow-500">{{ currentCategory.name }}</span>
                </h1>
                <h1 v-else class="text-1xl md:text-2xl lg:text-3xl font-extrabold text-yellow-500">
                    Blog dan Artikel Teknologi
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-md">
                    Temukan artikel, studi kasus, dan tren terkini seputar teknologi dan bisnis dari tim ahli kami.
                </p>
            </div>
            
            <div v-if="mainHighlight && !currentCategory" class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 mb-16">
                <Link :href="route('blog.show', mainHighlight.slug)" class="group block relative rounded-2xl overflow-hidden shadow-2xl min-h-[400px]">
                    <img :src="mainHighlight.image_url" :alt="mainHighlight.title" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="relative p-6 md:p-8 h-full flex flex-col justify-end text-white">
                        <span v-if="mainHighlight.category" class="text-sm font-semibold bg-yellow-500 text-slate-900 px-3 py-1 rounded-full self-start mb-3">
                            {{ mainHighlight.category.name }}
                        </span>
                        <h2 class="text-2xl md:text-3xl font-bold leading-tight group-hover:underline">
                            {{ mainHighlight.title }}
                        </h2>
                        <p class="mt-2 text-sm opacity-90 line-clamp-2">
                            {{ mainHighlight.excerpt }}
                        </p>
                        <div class="mt-4 text-xs opacity-80">
                            <span>{{ mainHighlight.author.name }} &middot; {{ mainHighlight.published_at_formatted }}</span>
                        </div>
                    </div>
                </Link>

                <div class="grid grid-cols-1 gap-6 md:gap-8">
                    <Link v-for="post in secondaryHighlights" :key="post.id" :href="route('blog.show', post.slug)" class="group block relative rounded-2xl overflow-hidden shadow-xl min-h-[192px]">
                        <img :src="post.image_url" :alt="post.title" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="relative p-6 h-full flex flex-col justify-end text-white">
                            <h3 class="text-lg font-bold leading-tight group-hover:underline">
                                {{ post.title }}
                            </h3>
                            <div class="mt-2 text-xs opacity-80">
                                <span>{{ post.author.name }} &middot; {{ post.published_at_formatted }}</span>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>

            <div class="w-full mb-8 md:mb-10 category-slider text-black">
                <Splide :options="splideOptions" aria-label="Telusuri Kategori">
                    <SplideSlide>
                        <Link
                            :href="route('blog.index')"
                            :class="[
                                'whitespace-nowrap rounded-lg px-4 py-2 text-sm text-semibold transition-all duration-200',
                                !currentCategory
                                    ? 'bg-yellow-500 text-slate-900 shadow'
                                    : 'text-black hover:bg-slate-200 dark:hover:bg-slate-700'
                            ]"
                        >
                            Semua
                        </Link>
                    </SplideSlide>
                    
                    <SplideSlide v-for="category in categories" :key="category.id">
                        <Link
                            :href="route('blog.category', category.slug)"
                            :class="[
                                'whitespace-nowrap rounded-lg px-4 py-2 text-sm font-semibold transition-all duration-200 flex items-center',
                                currentCategory && currentCategory.id === category.id
                                    ? 'bg-yellow-500 text-slate-900 shadow'
                                    : 'text-black hover:bg-slate-200 dark:hover:bg-slate-700'
                            ]"
                        >
                            <span>{{ category.name }}</span>
                            <span class="ml-2 text-xs bg-slate-200/80 dark:bg-slate-700/80 rounded-full px-2 py-0.5">{{ category.posts_count }}</span>
                        </Link>
                    </SplideSlide>
                </Splide>
            </div>
            <!-- <hr class="w-3/4 mx-auto my-8 border-t border-slate-200 dark:border-slate-700"> -->

            <div class="mt-5">
                <h2 v-if="!currentCategory && highlightedPosts.length > 0" class="text-xl md:text-2xl font-bold text-yellow-500 mb-8">
                    Artikel Lainnya
                </h2>
                <div v-if="posts.data.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <PostCard v-for="post in posts.data" :key="post.id" :post="post" />
                </div>
                <div v-else class="text-center py-16 bg-white dark:bg-slate-800 rounded-xl shadow-md">
                    <p class="text-gray-600 dark:text-slate-300">Tidak ada artikel untuk ditampilkan di sini.</p>
                </div>
                <Pagination :links="posts.links" class="mt-12" />
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Sembunyikan scrollbar untuk browser Webkit (Chrome, Safari) dan lainnya */
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
</style>