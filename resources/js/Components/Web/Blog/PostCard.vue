<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    post: Object,
});
</script>

<template>
    <article class="flex flex-col overflow-hidden rounded-xl shadow-lg dark:bg-slate-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-1.5">
        <Link :href="route('blog.show', post.slug)" class="flex-shrink-0">
            <img class="h-48 w-full object-cover" :src="post.image_url" :alt="post.title">
        </Link>
        <div class="flex flex-1 flex-col justify-between bg-white dark:bg-slate-800 p-6">
            <div class="flex-1">
                <p v-if="post.category" class="text-sm font-medium text-yellow-600 dark:text-yellow-400">
                    <Link :href="route('blog.category', post.category.slug)" class="hover:underline">
                        {{ post.category.name }}
                    </Link>
                </p>
                <Link :href="route('blog.show', post.slug)" class="mt-2 block">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white line-clamp-2">{{ post.title }}</p>
                    <p class="mt-3 text-sm text-gray-600 dark:text-slate-300 line-clamp-3">{{ post.excerpt }}</p>
                </Link>
            </div>
            <div class="mt-6 flex items-center">
                <div class="ml-0">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                        {{ post.author.name }}
                    </p>
                    <div class="flex space-x-1 text-sm text-gray-500 dark:text-slate-400">
                        <time :datetime="post.published_at_formatted">{{ post.published_at_formatted }}</time>
                        </div>
                </div>
            </div>
        </div>
    </article>
</template>

<style scoped>
.line-clamp-2 {
    -webkit-line-clamp: 2;
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
}
.line-clamp-3 {
    -webkit-line-clamp: 3;
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
}
</style>