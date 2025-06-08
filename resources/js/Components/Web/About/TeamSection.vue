<script setup>
    import { Head } from '@inertiajs/vue3';

      // --- DATA UNTUK SECTION TIM KAMI ---
    const teamMembers = [
        {
            name: "Ervin Fikot M",
            title: "Direktur Utama",
            image: "/images/team/ervin.jpeg"
        },
        {
            name: "Ricco Yhandy Fernando",
            title: "Manager Proyek",
            image: "/images/team/ricco.jpg" 
        },
        {
            name: "Tuti Alawiyah P.",
            title: "Manager Keuangan",
            image: "/images/team/wia.jpeg" 
        },
        {
            name: "Nophand Adlil Mukholad",
            title: "Manager Perancangan",
            image: "/images/team/nophand.jpg" 
        },
        {
            name: "Isnan Arif Cahyadi",
            title: "Lead Frontend Dev",
            image: "/images/team/isnan.jpg" 
        },
        {
            name: "Eef Mekelliano",
            title: "Lead Backend Dev",
            image: "/images/team/eef.jpg" 
        },
        {
            name: "M. Satria Gradienta",
            title: "Lead General Desain",
            image: "/images/team/satria.jpg" 
        },
        {
            name: "Ihsan Fadhilah",
            title: "Lead IT Infrastructure",
            image: "/images/team/ihsan.jpg" 
        },
        {
            name: "Rizki Akbari",
            title: "Software Engineer",
            image: "/images/team/akbari.jpg" 
        },
        {
            name: "Alesandro Sinambela",
            title: "Software Engineer",
            image: "/images/team/alesandro.jpg" 
        },
        {
            name: "Dickyfli Perdana Putra",
            title: "IT Consulting",
            image: "/images/team/dickyfli.jpg" 
        },
        {
            name: "Dickyfli Perdana Putra",
            title: "Data Engineer",
            image: "/images/team/lalu.jpg" 
        },
    ];
</script>

<template>
    <div class="container mx-auto">
        <section>
            <div class="relative bg-cover bg-center h-96" style="background-image: url('/images/about-team-banner.jpg'); height: 200px;">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-start p-8">
                    <div class="text-white max-w-3xl ml-16">
                        <h1 class="text-3xl font-bold mb-4"><span class="text-yellow-400">Kenali Tim Kami:</span> Hati dan Pikiran di Balik Inovasi</h1>
                        <p class="text-sm"> Di sinilah semangat kami berdenyut. Setiap anggota tim adalah pilar dari komitmen kami untuk memberdayakan Anda, membawa keahlian, pengalaman, dan gairah yang tak tergoyahkan.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container mx-auto">
        <section class="py-10 px-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                <div v-for="(member, index) in teamMembers" :key="index"
                    class="bg-white rounded-3xl shadow-xl overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-2xl animate__animated animate__zoomIn"
                    :style="{ 'animation-delay': `${0.2 * index}s` }">
                    <img :src="member.image" :alt="member.name" class="w-full h-64 object-cover object-top filter hover:grayscale-0 transition duration-300" />
                    <div class="p-8 text-center">
                        <h3 class="text-md font-bold text-gray-900 mb-2">{{ member.name }}</h3>
                        <p class="text-sm text-yellow-600 font-semibold mb-4">{{ member.title }}</p>
                            <div class="flex justify-center items-center">
                            <div class="text-gray-600 hover:text-yellow-500 transition duration-300">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67L12 13.33 1.5 8.67Z" />
                                        <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3H4.5a3 3 0 0 0-3 3v.158l9.714 5.975a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="text-gray-600 hover:text-yellow-500 transition duration-300 ms-2">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.418 2.865 8.18 6.839 9.504.499.09.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.164-1.11-1.477-1.11-1.477-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.529 2.341 1.087 2.91.827.091-.641.359-1.088.659-1.338-2.22-.253-4.555-1.113-4.555-4.931 0-1.096.392-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.099 2.65.637.7 1.028 1.592 1.028 2.688 0 3.829-2.339 4.673-4.566 4.92.359.307.678.915.678 1.846 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                            <div class="text-gray-600 hover:text-yellow-500 transition duration-300 ms-2">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd" d="M0 1.125A1.125 1.125 0 0 1 1.125 0h21.75A1.125 1.125 0 0 1 24 1.125v21.75A1.125 1.125 0 0 1 22.875 24H1.125A1.125 1.125 0 0 1 0 22.875V1.125ZM12.003 4.25h-.007a4.25 4.25 0 0 0-4.246 4.25v9.25h3.5v-9.25a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 .75.75v9.25h3.5v-9.25a4.25 4.25 0 0 0-4.246-4.25ZM3.25 8.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                            <div class="text-gray-600 hover:text-yellow-500 transition duration-300 ms-2">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd" d="M12 0C8.75 0 8.336 0.013 7.02 0.076 5.704 0.14 4.887 0.323 4.095 0.634 3.296 0.947 2.651 1.378 2.052 1.978 1.453 2.577 1.022 3.222 0.71 4.02C0.398 4.813 0.215 5.63 0.151 6.946 0.088 8.263 0.075 8.677 0.075 12c0 3.323 0.013 3.737 0.076 5.054 0.064 1.316 0.247 2.133 0.558 2.925 0.313 0.799 0.744 1.444 1.344 2.043 0.599 0.599 1.244 1.03 2.043 1.341 0.792 0.312 1.609 0.495 2.925 0.558 1.317 0.063 1.731 0.076 5.054 0.076s3.737-0.013 5.054-0.076c1.316-0.063 2.133-0.246 2.925-0.558 0.799-0.313 1.444-0.744 2.043-1.344 0.599-0.599 1.03-1.244 1.341-2.043 0.312-0.792 0.495-1.609 0.558-2.925 0.063-1.317 0.076-1.731 0.076-5.054s-0.013-3.737-0.076-5.054c-0.063-1.316-0.246-2.133-0.558-2.925C23.053 3.296 22.622 2.651 22.022 2.052c-0.599-0.599-1.244-1.03-2.043-1.341C19.187 0.398 18.37 0.215 17.054 0.151 15.737 0.088 15.323 0.075 12 0.075Zm0 2.25c-3.268 0-3.693 0.013-4.99 0.076-1.294 0.063-1.928 0.237-2.348 0.407-0.428 0.174-0.718 0.39-0.985 0.657-0.267 0.267-0.483 0.557-0.657 0.985-0.17 0.42-0.344 1.054-0.407 2.348-0.063 1.297-0.076 1.722-0.076 4.99s0.013 3.693 0.076 4.99c0.063 1.294 0.237 1.928 0.407 2.348 0.174 0.428 0.39 0.718 0.657 0.985 0.267 0.267 0.557 0.483 0.985 0.657 0.42 0.17 1.054 0.344 2.348 0.407 1.297 0.063 1.722 0.076 4.99 0.076s3.693-0.013 4.99-0.076c1.294-0.063 1.928-0.237 2.348-0.407 0.428-0.174 0.718-0.39 0.985-0.657 0.267-0.267 0.483-0.557 0.657-0.985 0.17-0.42 0.344-1.054 0.407-2.348 0.063-1.297 0.076-1.722 0.076-4.99s-0.013-3.693-0.076-4.99c-0.063-1.294-0.237-1.928-0.407-2.348-0.174-0.428-0.39-0.718-0.657-0.985-0.267-0.267-0.557-0.483-0.985-0.657-0.42-0.17-1.054-0.344-2.348-0.407C15.693 2.263 15.268 2.25 12 2.25Zm0 3.625A5.625 5.625 0 1 0 17.625 11.5 5.625 5.625 0 0 0 12 5.875Zm0 2.25a3.375 3.375 0 1 1 0 6.75 3.375 3.375 0 0 1 0-6.75Zm6.495-2.261a.895.895 0 1 1 0 1.79.895.895 0 0 1 0-1.79Z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>