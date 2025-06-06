<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, computed } from 'vue';
import WebLayout from '@/Layouts/WebLayout.vue';

const props = defineProps({
    post: Object,
    relatedPosts: Array,
});

// Ref untuk menampung daftar isi dan elemen konten artikel
const headings = ref([]);
const articleContent = ref(null);

// Fitur Daftar Isi Otomatis
onMounted(() => {
    if (articleContent.value) {
        // Cari semua tag h2 dan h3 di dalam konten artikel
        const headingNodes = articleContent.value.querySelectorAll('h2, h3');
        const foundHeadings = [];
        
        headingNodes.forEach((node, index) => {
            // Buat ID unik untuk setiap heading agar bisa dilink
            const id = `heading-${index}-${node.tagName}`;
            node.id = id;

            foundHeadings.push({
                id: id,
                text: node.innerText,
                level: node.tagName.toLowerCase() === 'h2' ? 1 : 2, // Level untuk indentasi
            });
        });

        headings.value = foundHeadings;
    }
});

// URL untuk tombol berbagi sosial media
const shareUrl = computed(() => window.location.href);
const shareTitle = computed(() => props.post.title);

</script>

<template>
    <Head :title="post.title" />

    <article class="bg-white dark:bg-slate-900 pb-10">
        <header class="relative isolate pt-16 sm:pt-24">
            <div class="absolute inset-0 -z-10">
                <img :src="post.image_url" :alt="post.title" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/80 to-transparent"></div>
            </div>

            <div class="container mx-auto px-4 pb-24 pt-48 sm:pb-32 sm:pt-56 lg:pb-40">
                <div class="max-w-3xl">
                    <div class="flex items-center gap-x-4">
                        <time :datetime="post.published_at" class="text-sm text-slate-300">
                            {{ post.published_at_formatted }}
                        </time>
                        <Link :href="route('blog.category', post.category.slug)"
                                class="relative z-10 rounded-full bg-yellow-500 px-3 py-1.5 text-xs font-semibold text-slate-900 hover:bg-yellow-400 transition-colors">
                            {{ post.category.name }}
                        </Link>
                    </div>
                    <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-white sm:text-4xl md:text-4xl shadow-black [text-shadow:_0_2px_4px_var(--tw-shadow-color)]">
                        {{ post.title }}
                    </h1>
                    <div v-if="post.author" class="mt-8 flex items-center gap-x-4">
                        <img :src="post.author.avatar_url" alt="" class="h-10 w-10 rounded-full bg-slate-800 object-cover">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-white">
                                {{ post.author.name }}
                            </p>
                            <p v-if="post.author.bio" class="text-slate-300">{{ post.author.bio }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container mx-auto px-4 -mt-24 sm:-mt-32 lg:-mt-36">
            <div class="relative grid grid-cols-1 lg:grid-cols-12 lg:gap-12">
                <div class="lg:col-span-8 bg-white dark:bg-slate-800 p-6 md:p-8 rounded-2xl shadow-2xl text-white">
                    <div ref="articleContent"
                            class="prose prose-lg prose-slate dark:prose-invert max-w-none prose-headings:scroll-mt-24 link-pretty"
                            v-html="post.body">
                    </div>
                    
                    <!-- <div class="mt-12 pt-8 border-t border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Bagikan Artikel Ini</h3>
                        <div class="flex space-x-4 mt-4">
                            <a :href="`https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`" target="_blank" class="text-gray-500 hover:text-blue-600">
                                <font-awesome-icon :icon="['fa', 'facebook']" class="h-6 w-6" />
                            </a>
                            <a :href="`https://twitter.com/intent/tweet?url=${shareUrl}&text=${shareTitle}`" target="_blank" class="text-gray-500 hover:text-sky-500">
                                <font-awesome-icon :icon="['fa', 'twitter']" class="h-6 w-6" />
                            </a>
                            <a :href="`https://www.linkedin.com/sharing/share-offsite/?url=${shareUrl}`" target="_blank" class="text-gray-500 hover:text-blue-700">
                                <font-awesome-icon :icon="['fa', 'linkedin']" class="h-6 w-6" />
                            </a>
                            <a :href="`https://api.whatsapp.com/send?text=${shareTitle} ${shareUrl}`" target="_blank" class="text-gray-500 hover:text-green-500">
                                <font-awesome-icon :icon="['fa', 'whatsapp']" class="h-6 w-6" />
                            </a>
                        </div>
                    </div> -->
                </div>

                <aside class="hidden lg:block lg:col-span-4">
                    <div class="sticky top-24 space-y-8">
                        <div v-if="headings.length > 0" class="p-6 bg-white dark:bg-slate-800 rounded-xl shadow-xl">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Daftar Isi</h3>
                            <ul class="space-y-2">
                                <li v-for="heading in headings" :key="heading.id">
                                    <a :href="`#${heading.id}`"
                                        :class="[
                                        'text-sm transition-colors text-gray-600 dark:text-slate-300 hover:text-yellow-600 dark:hover:text-yellow-400',
                                        heading.level === 2 ? 'pl-4' : ''
                                        ]">
                                        {{ heading.text }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div v-if="relatedPosts.length > 0" class="p-6 bg-white dark:bg-slate-800 rounded-xl shadow-xl">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Artikel Terkait</h3>
                            <ul class="space-y-4">
                                <li v-for="related in relatedPosts" :key="related.id">
                                    <Link :href="route('blog.show', related.slug)" class="group flex items-start space-x-4">
                                        <img :src="related.image_url" :alt="related.title" class="h-16 w-16 object-cover rounded-md flex-shrink-0">
                                        <div>
                                            <p class="text-xs font-semibold text-yellow-600 dark:text-yellow-400">{{ related.category_name }}</p>
                                            <h4 class="text-sm font-semibold text-gray-800 dark:text-white group-hover:underline line-clamp-2">
                                                {{ related.title }}
                                            </h4>
                                        </div>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </article>
</template>

<style>
/* Kostumisasi untuk Tailwind Prose */
.prose h2, .prose h3, .prose h4 {
    scroll-margin-top: 6rem; /* Memberi ruang saat link daftar isi di-klik */
}

/* Style link yang menarik untuk konten artikel */
.link-pretty a {
    color: #f59e0b;
    text-decoration: none;
    font-weight: 600;
    background-image: linear-gradient(to right, currentColor 0%, currentColor 100%);
    background-repeat: no-repeat;
    background-size: 0% 2px;
    background-position: 0% 100%;
    transition: background-size 0.3s ease-in-out;
}
.link-pretty a:hover, .link-pretty a:focus {
    background-size: 100% 2px;
}
.dark .link-pretty a {
    color: #facc15;
}
</style>