<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Pagination from '@/Components/Shared/Pagination.vue';
import { watch } from 'vue';
import BannerSection from '@/Components/Web/Career/BannerSection.vue';

const props = defineProps({
    jobVacancies: Object,
    filters: Object,
    // --- MODIFIKASI: Terima props baru dari controller ---
    availableLocations: Array,
    availableTypes: Array,
    jobTitlesForRecommendation: Array,
});

const filterForm = useForm({
    search: props.filters.search || '',
    location: props.filters.location || '',
    type: props.filters.type || '',
});

// Watcher untuk pencarian tidak perlu diubah, sudah bagus
let searchTimeout = null;
watch(() => filterForm.search, (newValue) => {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        filterForm.get(route('career.index'), {
            preserveState: true,
            replace: true,
        });
    }, 500);
});

// Fungsi untuk submit filter lokasi & tipe
const submitFilters = () => {
    filterForm.get(route('career.index'), {
        preserveState: true,
        replace: true,
    });
};

// --- HAPUS: Kita tidak lagi menggunakan data hardcoded ---
// const jobTypes = ['Full-time', 'Part-time', 'Contract', 'Internship'];
// const locations = [ 'Jakarta', 'Surabaya', ... ];
</script>

<template>
    <Head title="Karier di Perusahaan Kami" />
    <BannerSection />

    <div class="bg-gray-50 py-12 sm:py-5">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <form @submit.prevent="submitFilters" class="mb-10 p-6 bg-white rounded-lg shadow-md">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Cari Posisi</label>
                        <input type="text" v-model="filterForm.search" id="search" list="job-titles" placeholder="Mis: Software Engineer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <datalist id="job-titles">
                            <option v-for="title in jobTitlesForRecommendation" :key="title" :value="title" />
                        </datalist>
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                        <select v-model="filterForm.location" @change="submitFilters" id="location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Semua Lokasi</option>
                            <option v-for="loc in availableLocations" :key="loc" :value="loc">{{ loc }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Jenis Pekerjaan</label>
                        <select v-model="filterForm.type" @change="submitFilters" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Semua Jenis</option>
                            <option v-for="jobType in availableTypes" :key="jobType" :value="jobType">{{ jobType }}</option>
                        </select>
                    </div>
                </div>
            </form>

            <div v-if="jobVacancies.data && jobVacancies.data.length > 0">
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-8">
                    <div v-for="job in jobVacancies.data" :key="job.id" class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 flex flex-col border border-gray-200 hover:border-blue-500">
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="mb-3">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full"
                                      :class="{
                                          'bg-green-100 text-green-700': job.type === 'Full-time',
                                          'bg-blue-100 text-blue-700': job.type === 'Part-time', // Warna disesuaikan agar lebih kontras
                                          'bg-yellow-100 text-yellow-700': job.type === 'Contract',
                                          'bg-purple-100 text-purple-700': job.type === 'Internship', // Warna disesuaikan
                                      }">
                                    {{ job.type }}
                                </span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                <Link :href="route('career.show', job.slug)" class="hover:text-blue-600 transition-colors">
                                    {{ job.title }}
                                </Link>
                            </h3>
                            <div class="text-sm text-gray-500 mb-3 space-x-2">
                                <span><i class="fas fa-map-marker-alt mr-1"></i>{{ job.location }}</span>
                                <span v-if="job.closing_date_formatted"><i class="fas fa-calendar-alt mr-1"></i>Lamaran s/d {{ job.closing_date_formatted }}</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow">
                                {{ job.short_description }}
                            </p>
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <Link :href="route('career.show', job.slug)" class="font-semibold text-sm text-blue-600 hover:text-blue-800 hover:underline">
                                    Lihat Detail & Lamar <span aria-hidden="true">&rarr;</span>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
                <Pagination :links="jobVacancies.links" class="mt-12" />
            </div>
             <div v-else class="text-center py-16 bg-white rounded-lg shadow">
                 <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                 </svg>
                 <h3 class="mt-2 text-lg font-semibold text-gray-900">Lowongan Tidak Ditemukan</h3>
                 <p class="mt-1 text-sm text-gray-500">
                     Coba ubah filter pencarian Anda atau kembali lagi nanti.
                 </p>
                 <div class="mt-6">
                     <button @click="filterForm.reset()" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                         Reset Filter
                     </button>
                 </div>
             </div>
        </div>
    </div>
</template>

<style scoped>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>