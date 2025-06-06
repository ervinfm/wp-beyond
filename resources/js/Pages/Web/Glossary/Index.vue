<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
const props = defineProps({ groupedTerms: Object });

const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split('');
const searchQuery = ref('');

const filteredTerms = computed(() => {
    if (!searchQuery.value) return props.groupedTerms;
    const filtered = {};
    for (const letter in props.groupedTerms) {
        const matchingTerms = props.groupedTerms[letter].filter(term => 
            term.term.toLowerCase().includes(searchQuery.value.toLowerCase())
        );
        if (matchingTerms.length > 0) {
            filtered[letter] = matchingTerms;
        }
    }
    return filtered;
});
</script>
<template>
    <Head title="Glosarium Teknologi" />
    <div class="container mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold text-center">Glosarium Teknologi</h1>
        <p class="text-center text-gray-600 mt-2">Kamus istilah untuk membantu Anda menavigasi dunia digital.</p>
        
        <div class="my-8 flex justify-center flex-wrap gap-2">
            <a v-for="letter in alphabet" :key="letter" :href="`#letter-${letter}`" class="px-3 py-1 bg-gray-200 rounded">{{ letter }}</a>
        </div>
        <input type="text" v-model="searchQuery" placeholder="Cari istilah..." class="w-full max-w-md mx-auto block p-2 border rounded">

        <div v-for="(terms, letter) in filteredTerms" :key="letter" class="mt-12">
            <h2 :id="`letter-${letter}`" class="text-3xl font-bold text-blue-600 border-b pb-2">{{ letter }}</h2>
            <div class="mt-4 space-y-4">
                <div v-for="term in terms" :key="term.id">
                    <h3 class="font-bold text-lg">{{ term.term }}</h3>
                    <p class="text-gray-700">{{ term.definition }}</p>
                </div>
            </div>
        </div>
    </div>
</template>