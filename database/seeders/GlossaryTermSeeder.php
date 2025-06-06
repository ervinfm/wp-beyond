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
        $terms = [
            [
                'term' => 'API (Application Programming Interface)',
                'definition' => 'Sebuah set aturan dan protokol yang memungkinkan berbagai aplikasi perangkat lunak untuk berkomunikasi satu sama lain. API menentukan cara permintaan data harus dibuat dan format data yang harus dikirimkan.'
            ],
            [
                'term' => 'Framework',
                'definition' => 'Kerangka kerja perangkat lunak yang menyediakan struktur dasar untuk membangun aplikasi. Framework menawarkan fungsionalitas umum yang dapat diubah atau diperluas oleh pengembang, mempercepat proses pengembangan.'
            ],
            [
                'term' => 'Library (Pustaka)',
                'definition' => 'Kumpulan kode yang telah ditulis sebelumnya yang dapat digunakan pengembang untuk melakukan tugas-tugas tertentu. Berbeda dengan framework, pengembang memanggil kode dari library, bukan sebaliknya.'
            ],
            [
                'term' => 'Database',
                'definition' => 'Kumpulan data terorganisir yang disimpan secara elektronik. Database memungkinkan pengelolaan, pengambilan, dan pembaruan data secara efisien.'
            ],
            [
                'term' => 'SQL (Structured Query Language)',
                'definition' => 'Bahasa pemrograman standar yang digunakan untuk mengelola dan memanipulasi data dalam sistem manajemen basis data relasional (RDBMS).'
            ],
            [
                'term' => 'NoSQL',
                'definition' => 'Jenis database yang tidak menggunakan model relasional tabel-baris seperti SQL. Database NoSQL cocok untuk data tidak terstruktur atau semi-terstruktur dan sering digunakan dalam aplikasi data besar.'
            ],
            [
                'term' => 'Frontend',
                'definition' => 'Bagian dari aplikasi web atau perangkat lunak yang berinteraksi langsung dengan pengguna (client-side). Ini mencakup semua yang dilihat dan dialami pengguna, seperti antarmuka, tata letak, dan elemen visual.'
            ],
            [
                'term' => 'Backend',
                'definition' => 'Bagian dari aplikasi yang berjalan di server (server-side). Backend bertanggung jawab atas logika bisnis, pemrosesan data, interaksi database, dan otentikasi pengguna.'
            ],
            [
                'term' => 'Full-Stack',
                'definition' => 'Mengacu pada pengembangan sisi frontend (client-side) dan backend (server-side) dari sebuah aplikasi. Seorang pengembang full-stack memiliki keahlian di kedua area tersebut.'
            ],
            [
                'term' => 'Git',
                'definition' => 'Sistem kontrol versi terdistribusi (Version Control System) yang digunakan untuk melacak perubahan pada kode sumber selama pengembangan perangkat lunak.'
            ],
            [
                'term' => 'GitHub',
                'definition' => 'Platform hosting berbasis web untuk proyek yang menggunakan Git. GitHub menyediakan fitur kolaborasi seperti pelacakan bug, manajemen tugas, dan permintaan pull (pull requests).'
            ],
            [
                'term' => 'Version Control System (VCS)',
                'definition' => 'Sistem yang merekam perubahan pada file atau serangkaian file dari waktu ke waktu sehingga Anda dapat memanggil kembali versi spesifik di kemudian hari. Contohnya adalah Git, SVN, dan Mercurial.'
            ],
            [
                'term' => 'CI/CD',
                'definition' => 'Singkatan dari Continuous Integration dan Continuous Deployment/Delivery. Praktik DevOps yang mengotomatiskan proses build, uji, dan deployment aplikasi untuk meningkatkan kecepatan dan keandalan rilis.'
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
                'term' => 'Containerization',
                'definition' => 'Metode virtualisasi di tingkat sistem operasi untuk menyebarkan dan menjalankan aplikasi terdistribusi tanpa meluncurkan seluruh mesin virtual (VM) untuk setiap aplikasi.'
            ],
            [
                'term' => 'Kubernetes',
                'definition' => 'Platform orkestrasi container open-source yang mengotomatiskan penyebaran, penskalaan, dan pengelolaan aplikasi dalam container.'
            ],
            [
                'term' => 'Serverless',
                'definition' => 'Model eksekusi komputasi awan di mana penyedia cloud secara dinamis mengelola alokasi dan penyediaan server. Pengembang hanya perlu fokus pada kode tanpa mengelola infrastruktur.'
            ],
            [
                'term' => 'Cloud Computing',
                'definition' => 'Penyediaan layanan komputasi—termasuk server, penyimpanan, database, jaringan, perangkat lunak, analitik, dan intelijen—melalui Internet ("awan").'
            ],
            [
                'term' => 'IaaS (Infrastructure as a Service)',
                'definition' => 'Bentuk komputasi awan yang menyediakan sumber daya komputasi virtual melalui internet. Pengguna bertanggung jawab atas sistem operasi, middleware, dan aplikasi.'
            ],
            [
                'term' => 'PaaS (Platform as a Service)',
                'definition' => 'Layanan cloud yang menyediakan platform bagi pelanggan untuk mengembangkan, menjalankan, dan mengelola aplikasi tanpa kompleksitas membangun dan memelihara infrastruktur.'
            ],
            [
                'term' => 'SaaS (Software as a Service)',
                'definition' => 'Model lisensi dan pengiriman perangkat lunak di mana perangkat lunak dilisensikan berdasarkan langganan dan dihosting secara terpusat oleh penyedia.'
            ],
            [
                'term' => 'HTTP (Hypertext Transfer Protocol)',
                'definition' => 'Protokol lapisan aplikasi untuk sistem informasi terdistribusi, kolaboratif, dan hipermedia. HTTP adalah dasar dari komunikasi data untuk World Wide Web.'
            ],
            [
                'term' => 'HTTPS',
                'definition' => 'Versi aman dari HTTP. Protokol ini mengenkripsi komunikasi antara browser pengguna dan situs web untuk melindungi data dari penyadapan.'
            ],
            [
                'term' => 'REST (Representational State Transfer)',
                'definition' => 'Gaya arsitektur perangkat lunak untuk sistem terdistribusi seperti World Wide Web. API yang mengikuti prinsip REST disebut API RESTful.'
            ],
            [
                'term' => 'GraphQL',
                'definition' => 'Bahasa kueri untuk API dan runtime untuk memenuhi kueri tersebut dengan data yang ada. GraphQL memungkinkan klien untuk meminta data yang mereka butuhkan secara spesifik.'
            ],
            [
                'term' => 'JSON (JavaScript Object Notation)',
                'definition' => 'Format pertukaran data yang ringan dan mudah dibaca manusia. JSON sering digunakan untuk mentransmisikan data antara server dan aplikasi web.'
            ],
            [
                'term' => 'AJAX (Asynchronous JavaScript and XML)',
                'definition' => 'Sekumpulan teknik pengembangan web yang memungkinkan aplikasi web berkomunikasi dengan server secara asinkron (di latar belakang) tanpa mengganggu halaman yang sedang ditampilkan.'
            ],
            [
                'term' => 'Caching',
                'definition' => 'Proses menyimpan salinan file atau data di lokasi sementara (cache) agar dapat diakses lebih cepat di masa mendatang. Caching digunakan untuk meningkatkan kecepatan dan efisiensi.'
            ],
            [
                'term' => 'DNS (Domain Name System)',
                'definition' => 'Sistem penamaan hierarkis dan terdesentralisasi untuk komputer, layanan, atau sumber daya lain yang terhubung ke Internet atau jaringan pribadi. DNS menerjemahkan nama domain menjadi alamat IP.'
            ],
            [
                'term' => 'MVC (Model-View-Controller)',
                'definition' => 'Pola arsitektur perangkat lunak yang memisahkan representasi informasi dari interaksi pengguna dengannya. Pola ini membagi aplikasi menjadi tiga komponen utama: Model, View, dan Controller.'
            ],
            [
                'term' => 'Eloquent ORM',
                'definition' => 'Object-Relational Mapper (ORM) yang disertakan dengan framework Laravel. Eloquent menyediakan implementasi ActiveRecord yang indah dan sederhana untuk bekerja dengan database Anda.'
            ],
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