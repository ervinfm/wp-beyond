<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service; // Pastikan model Service di-impor
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->truncate();

        $services = [
            [
                'title' => 'UI/UX Design & Research',
                'short_description' => 'Menciptakan pengalaman digital yang intuitif dan dicintai oleh pengguna melalui riset mendalam dan desain yang memukau.',
                'problem_statement' => '<p>Banyak produk digital gagal karena mengabaikan kebutuhan dan kenyamanan pengguna. Antarmuka yang membingungkan dan alur yang tidak jelas seringkali menyebabkan frustasi, rendahnya tingkat adopsi, dan akhirnya, kegagalan produk mencapai potensinya.</p>',
                'long_description' => '<p>Kami percaya desain bukan hanya tentang estetika, tetapi tentang fungsionalitas dan empati. Tim UI/UX kami melakukan riset pengguna, membuat user journey map, wireframe, dan prototipe interaktif untuk memastikan solusi digital Anda mudah digunakan, efisien, dan memberikan kepuasan maksimal bagi pengguna akhir. Kami fokus pada penciptaan produk yang tidak hanya menyelesaikan masalah tetapi juga menyenangkan untuk digunakan.</p>',
                'image' => 'ui-ux.jpg',
                'icon' => 'palette',
                'key_features' => [
                    ['icon' => 'users', 'title' => 'Riset Pengguna Mendalam', 'description' => 'Memahami target audiens, kebutuhan, dan pain points mereka secara komprehensif.'],
                    ['icon' => 'sitemap', 'title' => 'Perancangan Arsitektur Informasi', 'description' => 'Menyusun struktur konten dan navigasi yang logis dan mudah dipahami.'],
                    ['icon' => 'object-group', 'title' => 'Wireframing & Prototyping', 'description' => 'Visualisasi ide dan pengujian konsep dengan prototipe interaktif sebelum pengembangan.'],
                    ['icon' => 'mobile-alt', 'title' => 'Desain Antarmuka Responsif', 'description' => 'Memastikan tampilan dan fungsionalitas optimal di semua perangkat.'],
                ],
                'client_benefits' => [
                    ['icon' => 'thumbs-up', 'title' => 'Peningkatan Kepuasan Pengguna', 'description' => 'Pengalaman yang mulus dan intuitif meningkatkan loyalitas pelanggan.'],
                    ['icon' => 'chart-line', 'title' => 'Peningkatan Konversi & Adopsi', 'description' => 'Desain yang efektif mengarahkan pengguna untuk mencapai tujuan bisnis Anda.'],
                    ['icon' => 'cogs', 'title' => 'Efisiensi Pengembangan', 'description' => 'Desain yang matang mengurangi risiko perubahan mahal di tahap pengembangan.'],
                ],
                'is_featured' => true,
            ],
            [
                'title' => 'Pengembangan Web & Aplikasi Kustom',
                'short_description' => 'Membangun aplikasi web dan mobile performa tinggi yang dirancang khusus untuk menjawab tantangan unik bisnis Anda.',
                'problem_statement' => '<p>Solusi perangkat lunak generik seringkali tidak sepenuhnya menjawab kebutuhan bisnis yang spesifik dan unik. Hal ini dapat menghambat efisiensi, skalabilitas, dan inovasi. Perusahaan membutuhkan solusi yang benar-benar selaras dengan proses dan tujuan mereka.</p>',
                'long_description' => '<p>Wujudkan ide kompleks Anda menjadi solusi digital yang nyata dan berkinerja tinggi. Tim developer kami ahli dalam membangun aplikasi web dan mobile dari nol menggunakan teknologi modern dan teruji seperti Laravel, React, Vue.js, dan Flutter. Dengan pendekatan Agile yang transparan, kami memastikan produk yang kami hasilkan tidak hanya solid secara teknis, tetapi juga memberikan nilai bisnis yang maksimal dan selaras dengan visi jangka panjang Anda.</p>',
                'image' => 'web-development.jpg',
                'icon' => 'code',
                'key_features' => [
                    ['icon' => 'fab laravel', 'title' => 'Backend Development (Laravel)', 'description' => 'Pengembangan backend yang kuat, aman, dan skalabel dengan framework PHP terpopuler.'],
                    ['icon' => 'fab vuejs', 'title' => 'Frontend Development (Vue/React)', 'description' => 'Antarmuka pengguna yang interaktif, responsif, dan modern.'],
                    ['icon' => 'mobile-alt', 'title' => 'Mobile App Development (Cross-Platform)', 'description' => 'Aplikasi iOS dan Android dengan Flutter atau React Native untuk jangkauan maksimal.'],
                    ['icon' => 'database', 'title' => 'Desain & Integrasi API', 'description' => 'Membangun dan mengintegrasikan API untuk konektivitas antar sistem.'],
                ],
                'client_benefits' => [
                    ['icon' => 'puzzle-piece', 'title' => 'Solusi Sesuai Kebutuhan', 'description' => 'Aplikasi yang dirancang khusus untuk proses bisnis unik Anda.'],
                    ['icon' => 'tachometer-alt', 'title' => 'Performa & Skalabilitas Tinggi', 'description' => 'Aplikasi yang mampu menangani pertumbuhan pengguna dan data Anda.'],
                    ['icon' => 'shield-alt', 'title' => 'Keamanan Terjamin', 'description' => 'Implementasi praktik keamanan terbaik untuk melindungi data Anda.'],
                ],
                'is_featured' => true,
            ],
            [
                'title' => 'Pengembangan E-commerce & Marketplace',
                'short_description' => 'Membangun platform jual-beli online yang aman, skalabel, dan dilengkapi fitur pendukung pertumbuhan bisnis.',
                'problem_statement' => '<p>Pasar online sangat kompetitif. Memiliki platform e-commerce yang standar saja tidak cukup. Bisnis membutuhkan solusi yang kaya fitur, mudah dikelola, dan memberikan pengalaman belanja yang superior bagi pelanggan untuk bersaing dan bertumbuh.</p>',
                'long_description' => '<p>Masuki atau perluas jangkauan pasar digital Anda dengan platform e-commerce atau marketplace yang handal dan kaya fitur. Kami menyediakan solusi end-to-end, mulai dari desain katalog produk yang menarik, sistem manajemen inventaris yang efisien, integrasi payment gateway terpercaya, hingga modul logistik dan promosi. Platform kami dirancang untuk memberikan pengalaman berbelanja yang lancar bagi pelanggan dan kemudahan pengelolaan bagi Anda.</p>',
                'image' => 'ecommerce.jpg',
                'icon' => 'shopping-cart',
                'key_features' => [
                    ['icon' => 'store', 'title' => 'Desain Toko Kustom', 'description' => 'Tampilan toko yang unik dan sesuai dengan brand Anda.'],
                    ['icon' => 'credit-card', 'title' => 'Integrasi Pembayaran Lengkap', 'description' => 'Mendukung berbagai metode pembayaran online yang aman.'],
                    ['icon' => 'cogs', 'title' => 'Manajemen Produk & Inventaris', 'description' => 'Fitur lengkap untuk mengelola produk, stok, dan varian.'],
                    ['icon' => 'truck', 'title' => 'Modul Pengiriman & Logistik', 'description' => 'Integrasi dengan layanan kurir dan pelacakan pengiriman.'],
                ],
                'client_benefits' => [
                    ['icon' => 'chart-area', 'title' => 'Peningkatan Penjualan Online', 'description' => 'Jangkau lebih banyak pelanggan dan tingkatkan konversi.'],
                    ['icon' => 'users-cog', 'title' => 'Efisiensi Operasional', 'description' => 'Otomatisasi proses pengelolaan toko dan pesanan.'],
                    ['icon' => 'smile-beam', 'title' => 'Pengalaman Pelanggan Unggul', 'description' => 'Proses belanja yang mudah dan menyenangkan meningkatkan loyalitas.'],
                ],
                'is_featured' => true, // Saya ubah jadi true untuk contoh
            ],
            [
                'title' => 'Manajemen Cloud & DevOps',
                'short_description' => 'Optimalkan kinerja, keamanan, dan skalabilitas aplikasi Anda.',
                'problem_statement' => '<p>Pengelolaan infrastruktur IT modern bisa sangat kompleks dan memakan waktu, mengalihkan fokus dari pengembangan bisnis inti. Perusahaan memerlukan partner yang bisa memastikan sistem berjalan optimal, aman, dan siap untuk skala besar.</p>',
                'long_description' => '<p>Fokus pada inovasi produk Anda, biarkan kami yang menangani kompleksitas infrastruktur. Kami menawarkan layanan manajemen cloud end-to-end di AWS, Google Cloud, atau Azure. Dengan praktik DevOps terbaik, kami mengotomatiskan pipeline CI/CD, melakukan pemantauan proaktif, dan memastikan ketersediaan tinggi untuk aplikasi Anda.</p>',
                'image' => 'devops.jpg',
                'icon' => 'server',
                'key_features' => [
                    ['icon' => 'fab aws', 'title' => 'Manajemen AWS/GCP/Azure', 'description' => 'Setup, konfigurasi, dan optimasi sumber daya cloud.'],
                    ['icon' => 'rocket', 'title' => 'CI/CD & Otomatisasi Deployment', 'description' => 'Percepat siklus rilis software Anda dengan aman.'],
                    ['icon' => 'shield-virus', 'title' => 'Keamanan Cloud Terpadu', 'description' => 'Implementasi praktik keamanan terbaik untuk infrastruktur cloud.'],
                ],
                'client_benefits' => [
                    ['icon' => 'tachometer-alt', 'title' => 'Kinerja Optimal & Skalabilitas', 'description' => 'Infrastruktur yang tumbuh seiring kebutuhan bisnis Anda.'],
                    ['icon' => 'hand-holding-usd', 'title' => 'Efisiensi Biaya Cloud', 'description' => 'Optimasi penggunaan sumber daya untuk mengurangi biaya.'],
                    ['icon' => 'headset', 'title' => 'Stabilitas & Ketersediaan Tinggi', 'description' => 'Mengurangi downtime dan memastikan layanan selalu aktif.'],
                ],
                'is_featured' => true,
            ],
            [
                'title' => 'Solusi AI & Machine Learning',
                'short_description' => 'Manfaatkan kekuatan AI untuk otomatisasi, prediksi, dan personalisasi.',
                'problem_statement' => '<p>Banyak perusahaan memiliki data berlimpah namun kesulitan mengekstrak nilai darinya atau mengotomatisasi tugas-tugas repetitif yang kompleks. Potensi AI untuk meningkatkan efisiensi dan inovasi seringkali belum termanfaatkan.</p>',
                'long_description' => '<p>Transformasikan bisnis Anda dengan solusi AI dan Machine Learning yang cerdas. Tim data scientist kami siap membantu Anda mulai dari pengembangan model prediktif, sistem rekomendasi, Natural Language Processing (NLP) untuk chatbot, hingga Computer Vision untuk analisis gambar dan video. Kami menerjemahkan data Anda menjadi aksi bisnis yang cerdas.</p>',
                'image' => 'ai-ml.jpg',
                'icon' => 'robot',
                 'key_features' => [
                    ['icon' => 'brain', 'title' => 'Pengembangan Model ML Kustom', 'description' => 'Model yang disesuaikan untuk prediksi, klasifikasi, atau clustering.'],
                    ['icon' => 'comments-dollar', 'title' => 'Chatbot & Virtual Assistant', 'description' => 'Otomatisasi layanan pelanggan dan interaksi.'],
                    ['icon' => 'camera-retro', 'title' => 'Computer Vision Solutions', 'description' => 'Analisis gambar dan video untuk berbagai aplikasi.'],
                ],
                'client_benefits' => [
                    ['icon' => 'cogs', 'title' => 'Otomatisasi Proses Cerdas', 'description' => 'Meningkatkan efisiensi dan mengurangi pekerjaan manual.'],
                    ['icon' => 'lightbulb', 'title' => 'Wawasan Prediktif Akurat', 'description' => 'Membuat keputusan bisnis yang lebih baik berdasarkan data.'],
                    ['icon' => 'user-friends', 'title' => 'Personalisasi Pengalaman Pelanggan', 'description' => 'Meningkatkan engagement dan loyalitas pelanggan.'],
                ],
                'is_featured' => false, // Saya ubah jadi false untuk variasi
            ],
            [
                'title' => 'Analitik Data & Business Intelligence (BI)',
                'short_description' => 'Ubah data mentah Anda menjadi wawasan bisnis yang berharga.',
                'problem_statement' => '<p>Data adalah aset, namun seringkali terpendam dan tidak termanfaatkan. Perusahaan kesulitan membuat keputusan strategis tanpa wawasan yang jelas dari data operasional dan pasar mereka.</p>',
                'long_description' => '<p>Jangan biarkan data Anda menjadi sekadar angka. Kami membantu Anda mengumpulkan, memproses, dan memvisualisasikan data dari berbagai sumber menjadi dashboard BI yang interaktif dan mudah dipahami. Dapatkan wawasan mendalam mengenai kinerja bisnis, tren pasar, dan perilaku pelanggan untuk pengambilan keputusan yang lebih cepat dan tepat.</p>',
                'image' => 'data-analytics.jpg',
                'icon' => 'chart-line',
                'key_features' => [
                    ['icon' => 'database', 'title' => 'Integrasi Data dari Berbagai Sumber', 'description' => 'Menyatukan data dari database, API, file, dll.'],
                    ['icon' => 'chart-pie', 'title' => 'Visualisasi Data Interaktif', 'description' => 'Dashboard custom dengan grafik dan metrik yang relevan.'],
                    ['icon' => 'search-dollar', 'title' => 'Analisis Tren & Peramalan', 'description' => 'Mengidentifikasi pola dan memprediksi hasil di masa depan.'],
                ],
                'client_benefits' => [
                    ['icon' => 'bullseye', 'title' => 'Pengambilan Keputusan Berbasis Data', 'description' => 'Strategi bisnis yang lebih akurat dan efektif.'],
                    ['icon' => 'tachometer-alt', 'title' => 'Pemantauan Kinerja Real-time', 'description' => 'Identifikasi peluang dan masalah lebih awal.'],
                    ['icon' => 'lightbulb', 'title' => 'Penemuan Wawasan Baru', 'description' => 'Mengungkap potensi tersembunyi dari data Anda.'],
                ],
                'is_featured' => false,
            ],
            [
                'title' => 'Keamanan Siber & VAPT',
                'short_description' => 'Lindungi aset digital dan reputasi bisnis Anda dari ancaman siber dengan audit keamanan proaktif.',
                'problem_statement' => '<p>Ancaman siber semakin canggih dan beragam, membahayakan data sensitif, operasional bisnis, dan reputasi perusahaan. Banyak organisasi tidak menyadari kerentanan mereka hingga insiden keamanan terjadi, yang mengakibatkan kerugian finansial dan kepercayaan pelanggan.</p>',
                'long_description' => '<p>Kami menyediakan layanan Vulnerability Assessment and Penetration Testing (VAPT) komprehensif untuk mengidentifikasi, menganalisis, dan memitigasi celah keamanan pada aplikasi web, mobile, dan infrastruktur jaringan Anda sebelum dieksploitasi oleh pihak jahat. Tim ahli keamanan kami menggunakan metodologi standar industri dan tools terkini untuk memberikan laporan mendetail beserta rekomendasi perbaikan yang actionable guna memperkuat postur keamanan digital Anda secara signifikan.</p>',
                'image' => 'cyber-security.jpg',
                'icon' => 'shield-halved',
                'key_features' => [
                    ['icon' => 'search-plus', 'title' => 'Vulnerability Assessment', 'description' => 'Pemindaian dan analisis komprehensif untuk menemukan celah keamanan potensial.'],
                    ['icon' => 'user-secret', 'title' => 'Penetration Testing (Ethical Hacking)', 'description' => 'Simulasi serangan siber terkontrol untuk menguji efektivitas pertahanan Anda.'],
                    ['icon' => 'file-alt', 'title' => 'Pelaporan Detail & Rekomendasi', 'description' => 'Laporan temuan yang jelas dengan prioritas risiko dan panduan perbaikan teknis.'],
                    ['icon' => 'cogs', 'title' => 'Konsultasi Keamanan Pasca-Tes', 'description' => 'Pendampingan dalam implementasi perbaikan dan strategi keamanan berkelanjutan.'],
                ],
                'client_benefits' => [
                    ['icon' => 'lock', 'title' => 'Perlindungan Aset Digital Kritis', 'description' => 'Mengamankan data pelanggan, informasi finansial, dan properti intelektual.'],
                    ['icon' => 'balance-scale', 'title' => 'Kepatuhan Regulasi (Compliance)', 'description' => 'Memenuhi standar keamanan industri seperti ISO 27001, PCI DSS, atau regulasi PDP.'],
                    ['icon' => 'shield-check', 'title' => 'Peningkatan Kepercayaan & Reputasi', 'description' => 'Menunjukkan komitmen Anda terhadap keamanan kepada pelanggan dan stakeholder.'],
                ],
                'is_featured' => false,
            ],
            [
                'title' => 'Pengembangan Blockchain & Web3',
                'short_description' => 'Masuki era internet terdesentralisasi dengan pengembangan aplikasi berbasis teknologi blockchain yang transparan dan aman.',
                'problem_statement' => '<p>Banyak bisnis ingin memanfaatkan potensi transparansi, keamanan, dan model bisnis inovatif dari teknologi Web3 dan blockchain, namun sering terhalang oleh kompleksitas teknis dan kurangnya keahlian internal untuk implementasi yang efektif.</p>',
                'long_description' => '<p>Jelajahi potensi transformatif teknologi Web3 untuk bisnis Anda. Kami memiliki keahlian dalam merancang dan mengembangkan aplikasi terdesentralisasi (dApps), smart contract yang aman dan efisien, serta integrasi dengan berbagai ekosistem blockchain terkemuka. Baik untuk tokenisasi aset, solusi supply chain yang transparan, sistem voting terdesentralisasi, maupun platform NFT, kami siap menjadi mitra Anda.</p>',
                'image' => 'blockchain.jpg',
                'icon' => 'cubes-stacked', // Diubah dari 'cubes' untuk versi FA6
                'key_features' => [
                    ['icon' => 'project-diagram', 'title' => 'Pengembangan Aplikasi Terdesentralisasi (dApps)', 'description' => 'Membangun aplikasi yang berjalan di atas jaringan blockchain (Ethereum, Polygon, dll.).'],
                    ['icon' => 'file-signature', 'title' => 'Desain & Audit Smart Contract', 'description' => 'Membuat kontrak digital yang otomatis, aman, dan telah diaudit untuk keandalan.'],
                    ['icon' => 'coins', 'title' => 'Solusi Tokenisasi & NFT', 'description' => 'Mengubah aset digital atau fisik menjadi token yang dapat dikelola dan diperdagangkan.'],
                    ['icon' => 'wallet', 'title' => 'Integrasi Dompet Kripto & Ekosistem Web3', 'description' => 'Menghubungkan aplikasi Anda dengan dompet digital dan layanan Web3 lainnya.'],
                ],
                'client_benefits' => [
                    ['icon' => 'eye', 'title' => 'Peningkatan Transparansi & Akuntabilitas', 'description' => 'Proses yang tercatat permanen dan dapat diverifikasi oleh semua pihak.'],
                    ['icon' => 'user-shield', 'title' => 'Keamanan Data Lebih Unggul', 'description' => 'Memanfaatkan sifat desentralisasi dan kriptografi untuk proteksi data.'],
                    ['icon' => 'lightbulb', 'title' => 'Model Bisnis & Pendapatan Inovatif', 'description' => 'Membuka peluang baru dalam interaksi pelanggan dan monetisasi aset digital.'],
                ],
                'is_featured' => false,
            ],
            [
                'title' => 'Konsultasi Strategi Digital',
                'short_description' => 'Dapatkan peta jalan transformasi digital yang jelas dan terarah, disesuaikan dengan visi dan sumber daya perusahaan Anda.',
                'problem_statement' => '<p>Di tengah disrupsi teknologi yang cepat, banyak perusahaan kesulitan merumuskan strategi digital yang tepat, menentukan prioritas investasi teknologi, dan mengelola perubahan organisasi yang diperlukan untuk sukses di era digital.</p>',
                'long_description' => '<p>Transformasi digital bukan hanya tentang teknologi, tetapi tentang strategi dan perubahan budaya. Konsultan ahli kami bekerja sama dengan Anda untuk menganalisis kesiapan digital perusahaan, mengidentifikasi peluang inovasi, dan merumuskan peta jalan transformasi digital yang komprehensif dan terukur. Kami membantu Anda menavigasi kompleksitas teknologi untuk mencapai hasil bisnis yang nyata.</p>',
                'image' => 'consulting.jpg',
                'icon' => 'comments-dollar', // Diubah dari 'comments' untuk lebih spesifik
                'key_features' => [
                    ['icon' => 'search-location', 'title' => 'Analisis Kesiapan Digital (Digital Maturity Assessment)', 'description' => 'Evaluasi komprehensif terhadap proses, teknologi, dan SDM Anda saat ini.'],
                    ['icon' => 'road', 'title' => 'Penyusunan Peta Jalan Transformasi Digital', 'description' => 'Rencana strategis langkah demi langkah yang terukur dan selaras dengan tujuan bisnis.'],
                    ['icon' => 'lightbulb-gear', 'title' => 'Rekomendasi Teknologi & Arsitektur Solusi', 'description' => 'Pemilihan platform dan tools yang paling sesuai dengan kebutuhan dan anggaran.'],
                    ['icon' => 'users-cog', 'title' => 'Manajemen Perubahan & Adopsi Teknologi', 'description' => 'Membantu tim Anda beradaptasi dan memaksimalkan penggunaan teknologi baru.'],
                ],
                'client_benefits' => [
                    ['icon' => 'compass', 'title' => 'Arah Bisnis Digital yang Jelas', 'description' => 'Strategi yang terstruktur untuk menavigasi lanskap digital yang kompleks.'],
                    ['icon' => 'dollar-sign', 'title' => 'Optimalisasi Investasi Teknologi', 'description' => 'Memastikan setiap investasi teknologi memberikan ROI yang terukur.'],
                    ['icon' => 'rocket', 'title' => 'Akselerasi Inovasi & Keunggulan Kompetitif', 'description' => 'Memanfaatkan teknologi untuk menciptakan produk dan layanan yang unggul.'],
                ],
                'is_featured' => false,
            ],
            [
                'title' => 'Layanan SEO Teknis & Performa Web',
                'short_description' => 'Tingkatkan visibilitas dan pengalaman pengguna website Anda melalui optimasi teknis SEO dan kecepatan.',
                'problem_statement' => '<p>Website yang lambat dan tidak terstruktur dengan baik akan sulit ditemukan di mesin pencari dan memberikan pengalaman buruk bagi pengunjung. Banyak aspek teknis SEO yang krusial seringkali terabaikan, menghambat potensi traffic organik dan konversi.</p>',
                'long_description' => '<p>Berbeda dari agensi digital marketing pada umumnya, kami fokus pada fondasi teknis yang membuat website Anda disukai oleh mesin pencari dan pengunjung. Tim spesialis SEO teknis kami melakukan audit mendalam, optimasi kecepatan Core Web Vitals, implementasi Structured Data (Schema Markup), perbaikan arsitektur situs, hingga analisis log server untuk memastikan website Anda tidak hanya cepat, tetapi juga mudah di-crawl dan dipahami oleh Google.</p>',
                'image' => 'seo.jpg',
                'icon' => 'magnifying-glass-chart',
                'key_features' => [
                    ['icon' => 'tachometer-alt-average', 'title' => 'Optimasi Kecepatan & Core Web Vitals', 'description' => 'Memastikan website memuat dengan cepat untuk UX dan peringkat yang lebih baik.'],
                    ['icon' => 'code', 'title' => 'Implementasi Structured Data (Schema.org)', 'description' => 'Membantu Google memahami konten Anda untuk rich snippets dan visibilitas lebih.'],
                    ['icon' => 'sitemap', 'title' => 'Audit & Optimalisasi Arsitektur Situs', 'description' => 'Struktur navigasi dan internal linking yang ramah SEO dan pengguna.'],
                    ['icon' => 'file-search', 'title' => 'Analisis Crawlability & Indexability', 'description' => 'Memastikan semua halaman penting Anda dapat diakses dan diindeks oleh mesin pencari.'],
                ],
                'client_benefits' => [
                    ['icon' => 'chart-bar', 'title' => 'Peningkatan Peringkat Organik Signifikan', 'description' => 'Visibilitas lebih tinggi di halaman hasil pencarian Google (SERP).'],
                    ['icon' => 'users', 'title' => 'Peningkatan Lalu Lintas Organik Berkualitas', 'description' => 'Menarik lebih banyak calon pelanggan yang relevan dengan bisnis Anda.'],
                    ['icon' => 'smile', 'title' => 'Pengalaman Pengguna Website Lebih Baik', 'description' => 'Website yang cepat dan mudah diakses meningkatkan kepuasan pengunjung.'],
                ],
                'is_featured' => false,
            ]
        ];

        foreach ($services as $service) {
            Service::create([
                'title' => $service['title'],
                'slug' => Str::slug($service['title']),
                'short_description' => $service['short_description'],
                'problem_statement' => $service['problem_statement'] ?? null,
                'long_description' => $service['long_description'],
                'image' => $service['image'],
                'icon' => $service['icon'],
                // Berikan array PHP langsung, biarkan Eloquent yang encode saat menyimpan
                'key_features' => $service['key_features'] ?? null,
                'client_benefits' => $service['client_benefits'] ?? null,
                'is_featured' => $service['is_featured'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}