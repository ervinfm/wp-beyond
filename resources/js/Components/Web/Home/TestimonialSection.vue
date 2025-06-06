<script setup>
import { ref, computed } from 'vue';

// Definisikan prop untuk menerima data testimonial dari Home.vue
const props = defineProps({ // <-- Simpan hasil defineProps ke variabel 'props'
    featuredTestimonials: {
        type: Array,
        default: () => [], // Pastikan ada nilai default array kosong
    },
});

// State untuk mengontrol slide aktif
const currentSlide = ref(0);

// Computed property untuk menentukan jumlah slide
// Akses prop melalui props.featuredTestimonials
const totalSlides = computed(() => props.featuredTestimonials.length); // <-- PERBAIKAN DI SINI

// Fungsi untuk maju ke slide berikutnya
const nextSlide = () => {
    // Akses prop melalui props.featuredTestimonials
    currentSlide.value = (currentSlide.value + 1) % props.featuredTestimonials.length; // <-- PERBAIKAN DI SINI
};

// Fungsi untuk mundur ke slide sebelumnya
const prevSlide = () => {
    // Akses prop melalui props.featuredTestimonials
    currentSlide.value = (currentSlide.value - 1 + props.featuredTestimonials.length) % props.featuredTestimonials.length; // <-- PERBAIKAN DI SINI
};

// Opsional: Auto-play slider
// import { onMounted, onUnmounted } from 'vue';
// let intervalId;
// onMounted(() => {
//     intervalId = setInterval(nextSlide, 5000); // Ganti 5000 dengan interval yang Anda inginkan (dalam ms)
// });
// onUnmounted(() => {
//     clearInterval(intervalId);
// });
</script>

<template>
    <div class="bg-gray-100 py-16 sm:py-12"> 
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-base font-semibold leading-7 text-yellow-600">Apa Kata Mereka</h2>
                <p class="mt-2 text-4xl font-bold tracking-tight sm:text-3xl">
                    Testimoni Pelanggan Kami
                </p>
                <p class="mt-4 text-lg text-dark-200 max-w-3xl mx-auto">
                    Dengarkan langsung dari para klien kami tentang bagaimana kami membantu mereka mencapai kesuksesan.
                </p>
            </div>

            <div v-if="featuredTestimonials && featuredTestimonials.length > 0" class="relative max-w-4xl mx-auto overflow-hidden rounded-lg shadow-xl">
                <div 
                    class="flex transition-transform duration-500 ease-in-out" 
                    :style="{ transform: `translateX(-${currentSlide * 100}%)` }"
                >
                    <div 
                       v-for="(testimonial, index) in props.featuredTestimonials"
                        :key="testimonial.id" 
                        class="w-full flex-shrink-0 p-8 flex flex-col items-center text-center bg-white text-gray-800"
                    >
                        <div class="mb-6">
                            <p class="text-xl italic leading-relaxed">"{{ testimonial.content }}"</p>
                        </div>
                        
                        <div class="mt-auto">
                            <img 
                                v-if="testimonial.avatar" 
                                :src="`/images/testimoni/${testimonial.avatar}`" 
                                :alt="testimonial.name" 
                                class="w-16 h-16 rounded-full mx-auto mb-3 object-cover shadow"
                            />
                            <p class="font-bold text-lg">{{ testimonial.name }}</p>
                            <p class="text-sm text-gray-600">{{ testimonial.position }}</p>

                            <div v-if="testimonial.rating" class="flex justify-center mt-2">
                                <template v-for="n in 5" :key="n">
                                    <svg 
                                        :class="['h-5 w-5', n <= testimonial.rating ? 'text-yellow-400' : 'text-gray-300']" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        viewBox="0 0 20 20" 
                                        fill="currentColor"
                                    >
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.381-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z" />
                                    </svg>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <button 
                    @click="prevSlide" 
                    class="absolute top-1/2 left-0 -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-r-lg z-10 transition-colors duration-200 focus:outline-none"
                >
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button 
                    @click="nextSlide" 
                    class="absolute top-1/2 right-0 -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-l-lg z-10 transition-colors duration-200 focus:outline-none"
                >
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
                    <span 
                        v-for="(dot, index) in totalSlides" 
                        :key="index" 
                        @click="currentSlide = index"
                        :class="['block w-3 h-3 rounded-full cursor-pointer', 
                                 currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50 hover:bg-opacity-75']"
                    ></span>
                </div>
            </div>

            <p v-else class="text-center mt-8 text-dark-200 text-lg">
                Belum ada testimoni untuk ditampilkan.
            </p>
        </div>
    </div>
</template>

<style scoped>
/* Anda bisa menambahkan styling khusus di sini */
/* Menghapus text-dark dan text-dark-200 karena tidak standar Tailwind dan sudah ada warna lain */
</style>