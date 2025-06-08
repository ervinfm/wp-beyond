<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GlossaryTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('glossary_terms')->truncate();
        $terms = [
            // ===================================
            // Kategori: Konsep Dasar Pengembangan
            // ===================================
            [
                'term' => 'Agile Development',
                'definition' => 'Metodologi pengembangan perangkat lunak yang berfokus pada pengiriman iteratif dan inkremental, kolaborasi tim, dan respons cepat terhadap perubahan.'
            ],
            [
                'term' => 'API (Application Programming Interface)',
                'definition' => 'Sebuah set aturan dan protokol yang memungkinkan berbagai aplikasi perangkat lunak untuk berkomunikasi satu sama lain. API menentukan cara permintaan data harus dibuat dan format data yang harus dikirimkan.'
            ],
            [
                'term' => 'Backend',
                'definition' => 'Bagian dari aplikasi yang berjalan di server (server-side). Backend bertanggung jawab atas logika bisnis, pemrosesan data, interaksi database, dan otentikasi pengguna.'
            ],
            [
                'term' => 'Framework',
                'definition' => 'Kerangka kerja perangkat lunak yang menyediakan struktur dasar untuk membangun aplikasi. Framework menawarkan fungsionalitas umum yang dapat diubah atau diperluas oleh pengembang, mempercepat proses pengembangan.'
            ],
            [
                'term' => 'Frontend',
                'definition' => 'Bagian dari aplikasi web atau perangkat lunak yang berinteraksi langsung dengan pengguna (client-side). Ini mencakup semua yang dilihat dan dialami pengguna, seperti antarmuka, tata letak, dan elemen visual.'
            ],
            [
                'term' => 'Full-Stack',
                'definition' => 'Mengacu pada pengembangan sisi frontend (client-side) dan backend (server-side) dari sebuah aplikasi. Seorang pengembang full-stack memiliki keahlian di kedua area tersebut.'
            ],
            [
                'term' => 'Library (Pustaka)',
                'definition' => 'Kumpulan kode yang telah ditulis sebelumnya yang dapat digunakan pengembang untuk melakukan tugas-tugas tertentu. Berbeda dengan framework, pengembang memanggil kode dari library, bukan sebaliknya.'
            ],
            [
                'term' => 'Scrum',
                'definition' => 'Salah satu kerangka kerja (framework) yang paling populer untuk mengimplementasikan metodologi Agile, ditandai dengan siklus pengembangan yang disebut "sprint".'
            ],
            [
                'term' => 'SDK (Software Development Kit)',
                'definition' => 'Satu set alat, pustaka, dokumentasi, dan contoh kode yang disediakan oleh vendor perangkat keras atau perangkat lunak untuk membantu pengembang membangun aplikasi pada platform tertentu.'
            ],

            // ===================================
            // Kategori: Bahasa & Teknologi Web
            // ===================================
            [
                'term' => 'AJAX (Asynchronous JavaScript and XML)',
                'definition' => 'Sekumpulan teknik pengembangan web yang memungkinkan aplikasi web berkomunikasi dengan server secara asinkron (di latar belakang) tanpa mengganggu halaman yang sedang ditampilkan.'
            ],
            [
                'term' => 'CSS (Cascading Style Sheets)',
                'definition' => 'Bahasa stylesheet yang digunakan untuk mendeskripsikan presentasi visual dari sebuah dokumen yang ditulis dalam bahasa markup seperti HTML. CSS mengontrol warna, font, tata letak, dan lainnya.'
            ],
            [
                'term' => 'DOM (Document Object Model)',
                'definition' => 'Representasi terstruktur dari dokumen HTML atau XML dalam bentuk pohon objek. JavaScript dapat memanipulasi DOM untuk mengubah konten dan struktur halaman secara dinamis.'
            ],
            [
                'term' => 'HTML (Hypertext Markup Language)',
                'definition' => 'Bahasa markup standar yang digunakan untuk membuat dan menyusun konten di halaman web. HTML adalah fondasi dari semua situs web.'
            ],
            [
                'term' => 'JavaScript',
                'definition' => 'Bahasa pemrograman tingkat tinggi yang memungkinkan interaktivitas pada halaman web. Digunakan secara luas untuk pengembangan frontend maupun backend (dengan Node.js).'
            ],
            [
                'term' => 'JSON (JavaScript Object Notation)',
                'definition' => 'Format pertukaran data yang ringan dan mudah dibaca manusia. JSON sering digunakan untuk mentransmisikan data antara server dan aplikasi web.'
            ],
            [
                'term' => 'PWA (Progressive Web App)',
                'definition' => 'Aplikasi web yang menggunakan teknologi web modern untuk memberikan pengalaman seperti aplikasi asli (native), termasuk kemampuan offline dan notifikasi push.'
            ],

            // ===================================
            // Kategori: Arsitektur & Desain Sistem
            // ===================================
            [
                'term' => 'Monolithic Architecture',
                'definition' => 'Gaya arsitektur tradisional di mana seluruh aplikasi dibangun sebagai satu unit tunggal yang utuh. Semua komponen saling terikat erat.'
            ],
            [
                'term' => 'Microservices Architecture',
                'definition' => 'Gaya arsitektur yang menyusun aplikasi sebagai kumpulan layanan-layanan kecil yang independen. Setiap layanan berjalan dalam prosesnya sendiri dan berkomunikasi melalui API.'
            ],
            [
                'term' => 'MVC (Model-View-Controller)',
                'definition' => 'Pola arsitektur perangkat lunak yang memisahkan representasi informasi dari interaksi pengguna dengannya. Pola ini membagi aplikasi menjadi tiga komponen utama: Model (data), View (tampilan), dan Controller (logika).'
            ],
            [
                'term' => 'Scalability (Skalabilitas)',
                'definition' => 'Kemampuan sebuah sistem untuk menangani peningkatan beban kerja. Skalabilitas vertikal berarti menambah kekuatan (CPU, RAM), sementara skalabilitas horizontal berarti menambah lebih banyak mesin/server.'
            ],
            [
                'term' => 'Server-Side Rendering (SSR)',
                'definition' => 'Proses merender halaman web di server dan mengirimkan halaman HTML yang sudah jadi ke browser. Baik untuk SEO dan waktu muat awal.'
            ],
            [
                'term' => 'Single Page Application (SPA)',
                'definition' => 'Aplikasi web yang memuat satu halaman HTML tunggal dan secara dinamis memperbarui konten saat pengguna berinteraksi. Memberikan pengalaman yang cepat seperti aplikasi desktop. Inertia.js membantu menciptakan SPA dengan Laravel.'
            ],
            
            // ===================================
            // Kategori: Database & Data
            // ===================================
            [
                'term' => 'Database',
                'definition' => 'Kumpulan data terorganisir yang disimpan secara elektronik. Database memungkinkan pengelolaan, pengambilan, dan pembaruan data secara efisien.'
            ],
            [
                'term' => 'Data Migration',
                'definition' => 'Proses mentransfer data dari satu sistem penyimpanan ke sistem lainnya. Dalam konteks framework seperti Laravel, ini juga berarti mengelola perubahan skema database secara terprogram.'
            ],
            [
                'term' => 'Data Warehouse',
                'definition' => 'Sistem penyimpanan data yang dirancang khusus untuk analisis dan pelaporan bisnis (Business Intelligence). Mengumpulkan dan mengkonsolidasikan data dari berbagai sumber.'
            ],
            [
                'term' => 'Eloquent ORM',
                'definition' => 'Object-Relational Mapper (ORM) yang disertakan dengan framework Laravel. Eloquent menyediakan implementasi ActiveRecord yang indah dan sederhana untuk bekerja dengan database Anda.'
            ],
            [
                'term' => 'NoSQL',
                'definition' => 'Jenis database yang tidak menggunakan model relasional tabel-baris seperti SQL. Database NoSQL cocok untuk data tidak terstruktur atau semi-terstruktur.'
            ],
            [
                'term' => 'SQL (Structured Query Language)',
                'definition' => 'Bahasa pemrograman standar yang digunakan untuk mengelola dan memanipulasi data dalam sistem manajemen basis data relasional (RDBMS).'
            ],

            // ===================================
            // Kategori: Jaringan & Protokol Web
            // ===================================
            [
                'term' => 'Bandwidth',
                'definition' => 'Kapasitas maksimum transfer data melalui sebuah jalur dalam periode waktu tertentu, biasanya diukur dalam bit per detik (bps).'
            ],
            [
                'term' => 'Caching',
                'definition' => 'Proses menyimpan salinan file atau data di lokasi sementara (cache) agar dapat diakses lebih cepat di masa mendatang. Caching digunakan untuk meningkatkan kecepatan dan efisiensi.'
            ],
            [
                'term' => 'CDN (Content Delivery Network)',
                'definition' => 'Jaringan server terdistribusi secara geografis yang bekerja sama untuk mengirimkan konten web (gambar, video, CSS) lebih cepat kepada pengguna berdasarkan lokasi mereka.'
            ],
            [
                'term' => 'DNS (Domain Name System)',
                'definition' => 'Sistem penamaan hierarkis untuk komputer dan layanan di internet. DNS berfungsi seperti buku telepon internet, menerjemahkan nama domain (contoh.com) menjadi alamat IP (192.0.2.1).'
            ],
            [
                'term' => 'GraphQL',
                'definition' => 'Bahasa kueri untuk API yang memungkinkan klien meminta data yang mereka butuhkan secara spesifik dan tidak lebih. Alternatif modern untuk REST.'
            ],
            [
                'term' => 'HTTP (Hypertext Transfer Protocol)',
                'definition' => 'Protokol lapisan aplikasi untuk sistem informasi terdistribusi. HTTP adalah dasar dari komunikasi data untuk World Wide Web.'
            ],
            [
                'term' => 'HTTPS',
                'definition' => 'Versi aman dari HTTP. Protokol ini mengenkripsi komunikasi antara browser pengguna dan situs web untuk melindungi data dari penyadapan.'
            ],
            [
                'term' => 'Latency',
                'definition' => 'Waktu tunda antara saat permintaan data dikirim dan saat respons pertama diterima. Latency yang rendah berarti koneksi yang lebih responsif.'
            ],
            [
                'term' => 'REST (Representational State Transfer)',
                'definition' => 'Gaya arsitektur perangkat lunak untuk sistem terdistribusi seperti web. API yang mengikuti prinsip REST disebut API RESTful, yang umumnya berkomunikasi melalui HTTP.'
            ],

            // ===================================
            // Kategori: DevOps & Infrastruktur
            // ===================================
            [
                'term' => 'CI/CD (Continuous Integration/Continuous Delivery)',
                'definition' => 'Praktik DevOps yang mengotomatiskan proses build, uji, dan deployment aplikasi untuk meningkatkan kecepatan dan keandalan rilis.'
            ],
            [
                'term' => 'Containerization',
                'definition' => 'Metode virtualisasi di tingkat OS untuk menyebarkan dan menjalankan aplikasi terdistribusi tanpa meluncurkan seluruh mesin virtual (VM) untuk setiap aplikasi.'
            ],
            [
                'term' => 'DevOps',
                'definition' => 'Kombinasi dari filosofi budaya, praktik, dan alat yang meningkatkan kemampuan organisasi untuk mengirimkan aplikasi dan layanan dengan kecepatan tinggi.'
            ],
            [
                'term' => 'Docker',
                'definition' => 'Platform open-source untuk mengembangkan, mengirim, dan menjalankan aplikasi di dalam wadah (container). Docker memungkinkan aplikasi untuk diisolasi dari lingkungannya.'
            ],
            [
                'term' => 'Git',
                'definition' => 'Sistem kontrol versi terdistribusi (VCS) yang digunakan untuk melacak perubahan pada kode sumber selama pengembangan perangkat lunak.'
            ],
            [
                'term' => 'GitHub',
                'definition' => 'Platform hosting berbasis web untuk proyek yang menggunakan Git. GitHub menyediakan fitur kolaborasi seperti pelacakan bug, manajemen tugas, dan pull requests.'
            ],
            [
                'term' => 'Infrastructure as Code (IaC)',
                'definition' => 'Praktik mengelola dan menyediakan infrastruktur komputasi melalui file definisi yang dapat dibaca mesin (kode), daripada konfigurasi manual.'
            ],
            [
                'term' => 'Kubernetes (K8s)',
                'definition' => 'Platform orkestrasi container open-source yang mengotomatiskan penyebaran, penskalaan, dan pengelolaan aplikasi dalam container dalam skala besar.'
            ],
            [
                'term' => 'Version Control System (VCS)',
                'definition' => 'Sistem yang merekam perubahan pada file dari waktu ke waktu sehingga Anda dapat memanggil kembali versi spesifik di kemudian hari. Contohnya adalah Git, SVN, dan Mercurial.'
            ],

            // ===================================
            // Kategori: Cloud Computing
            // ===================================
            [
                'term' => 'Cloud Computing',
                'definition' => 'Penyediaan layanan komputasi—termasuk server, penyimpanan, database, jaringan, dan perangkat lunak—melalui Internet ("awan").'
            ],
            [
                'term' => 'IaaS (Infrastructure as a Service)',
                'definition' => 'Bentuk komputasi awan yang menyediakan sumber daya komputasi virtual (server, storage, network) melalui internet. Pengguna bertanggung jawab atas sistem operasi ke atas.'
            ],
            [
                'term' => 'PaaS (Platform as a Service)',
                'definition' => 'Layanan cloud yang menyediakan platform bagi pelanggan untuk mengembangkan dan menjalankan aplikasi tanpa kompleksitas membangun dan memelihara infrastruktur di bawahnya.'
            ],
            [
                'term' => 'SaaS (Software as a Service)',
                'definition' => 'Model pengiriman perangkat lunak di mana perangkat lunak dilisensikan berdasarkan langganan dan dihosting secara terpusat oleh penyedia.'
            ],
            [
                'term' => 'Serverless',
                'definition' => 'Model eksekusi komputasi awan di mana penyedia cloud secara dinamis mengelola alokasi dan penyediaan server. Pengembang hanya fokus pada kode tanpa mengelola infrastruktur.'
            ],
            
            // ===================================
            // Kategori: UI/UX & Proses Desain
            // ===================================
            [
                'term' => 'Mockup',
                'definition' => 'Representasi visual statis dan fidelitas tinggi dari sebuah produk. Mockup berfokus pada tampilan akhir, termasuk warna, tipografi, dan ikon.'
            ],
            [
                'term' => 'MVP (Minimum Viable Product)',
                'definition' => 'Versi produk dengan jumlah fitur paling minimal yang cukup untuk diluncurkan kepada pengguna awal. Tujuannya adalah untuk mengumpulkan umpan balik dan memvalidasi ide produk.'
            ],
            [
                'term' => 'Prototype (Purwarupa)',
                'definition' => 'Simulasi interaktif dari produk akhir yang digunakan untuk menguji alur kerja dan pengalaman pengguna sebelum pengembangan penuh dimulai.'
            ],
            [
                'term' => 'Responsive Design',
                'definition' => 'Pendekatan desain web yang membuat halaman dapat beradaptasi dan tampil dengan baik di berbagai ukuran layar dan perangkat, dari desktop hingga ponsel.'
            ],
            [
                'term' => 'UI (User Interface)',
                'definition' => 'Tampilan visual dari sebuah aplikasi atau situs web tempat pengguna berinteraksi. Ini mencakup tombol, ikon, tata letak, dan semua elemen grafis lainnya.'
            ],
            [
                'term' => 'UX (User Experience)',
                'definition' => 'Pengalaman keseluruhan pengguna saat berinteraksi dengan sebuah produk atau layanan, termasuk kemudahan penggunaan, efisiensi, dan emosi yang ditimbulkan.'
            ],
            [
                'term' => 'Wireframe',
                'definition' => 'Kerangka dasar atau "blueprint" visual dari sebuah halaman web atau aplikasi. Wireframe berfokus pada struktur, tata letak, dan fungsionalitas, bukan pada desain visual.'
            ],

            // ===================================
            // Kategori: Keamanan
            // ===================================
            [
                'term' => 'Enkripsi',
                'definition' => 'Proses mengonversi data menjadi kode untuk mencegah akses yang tidak sah. Data yang dienkripsi hanya dapat dibaca setelah didekripsi dengan kunci yang benar.'
            ],
            [
                'term' => 'Firewall',
                'definition' => 'Sistem keamanan jaringan yang memantau dan mengontrol lalu lintas jaringan yang masuk dan keluar berdasarkan aturan keamanan yang telah ditentukan.'
            ],
            [
                'term' => 'Otentikasi',
                'definition' => 'Proses memverifikasi identitas pengguna atau sistem. Contoh umum adalah memasukkan username dan password.'
            ],
            [
                'term' => 'Otorisasi',
                'definition' => 'Proses menentukan apakah pengguna yang sudah terotentikasi memiliki izin untuk mengakses sumber daya tertentu. Ini adalah tentang "apa yang boleh Anda lakukan".'
            ],
            [
                'term' => 'Phishing',
                'definition' => 'Upaya penipuan untuk mendapatkan informasi sensitif, seperti nama pengguna, kata sandi, dan detail kartu kredit, dengan menyamar sebagai entitas tepercaya dalam komunikasi elektronik.'
            ],
            [
                'term' => 'SSL/TLS (Secure Sockets Layer/Transport Layer Security)',
                'definition' => 'Protokol kriptografi yang menyediakan komunikasi aman melalui jaringan komputer. Ini adalah teknologi di balik HTTPS.'
            ],
            [
                'term' => 'Two-Factor Authentication (2FA)',
                'definition' => 'Metode keamanan yang memerlukan dua bentuk identifikasi untuk mengakses sumber daya. Contohnya adalah kata sandi (faktor pertama) dan kode dari ponsel Anda (faktor kedua).'
            ],

            // ===================================
            // Kategori: Kecerdasan Buatan (AI)
            // ===================================
            [
                'term' => 'Artificial Intelligence (AI)',
                'definition' => 'Cabang ilmu komputer yang bertujuan untuk menciptakan mesin cerdas yang mampu melakukan tugas-tugas yang biasanya membutuhkan kecerdasan manusia.'
            ],
            [
                'term' => 'Machine Learning (ML)',
                'definition' => 'Sub-bidang dari AI yang memberikan kemampuan pada sistem untuk belajar dan meningkatkan kinerjanya dari pengalaman (data) tanpa diprogram secara eksplisit.'
            ],
            [
                'term' => 'Deep Learning',
                'definition' => 'Bagian dari Machine Learning yang menggunakan jaringan saraf tiruan (neural networks) dengan banyak lapisan (deep) untuk mempelajari pola yang sangat kompleks dari data dalam jumlah besar.'
            ],
            [
                'term' => 'Natural Language Processing (NLP)',
                'definition' => 'Cabang dari AI yang berfokus pada interaksi antara komputer dan bahasa manusia, memungkinkan mesin untuk memahami, menafsirkan, dan menghasilkan bahasa manusia.'
            ],
            [
                'term' => 'Neural Network (Jaringan Saraf Tiruan)',
                'definition' => 'Model komputasi yang terinspirasi oleh jaringan saraf biologis. Digunakan dalam deep learning untuk mengenali pola dan memecahkan masalah kompleks.'
            ],

            // ===================================
            // Kategori: Metrik & Bisnis
            // ===================================
            [
                'term' => 'KPI (Key Performance Indicator)',
                'definition' => 'Ukuran terukur yang digunakan untuk mengevaluasi keberhasilan suatu organisasi, karyawan, atau proyek dalam mencapai tujuan utama.'
            ],
            [
                'term' => 'ROI (Return on Investment)',
                'definition' => 'Metrik kinerja yang digunakan untuk mengevaluasi efisiensi atau profitabilitas sebuah investasi. Dihitung dengan membagi laba bersih dengan biaya investasi.'
            ],
            [
                'term' => 'SLA (Service Level Agreement)',
                'definition' => 'Kontrak antara penyedia layanan dan pelanggan yang mendefinisikan tingkat layanan yang diharapkan, metrik pengukuran, dan sanksi jika tingkat layanan tidak terpenuhi.'
            ]
        ];


        $data = [];
        foreach ($terms as $term) {
            $data[] = [
                'term' => $term['term'],
                'slug' => Str::slug($term['term']),
                'definition' => $term['definition'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('glossary_terms')->insert($data);
    }
}