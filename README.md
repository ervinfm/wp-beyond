# Website Profile - PT. Beyond Digital Nusantara

[![GitHub Repo](https://img.shields.io/badge/GitHub-wp--beyond-181717?style=for-the-badge&logo=github)](https://github.com/ervinfm/wp-beyond)

Website profil perusahaan resmi untuk PT. Beyond Digital Nusantara. Proyek ini dibangun dengan tumpukan teknologi modern untuk menyajikan citra perusahaan yang profesional, dinamis, dan menarik secara visual.

![Pratinjau Aplikasi](https://github.com/ervinfm/wp-beyond/assets/40413533/d163d420-7f28-48b0-8f92-563b7880d643)
*(Saran: Anda dapat memperbarui screenshot di atas dengan versi final dari halaman utama)*

---

## Daftar Isi
- [Tentang Proyek](#tentang-proyek)
- [Tumpukan Teknologi](#tumpukan-teknologi)
- [Fitur Utama](#fitur-utama)
- [Prasyarat](#prasyarat)
- [Panduan Instalasi & Setup](#panduan-instalasi--setup)
- [Menjalankan Aplikasi](#menjalankan-aplikasi)
- [Struktur Folder Penting](#struktur-folder-penting)

---

## Tentang Proyek

Website ini berfungsi sebagai pusat informasi digital untuk PT. Beyond Digital Nusantara. Tujuannya adalah untuk menyajikan profil, visi, misi, layanan, dan peluang kemitraan kepada klien, investor, dan calon mitra. Aplikasi ini menggunakan arsitektur monolitik modern dengan Laravel sebagai backend dan Vue.js yang di-render di sisi server melalui Inertia.js untuk pengalaman single-page application (SPA) yang mulus.

---

## Tumpukan Teknologi

Proyek ini dibangun menggunakan teknologi pilihan yang berfokus pada performa dan pengalaman developer:

- **Backend:** [Laravel 11](https://laravel.com/)
- **Frontend:** [Vue.js 3](https://vuejs.org/) (Composition API)
- **Framework:** [Inertia.js](https://inertiajs.com/)
- **Styling:** [Tailwind CSS 3](https://tailwindcss.com/)
- **Bundler:** [Vite](https://vitejs.dev/)
- **Ikonografi:** [Font Awesome](https://fontawesome.com/)
- **Font:** [Plus Jakarta Sans (Variable)](https://fonts.google.com/specimen/Plus+Jakarta+Sans) via Fontsource

---

## Fitur Utama

- **Halaman Profil Perusahaan:** Seksi dinamis dan premium yang menampilkan narasi dan data kunci perusahaan.
- **Halaman "About Us" dengan Tabs:** Navigasi interaktif untuk menampilkan Visi & Misi, Tim, dan Sejarah Perusahaan.
- **Portal Bisnis:** Halaman khusus dengan sidebar untuk audiens investor dan calon mitra.
- **Layout Persisten:** Pengalaman navigasi yang mulus tanpa reload halaman penuh.
- **Desain Responsif:** Tampilan yang optimal di perangkat desktop, tablet, dan mobile.
- **Animasi Profesional:** Animasi masuk saat scroll dan interaksi halus untuk meningkatkan pengalaman pengguna.

---

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut di mesin Anda:

- PHP >= 8.2
- Composer 2.x
- Node.js >= 18.x
- NPM >= 9.x atau Yarn
- Database (MySQL >= 8.0 / MariaDB / PostgreSQL)

---

## Panduan Instalasi & Setup

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda dari awal hingga akhir.

**1. Clone Repositori**
Buka terminal Anda dan clone repositori ini ke direktori lokal Anda.
```bash
git clone [https://github.com/ervinfm/wp-beyond.git](https://github.com/ervinfm/wp-beyond.git)
cd wp-beyond
```

**2. Install Dependensi PHP**
Gunakan Composer untuk menginstal semua package PHP yang dibutuhkan.
```bash
composer install
```

**3. Buat File `.env`**
Salin file `.env.example` menjadi `.env`. File ini berisi semua konfigurasi lingkungan Anda.
```bash
cp .env.example .env
```

**4. Generate Kunci Aplikasi**
Setiap aplikasi Laravel membutuhkan kunci enkripsi yang unik.
```bash
php artisan key:generate
```

**5. Konfigurasi Database**
Buka file `.env` dan sesuaikan konfigurasi database berikut dengan pengaturan lokal Anda:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=db_wp // sesuaikan dengan db_name anda
DB_USERNAME=postgres // sesuaikan username anda
DB_PASSWORD=postgres // sesuaikan password and
```
*Pastikan Anda sudah membuat database `db_wp` (atau nama lain) di Postgresql Anda.*

**6. Jalankan Migrasi & Seeder**
Perintah ini akan membuat semua tabel di database dan mengisinya dengan data awal yang relevan (seperti data tim, investasi, dll.) berkat seeder yang sudah disiapkan.
```bash
php artisan migrate --seed
```

**7. Buat Symbolic Link untuk Storage**
Agar file di `storage/app/public` (seperti foto tim) dapat diakses dari web, jalankan perintah ini.
```bash
php artisan storage:link
```

**8. Install Dependensi JavaScript**
Gunakan NPM (atau Yarn) untuk menginstal semua package frontend.
```bash
npm install
```

Setup selesai! Proyek Anda sekarang siap untuk dijalankan.

---

## Menjalankan Aplikasi

Untuk pengembangan, Anda perlu menjalankan **dua proses** secara bersamaan di dua terminal terpisah.

**1. Jalankan Vite Development Server**
Proses ini akan meng-compile semua aset frontend (Vue, CSS) dan menyediakan hot-reloading.
```bash
npm run dev
```

**2. Jalankan Laravel Development Server**
Proses ini akan menjalankan aplikasi backend Laravel.
```bash
php artisan serve
```

Setelah kedua proses berjalan, buka browser Anda dan kunjungi:
**[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## Struktur Folder Penting

- **`app/Http/Controllers/Web/`**: Berisi semua controller yang menangani halaman untuk pengunjung umum.
- **`resources/js/Pages/Web/`**: Berisi semua komponen halaman utama Vue (yang dirender oleh Inertia).
- **`resources/js/Layouts/`**: Berisi komponen layout persisten (contoh: `WebLayout.vue`).
- **`resources/js/Components/`**: Berisi komponen-komponen Vue yang dapat digunakan kembali di berbagai halaman.
- **`routes/web.php`**: Tempat mendefinisikan semua route untuk aplikasi web.
- **`database/seeders/`**: Berisi file seeder untuk mengisi data awal ke database.

---

© 2025 PT. Beyond Digital Nusantara. All Rights Reserved.
