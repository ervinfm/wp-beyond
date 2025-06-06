<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;    // Impor model Post
use App\Models\User;    // Impor model User
use App\Models\Category; // Impor model Category
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->truncate(); // Kosongkan tabel dulu

        // Pastikan ada user, minimal user dengan ID 1
        $user = User::first(); // Ambil user pertama, atau buat jika tidak ada
        if (!$user) {
            // Buat user dummy jika tidak ada (opsional, sesuaikan)
            $user = User::factory()->create([
                'user_id' => (string) Str::uuid(),
                'name' => 'Penulis Konten',
                'email' => 'author@example.com',
            ]);
        }
        $userId = $user->id;

        // Ambil semua kategori untuk dipetakan
        $categories = Category::pluck('id', 'slug')->all();

        $posts = [
            [
                'category_slug' => 'kecerdasan-buatan-ai',
                'title' => 'Membedah Potensi AI Generatif untuk Bisnis Anda di 2025',
                'excerpt' => 'AI Generatif bukan lagi sekadar tren, melainkan revolusi. Pahami bagaimana Anda bisa memanfaatkannya untuk inovasi produk, efisiensi operasional, dan pengalaman pelanggan yang lebih personal.',
                'body' => '<p>Tahun 2025 menjadi saksi bisu bagaimana Kecerdasan Buatan (AI) Generatif mengubah lanskap bisnis global. Mulai dari pembuatan konten otomatis, desain produk yang lebih cepat, hingga layanan pelanggan yang prediktif, potensinya nyaris tak terbatas.</p><h2>Apa Itu AI Generatif?</h2><p>Secara sederhana, AI Generatif adalah jenis AI yang mampu menciptakan konten baru dan orisinal, seperti teks, gambar, audio, bahkan video, berdasarkan data yang telah dipelajarinya. Ini berbeda dengan AI analitik yang hanya menganalisis data yang ada.</p><h3>Penerapan di Bisnis:</h3><ul><li><strong>Pemasaran:</strong> Pembuatan copy iklan, email, dan konten media sosial secara otomatis.</li><li><strong>Desain Produk:</strong> Iterasi desain produk yang lebih cepat berdasarkan parameter tertentu.</li><li><strong>Layanan Pelanggan:</strong> Chatbot yang lebih canggih dan mampu memberikan solusi kompleks.</li></ul><p>Kunci sukses implementasi AI Generatif adalah memahami kasus penggunaan yang tepat untuk bisnis Anda dan memulai dengan proyek percontohan yang terukur.</p>',
                'image' => 'ai-generatif-2025.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'category_slug' => 'keamanan-siber',
                'title' => '5 Ancaman Siber Teratas yang Mengintai Perusahaan di Indonesia',
                'excerpt' => 'Kejahatan siber tidak pernah tidur. Kenali ancaman paling relevan yang dihadapi perusahaan di Indonesia dan langkah-langkah proaktif untuk melawannya.',
                'body' => '<p>Dengan meningkatnya digitalisasi, risiko serangan siber juga semakin tinggi. Khususnya di Indonesia, beberapa jenis serangan menjadi sangat dominan.</p><h2>Ancaman Utama:</h2><ol><li><strong>Phishing & Spear Phishing:</strong> Serangan rekayasa sosial yang menargetkan karyawan untuk mencuri kredensial.</li><li><strong>Ransomware:</strong> Malware yang mengenkripsi data penting dan meminta tebusan.</li><li><strong>Serangan DDoS:</strong> Membanjiri server dengan traffic palsu hingga layanan lumpuh.</li><li><strong>Pembobolan Data (Data Breach):</strong> Pencurian data sensitif pelanggan atau perusahaan.</li><li><strong>Ancaman Insider:</strong> Risiko dari dalam organisasi, baik disengaja maupun tidak.</li></ol><p>Membangun budaya keamanan, pelatihan karyawan, dan implementasi solusi keamanan berlapis adalah kunci untuk memitigasi risiko ini.</p>',
                'image' => 'ancaman-siber-indonesia.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => true,
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'category_slug' => 'pengembangan-web',
                'title' => 'Tren Desain Web 2025: Interaktivitas dan Personalisasi',
                'excerpt' => 'Tampilan web yang statis sudah usang. Pengguna modern mendambakan pengalaman yang lebih dinamis, interaktif, dan disesuaikan dengan preferensi mereka. Apa saja trennya?',
                'body' => '<p>Desain web terus berkembang. Di tahun 2025, fokus utama adalah menciptakan pengalaman pengguna yang imersif dan personal.</p><h3>Kunci Tren:</h3><ul><li><strong>Microinteractions:</strong> Animasi kecil yang memberikan feedback visual dan membuat interaksi lebih menyenangkan.</li><li><strong>Desain 3D & Elemen Imersif:</strong> Penggunaan grafis 3D, augmented reality (AR) sederhana, dan parallax scrolling.</li><li><strong>Personalisasi Konten Dinamis:</strong> Menampilkan konten yang berbeda berdasarkan histori atau preferensi pengguna.</li><li><strong>Dark Mode yang Lebih Canggih:</strong> Bukan hanya tema gelap, tetapi juga pilihan kustomisasi warna.</li><li><strong>Tipografi Ekspresif:</strong> Penggunaan font yang lebih berani dan kreatif sebagai elemen desain utama.</li></ul><p>Mengadopsi tren ini dapat meningkatkan engagement pengguna dan memperkuat identitas brand Anda secara signifikan.</p>',
                'image' => 'tren-desain-web-2025.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'category_slug' => 'infrastruktur-cloud-devops',
                'title' => 'DevOps di Era Multi-Cloud: Tantangan dan Strategi Sukses',
                'excerpt' => 'Mengelola DevOps di lingkungan multi-cloud menawarkan fleksibilitas namun juga kompleksitas. Bagaimana strategi terbaik untuk mengatasinya?',
                'body' => '<p>Banyak perusahaan kini mengadopsi strategi multi-cloud untuk menghindari vendor lock-in dan memanfaatkan layanan terbaik dari setiap provider. Namun, ini membawa tantangan baru bagi praktik DevOps.</p><h2>Tantangan Utama:</h2><ul><li>Konsistensi tools dan proses antar cloud.</li><li>Manajemen biaya yang terfragmentasi.</li><li>Keamanan dan kepatuhan di berbagai platform.</li><li>Kurangnya visibilitas end-to-end.</li></ul><h3>Strategi Kunci:</h3><p>Platform orkestrasi terpusat, Infrastructure as Code (IaC), dan budaya kolaborasi yang kuat menjadi fondasi penting untuk sukses DevOps di lingkungan multi-cloud.</p>',
                'image' => 'devops-multicloud.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'category_slug' => 'berita-teknologi',
                'title' => 'Regulasi PDP Indonesia: Apa yang Perlu Diketahui Bisnis Anda?',
                'excerpt' => 'Undang-Undang Pelindungan Data Pribadi (UU PDP) telah berlaku. Pahami implikasi utamanya bagi operasional bisnis Anda dan langkah penyesuaian yang diperlukan.',
                'body' => '<p>Dengan disahkannya UU PDP, semua organisasi yang memproses data pribadi warga negara Indonesia wajib mematuhi serangkaian aturan ketat. Ketidakpatuhan dapat berujung pada sanksi berat.</p><h2>Poin Penting UU PDP:</h2><ul><li>Kewajiban mendapatkan persetujuan (consent) untuk pemrosesan data.</li><li>Hak subjek data (hak untuk mengakses, memperbaiki, menghapus data).</li><li>Kewajiban menunjuk Petugas Pelindungan Data (DPO) untuk organisasi tertentu.</li><li>Aturan transfer data lintas negara.</li><li>Pelaporan insiden kebocoran data.</li></ul><p>Segera lakukan asesmen kepatuhan dan implementasikan langkah-langkah yang diperlukan untuk melindungi bisnis dan pelanggan Anda.</p>',
                'image' => 'uu-pdp-indonesia.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'category_slug' => 'tutorial-panduan',
                'title' => 'Panduan Memulai Proyek Pengembangan Aplikasi Mobile Pertamamu',
                'excerpt' => 'Ingin membuat aplikasi mobile tapi bingung mulai dari mana? Panduan ini mencakup langkah-langkah esensial dari ide hingga peluncuran.',
                'body' => '<p>Mengembangkan aplikasi mobile bisa tampak menakutkan bagi pemula. Namun, dengan perencanaan yang tepat, prosesnya bisa lebih terstruktur.</p><h2>Langkah-Langkah Kunci:</h2><ol><li><strong>Validasi Ide:</strong> Lakukan riset pasar dan pastikan ada kebutuhan untuk aplikasi Anda.</li><li><strong>Pilih Platform:</strong> Native (iOS/Android) atau Cross-Platform (Flutter/React Native)?</li><li><strong>Desain UI/UX:</strong> Buat wireframe dan mockup yang user-friendly.</li><li><strong>Pengembangan (Coding):</strong> Pilih teknologi dan mulai membangun fitur.</li><li><strong>Pengujian (Testing):</strong> Uji aplikasi secara menyeluruh di berbagai perangkat.</li><li><strong>Peluncuran & Pemasaran:</strong> Publikasikan di app store dan promosikan.</li></ol><p>Memulai dari MVP (Minimum Viable Product) adalah strategi yang baik untuk mendapatkan feedback awal.</p>',
                'image' => 'panduan-app-mobile.jpg',
                'status' => 'PUBLISHED', // Contoh artikel draft
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(20), // Draft tidak punya tanggal publikasi
            ],
            [
                'category_slug' => 'transformasi-digital',
                'title' => 'Studi Kasus: Bagaimana Digitalisasi Mengubah Wajah Industri Ritel',
                'excerpt' => 'Pelajari bagaimana adopsi teknologi seperti POS cloud, e-commerce, dan analitik data membantu salah satu klien kami meningkatkan penjualan hingga 150% dalam setahun.',
                'body' => '<p>Transformasi digital telah menjadi kunci bertahan dan bertumbuh di sektor ritel yang sangat kompetitif. Dalam studi kasus ini, kita akan melihat perjalanan salah satu klien kami, sebuah brand fashion lokal, yang berhasil melakukan lompatan besar.</p><h3>Tantangan Awal:</h3><ul><li>Manajemen inventaris yang manual dan tidak akurat.</li><li>Tidak ada kanal penjualan online yang terintegrasi.</li><li>Kesulitan memahami perilaku pelanggan.</li></ul><h3>Solusi yang Kami Implementasikan:</h3><ol><li><strong>Sistem POS Cloud:</strong> Menyatukan data penjualan dan stok dari semua cabang toko fisik.</li><li><strong>Platform E-commerce:</strong> Membangun toko online yang terintegrasi langsung dengan sistem inventaris.</li><li><strong>Dashboard Analitik:</strong> Memvisualisasikan data penjualan untuk membantu pengambilan keputusan strategis.</li></ol><p>Hasilnya, efisiensi operasional meningkat drastis, jangkauan pasar meluas, dan pengambilan keputusan menjadi berbasis data, yang berujung pada pertumbuhan pendapatan yang signifikan.</p>',
                'image' => 'studi-kasus-ritel.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => true, // Menjadikannya featured untuk variasi di highlight
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'category_slug' => 'pengembangan-web',
                'title' => 'Headless CMS vs Monolithic CMS: Mana yang Tepat untuk Proyek Anda?',
                'excerpt' => 'Memilih Content Management System (CMS) yang tepat adalah keputusan fundamental. Pahami perbedaan, kelebihan, dan kekurangan antara pendekatan Headless dan Monolithic.',
                'body' => '<p>Saat membangun website atau aplikasi, arsitektur CMS akan sangat memengaruhi fleksibilitas, performa, dan skalabilitas proyek Anda.</p><h2>Monolithic CMS (Tradisional)</h2><p>Contohnya seperti WordPress atau Drupal. Backend (pengelolaan konten) dan frontend (tampilan) terikat erat. Cocok untuk website standar seperti blog atau situs perusahaan sederhana karena kemudahan setup dan banyaknya plugin siap pakai.</p><h2>Headless CMS</h2><p>Backend dan frontend sepenuhnya terpisah. Konten disajikan melalui API. Ini memberikan kebebasan penuh bagi developer untuk membangun frontend dengan teknologi apa pun (React, Vue, Svelte) dan menyajikan konten ke berbagai platform (web, mobile app, IoT) dari satu sumber. Sangat cocok untuk proyek yang membutuhkan fleksibilitas tinggi dan performa optimal.</p><h3>Kapan Memilih Headless?</h3><ul><li>Saat Anda membutuhkan penyajian konten ke lebih dari satu platform.</li><li>Saat Anda ingin performa frontend yang sangat cepat dengan framework modern.</li><li>Saat tim frontend dan backend bekerja secara terpisah.</li></ul>',
                'image' => 'headless-vs-monolithic.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'category_slug' => 'kecerdasan-buatan-ai',
                'title' => 'Etika dalam AI: Menavigasi Bias dan Tanggung Jawab',
                'excerpt' => 'Saat AI semakin terintegrasi dalam kehidupan kita, pertanyaan etis mengenai bias, privasi, dan akuntabilitas menjadi semakin krusial. Bagaimana kita membangun AI yang bertanggung jawab?',
                'body' => '<p>Kekuatan AI membawa serta tanggung jawab besar. Model AI yang dilatih dengan data yang bias dapat menghasilkan keputusan yang tidak adil dan memperkuat stereotip yang ada. Ini adalah tantangan besar yang harus diatasi.</p><h2>Area Fokus Etika AI:</h2><ol><li><strong>Keadilan dan Bias:</strong> Memastikan model tidak mendiskriminasi kelompok tertentu. Ini memerlukan audit data dan algoritma secara berkala.</li><li><strong>Transparansi (Explainable AI):</strong> Kemampuan untuk memahami dan menjelaskan bagaimana sebuah model AI sampai pada suatu keputusan.</li><li><strong>Privasi Data:</strong> Menggunakan teknik seperti anonimisasi dan diferensial privasi untuk melindungi data pengguna.</li><li><strong>Akuntabilitas:</strong> Menentukan siapa yang bertanggung jawab jika sistem AI membuat kesalahan yang merugikan.</li></ol><p>Membangun kerangka kerja etika AI yang kuat sejak awal bukan lagi pilihan, melainkan sebuah keharusan bagi setiap organisasi yang mengembangkan atau menggunakan teknologi AI.</p>',
                'image' => 'etika-ai.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(30),
            ],
            [
                'category_slug' => 'tutorial-panduan',
                'title' => '5 Tips Meningkatkan Keamanan Akun Online Anda Sehari-hari',
                'excerpt' => 'Keamanan digital dimulai dari kebiasaan pribadi. Berikut adalah 5 langkah sederhana namun sangat efektif yang bisa Anda terapkan sekarang juga untuk melindungi akun online Anda.',
                'body' => '<p>Menjaga keamanan akun online adalah tanggung jawab kita semua. Dengan beberapa langkah mudah, Anda bisa secara signifikan mengurangi risiko akun Anda dibobol.</p><h3>Tips Keamanan Esensial:</h3><ul><li><strong>Gunakan Password Manager:</strong> Jangan pernah menggunakan password yang sama di berbagai layanan. Password manager membantu Anda membuat dan menyimpan password yang kuat dan unik untuk setiap akun.</li><li><strong>Aktifkan Otentikasi Dua Faktor (2FA):</strong> Ini adalah lapisan keamanan terpenting setelah password. Gunakan aplikasi authenticator seperti Google Authenticator atau Authy.</li><li><strong>Waspada Terhadap Phishing:</strong> Jangan sembarangan mengklik link di email atau pesan teks yang mencurigakan. Selalu periksa alamat pengirim dan URL tujuan.</li><li><strong>Perbarui Perangkat Lunak Secara Teratur:</strong> Update pada sistem operasi dan aplikasi seringkali berisi patch keamanan penting.</li><li><strong>Gunakan Jaringan yang Aman:</strong> Hindari melakukan transaksi sensitif saat terhubung ke jaringan Wi-Fi publik yang tidak terenkripsi.</li></ul>',
                'image' => 'tips-keamanan-online.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(8),
            ],
            [
                'category_slug' => 'berita-teknologi',
                'title' => 'Masa Depan Komputasi: Apa itu Quantum Computing?',
                'excerpt' => 'Komputasi kuantum menjanjikan kekuatan pemrosesan yang jauh melampaui komputer super tercanggih saat ini. Meskipun masih dalam tahap awal, dampaknya di masa depan akan sangat masif.',
                'body' => '<p>Komputer klasik bekerja dengan bit, yang bisa bernilai 0 atau 1. Komputer kuantum menggunakan qubit, yang dapat berada dalam superposisi dari kedua nilai tersebut secara bersamaan. Kemampuan ini memungkinkan mereka untuk memecahkan masalah tertentu yang terlalu kompleks untuk komputer klasik.</p><h3>Potensi Aplikasi:</h3><ul><li><strong>Pengembangan Obat & Material:</strong> Mensimulasikan molekul dengan akurasi yang belum pernah terjadi sebelumnya.</li><li><strong>Keuangan:</strong> Optimisasi portofolio investasi dan analisis risiko yang jauh lebih canggih.</li><li><strong>Kecerdasan Buatan:</strong> Melatih model machine learning yang jauh lebih kompleks dan kuat.</li><li><strong>Kriptografi:</strong> Memecahkan enkripsi yang ada saat ini, sekaligus menciptakan metode enkripsi baru yang tahan kuantum.</li></ul><p>Meskipun adopsi massal masih jauh, perkembangan pesat di bidang komputasi kuantum adalah sesuatu yang patut diperhatikan oleh para pemimpin teknologi dan bisnis.</p>',
                'image' => 'quantum-computing.jpg',
                'status' => 'PUBLISHED',
                'is_featured' => false,
                'published_at' => Carbon::now()->subDays(45),
            ],
        ];

        foreach ($posts as $postData) {
            // Cari category_id berdasarkan slug yang kita definisikan
            $categoryId = $categories[$postData['category_slug']] ?? null;

            if ($categoryId) {
                Post::create([
                    'user_id' => $userId,
                    'category_id' => $categoryId,
                    'title' => $postData['title'],
                    'slug' => Str::slug($postData['title']),
                    'excerpt' => $postData['excerpt'],
                    'body' => $postData['body'],
                    'image' => $postData['image'],
                    'status' => $postData['status'],
                    'is_featured' => $postData['is_featured'],
                    'published_at' => $postData['published_at'],
                ]);
            } else {
                // Output warning jika kategori tidak ditemukan (seharusnya tidak terjadi jika CategorySeeder benar)
                $this->command->warn("Kategori dengan slug '{$postData['category_slug']}' tidak ditemukan. Artikel '{$postData['title']}' dilewati.");
            }
        }
    }
}