<?php

namespace Database\Seeders;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengosongkan tabel dengan aman
        Report::truncate();

        $reportsData = [
            // Kategori: AI & Big Data
            [
                'title' => 'Tren Adopsi AI di Industri Keuangan Indonesia 2025',
                'category' => 'Kecerdasan Buatan', // <-- Data Baru
                'reading_time' => 18, // <-- Data Baru (dalam menit)
                'summary' => 'Laporan "Tren Adopsi AI di Industri Keuangan Indonesia 2025" menyajikan analisis komprehensif tentang bagaimana Kecerdasan Buatan (AI) akan mentransformasi sektor perbankan, asuransi, dan fintech di Indonesia. Dokumen ini menyoroti berbagai peluang signifikan yang dibawa AI, termasuk peningkatan efisiensi operasional melalui otomatisasi tugas rutin, pengambilan keputusan yang lebih cepat dan akurat berkat analisis data masif, serta personalisasi layanan pelanggan yang mendalam. Selain itu, AI juga membuka jalan bagi pengembangan produk inovatif dan mitigasi risiko yang lebih efektif, seperti pendeteksian fraud yang lebih canggih. Namun, laporan ini juga secara realistis membahas tantangan yang harus dihadapi, seperti kesiapan infrastruktur dan kualitas data yang masih perlu ditingkatkan, kekurangan talenta AI di pasar, serta perlunya kerangka regulasi dan etika yang jelas. Biaya implementasi awal yang tinggi, kesulitan integrasi dengan sistem lama, dan potensi resistensi karyawan juga merupakan hambatan nyata. Meskipun demikian, laporan memproyeksikan pertumbuhan adopsi AI yang signifikan hingga tahun 2025, didorong oleh kebutuhan akan daya saing dan tuntutan nasabah yang terus berkembang. Keberhasilan implementasi AI akan sangat bergantung pada kemampuan institusi keuangan untuk menavigasi tantangan ini secara strategis.',
                'published_at' => Carbon::create(2025, 5, 20),
                'is_active' => true,
            ],
            [
                'title' => 'Mengukur ROI: Dampak Analitik Big Data pada Efisiensi Operasional',
                'category' => 'AI & Big Data', // <-- Data Baru
                'reading_time' => 12, // <-- Data Baru
                'summary' => 'Laporan "Mengukur ROI: Dampak Analitik Big Data pada Efisiensi Operasional" adalah panduan penting bagi para pemimpin bisnis yang ingin membenarkan investasi mereka dalam teknologi. Dengan fokus pada kategori AI & Big Data dan waktu baca sekitar 12 menit, laporan ini menyajikan studi kasus dan kerangka kerja yang praktis untuk mengukur return on investment (ROI) dari inisiatif big data. Dalam realitanya, banyak perusahaan berinvestasi besar pada big data tanpa memiliki metodologi yang jelas untuk menilai dampaknya terhadap efisiensi operasional dan, pada akhirnya, profitabilitas. Laporan ini mengisi kekosongan tersebut dengan memberikan alat konkret untuk melacak, mengukur, dan mengartikulasikan nilai sebenarnya dari implementasi big data, membantu organisasi untuk tidak hanya mengadopsi teknologi tetapi juga memastikan bahwa investasi tersebut benar-benar memberikan hasil yang terukur.',
                'published_at' => Carbon::create(2025, 4, 11),
                'is_active' => true,
            ],
            [
                'title' => 'Era Baru Konten: Memanfaatkan Generative AI untuk Pemasaran Digital',
                'category' => 'Pemasaran Digital', // <-- Data Baru
                'reading_time' => 10, // <-- Data Baru
                'summary' => 'Laporan "Era Baru Konten: Memanfaatkan Generative AI untuk Pemasaran Digital" adalah panduan praktis yang relevan bagi para pemasar di era sekarang. Berada di kategori Pemasaran Digital dan membutuhkan waktu baca sekitar 10 menit, laporan ini mengupas tuntas cara menggunakan teknologi Generative AI untuk revolusi pembuatan konten, personalisasi kampanye, dan peningkatan keterlibatan pelanggan. Dalam konteks realita pemasaran digital yang semakin kompetitif, Generative AI hadir sebagai game-changer, memungkinkan pemasar untuk menghasilkan berbagai jenis konten, mulai dari teks hingga gambar dan video, dengan kecepatan dan skala yang belum pernah ada sebelumnya. Laporan ini memberikan strategi aplikatif tentang bagaimana memanfaatkan AI untuk personalisasi pesan pemasaran agar lebih relevan dengan audiens individual, serta bagaimana AI dapat menganalisis data untuk mengoptimalkan interaksi pelanggan dan menciptakan pengalaman yang lebih menarik. Ini bukan sekadar teori, melainkan peta jalan praktis bagi para profesional pemasaran untuk mengadopsi teknologi transformatif ini guna meraih keunggulan kompetitif.',
                'published_at' => Carbon::create(2025, 2, 5),
                'is_active' => true,
            ],

            // Kategori: Keamanan Siber
            [
                'title' => 'Lanskap Ancaman Siber 2025: Strategi Mitigasi untuk Korporasi',
                'category' => 'Keamanan Siber',
                'reading_time' => 20,
                'summary' => 'Laporan "Lanskap Ancaman Siber 2025: Strategi Mitigasi untuk Korporasi" merupakan analisis krusial yang menyoroti realitas ancaman keamanan siber yang terus berkembang. Dengan kategorinya sebagai Keamanan Siber dan waktu baca sekitar 20 menit, laporan ini mengupas tuntas tren serangan siber terkini yang dihadapi korporasi di tahun 2025, mulai dari phishing canggih yang semakin sulit dikenali hingga ransomware yang mampu melumpuhkan operasional. Dalam konteks realita bisnis saat ini di Indonesia, di mana digitalisasi semakin masif, risiko serangan siber menjadi semakin tinggi. Laporan ini tidak hanya memaparkan potensi kerugian finansial dan reputasi akibat serangan, tetapi juga menyajikan strategi pertahanan proaktif yang harus segera diadopsi perusahaan. Ini mencakup rekomendasi praktis mulai dari penguatan infrastruktur keamanan, pelatihan kesadaran siber bagi karyawan, penerapan otentikasi multifaktor, hingga pengembangan rencana respons insiden yang komprehensif, bertujuan untuk membekali korporasi agar dapat bertahan dan pulih dengan cepat dari berbagai jenis ancaman siber yang semakin kompleks.',
                'published_at' => Carbon::create(2025, 1, 15),
                'is_active' => true,
            ],
            [
                'title' => 'Arsitektur Zero Trust: Fondasi Keamanan di Era Cloud-Native',
                'category' => 'Keamanan Siber',
                'reading_time' => 15,
                'summary' => 'White paper "Arsitektur Zero Trust: Fondasi Keamanan di Era Cloud-Native" adalah dokumen esensial di tengah lanskap keamanan siber modern. Sebagai publikasi dalam kategori Keamanan Siber dengan waktu baca sekitar 15 menit, laporan ini menguraikan secara komprehensif prinsip-prinsip dasar arsitektur Zero Trust. Dalam realitanya, model keamanan tradisional yang mengasumsikan segala sesuatu di dalam jaringan adalah "aman" sudah tidak lagi relevan, terutama dengan semakin meluasnya adopsi cloud-native dan kerja jarak jauh di Indonesia. Konsep Zero Trust — "jangan pernah percaya, selalu verifikasi" — menjadi krusial. White paper ini tidak hanya menjelaskan filosofi di baliknya, tetapi juga memberikan peta jalan yang jelas untuk implementasinya dalam lingkungan kerja modern. Ini termasuk panduan praktis mengenai verifikasi identitas pengguna dan perangkat secara ketat, pemberian akses berdasarkan prinsip hak istimewa terkecil, dan pemantauan berkelanjutan, membantu organisasi membangun fondasi keamanan yang tangguh dan adaptif terhadap ancaman siber yang terus berevolusi.',
                'published_at' => Carbon::create(2024, 12, 10),
                'is_active' => true,
            ],
            [
                'title' => 'Menavigasi Regulasi PDP: Panduan Kepatuhan untuk Bisnis Digital',
                'category' => 'Regulasi & Kepatuhan',
                'reading_time' => 12,
                'summary' => 'Panduan "Menavigasi Regulasi PDP: Panduan Kepatuhan untuk Bisnis Digital" adalah sumber daya yang sangat relevan dan krusial bagi setiap perusahaan yang beroperasi di Indonesia saat ini. Berada di kategori Regulasi & Kepatuhan dengan waktu baca sekitar 12 menit, dokumen ini menyajikan panduan komprehensif yang dirancang untuk membantu bisnis digital memahami dan mematuhi regulasi Perlindungan Data Pribadi (PDP) yang berlaku di Indonesia. Dalam realitanya, dengan semakin ketatnya aturan mengenai privasi data, seperti Undang-Undang Perlindungan Data Pribadi, kepatuhan bukan lagi pilihan melainkan kewajiban mutlak. Pelanggaran PDP dapat berujung pada sanksi finansial yang berat dan kerusakan reputasi yang tidak dapat diperbaiki. Laporan ini secara praktis menguraikan berbagai aspek penting dari regulasi PDP, mulai dari hak-hak subjek data, kewajiban pengendali dan prosesor data, hingga mekanisme penanganan insiden data. Ini adalah peta jalan yang esensial bagi perusahaan untuk membangun kerangka kerja kepatuhan yang solid, memastikan bahwa mereka tidak hanya menghindari denda tetapi juga membangun kepercayaan dengan pelanggan di era digital',
                'published_at' => Carbon::create(2024, 10, 28),
                'is_active' => true,
            ],

            // Kategori: Cloud & Infrastruktur
            [
                'title' => 'Peta Jalan Migrasi ke Cloud: Dari Perencanaan hingga Optimalisasi',
                'category' => 'Cloud & Infrastruktur',
                'reading_time' => 18,
                'summary' => '"Peta Jalan Migrasi ke Cloud: Dari Perencanaan hingga Optimalisasi" adalah panduan penting bagi organisasi yang mempertimbangkan atau sedang dalam proses transisi ke lingkungan cloud. Dikategorikan dalam Cloud & Infrastruktur dengan waktu baca sekitar 18 menit, laporan ini menawarkan panduan langkah demi langkah yang komprehensif untuk merencanakan dan mengeksekusi migrasi infrastruktur ke cloud. Dalam realita bisnis saat ini di Indonesia, adopsi cloud bukan lagi tren, melainkan keharusan untuk mencapai skalabilitas, fleksibilitas, dan efisiensi biaya. Namun, proses migrasi seringkali kompleks dan berisiko. Laporan ini memberikan wawasan praktis tentang cara meminimalkan downtime dan memaksimalkan kinerja selama transisi, mencakup tahapan krusial mulai dari penilaian awal, pemilihan penyedia cloud yang tepat, strategi migrasi, hingga optimalisasi pasca-migrasi. Ini adalah sumber daya yang tak ternilai untuk memastikan migrasi cloud berjalan lancar dan berhasil mencapai tujuan bisnis yang diharapkan.',
                'published_at' => Carbon::create(2024, 9, 5),
                'is_active' => true,
            ],
            [
                'title' => 'FinOps: Mengelola Biaya Cloud Secara Efektif di Lingkungan Multi-Cloud',
                'category' => 'Cloud & Infrastruktur',
                'reading_time' => 10,
                'summary' => 'Laporan "FinOps: Mengelola Biaya Cloud Secara Efektif di Lingkungan Multi-Cloud" adalah bacaan penting di era dominasi cloud. Dengan kategori Cloud & Infrastruktur dan estimasi waktu baca 10 menit, laporan ini memperkenalkan praktik FinOps (Financial Operations). Dalam realitanya, banyak organisasi di Indonesia yang telah beralih ke cloud, seringkali mengalami kesulitan dalam mengelola biaya yang tidak terduga, terutama di lingkungan multi-cloud yang kompleks. Laporan ini menawarkan solusi dengan memberikan pendekatan terstruktur untuk mencapai visibilitas, kontrol, dan optimalisasi biaya cloud. Ini bukan hanya tentang alat teknologi, tetapi juga tentang perubahan budaya dan kolaborasi antara tim keuangan, operasional, dan teknis. Meskipun laporan ini diterbitkan pada Agustus 2024 dan mungkin tidak lagi menjadi publikasi terbaru di situs, prinsip-prinsip FinOps yang dibahas tetap sangat relevan dan krusial bagi setiap perusahaan yang ingin memaksimalkan nilai dari investasi cloud mereka tanpa membebani anggaran.',
                'published_at' => Carbon::create(2024, 8, 1),
                'is_active' => false,
            ],
            [
                'title' => 'Serverless vs. Kontainer: Memilih Arsitektur yang Tepat',
                'category' => 'Arsitektur Teknis',
                'reading_time' => 15,
                'summary' => 'Laporan "Serverless vs. Kontainer: Memilih Arsitektur yang Tepat" adalah panduan penting bagi para arsitek dan pengambil keputusan teknis. Berada dalam kategori Arsitektur Teknis dengan waktu baca sekitar 15 menit, laporan ini menyajikan analisis teknis mendalam yang membandingkan arsitektur serverless dengan arsitektur berbasis kontainer seperti Docker dan Kubernetes. Dalam realitanya, pilihan antara kedua pendekatan ini memiliki implikasi signifikan terhadap biaya, skalabilitas, dan kompleksitas pengembangan. Laporan ini mengupas berbagai kasus penggunaan yang cocok untuk masing-masing arsitektur, membantu organisasi menentukan pilihan yang paling tepat berdasarkan kebutuhan spesifik mereka. Ini tidak hanya membahas kelebihan dan kekurangan dari setiap model, tetapi juga memberikan wawasan praktis untuk menavigasi kompleksitas implementasi, memastikan bahwa keputusan arsitektur yang diambil dapat mendukung tujuan bisnis jangka panjang.',
                'published_at' => Carbon::create(2024, 7, 20),
                'is_active' => true,
            ],

            // Kategori: Transformasi Digital & Industri
            [
                'title' => 'Transformasi Digital Sektor Publik: Studi Kasus Smart City',
                'category' => 'Transformasi Digital',
                'reading_time' => 15,
                'summary' => 'Laporan "Transformasi Digital Sektor Publik: Studi Kasus Smart City" menawarkan gambaran nyata tentang bagaimana teknologi membentuk kembali pelayanan publik. Dengan durasi baca sekitar 15 menit dan termasuk dalam kategori Transformasi Digital, laporan ini menyelami implementasi Smart City yang berhasil di berbagai daerah. Dalam realitanya di Indonesia, konsep Smart City bukan lagi sekadar wacana, melainkan sebuah kebutuhan untuk meningkatkan efisiensi dan kualitas hidup perkotaan. Laporan ini secara spesifik menyoroti bagaimana penerapan teknologi canggih telah meningkatkan layanan publik dan keterlibatan warga, mulai dari pengelolaan lalu lintas yang lebih baik, sistem pengawasan keamanan, hingga platform partisipasi publik yang lebih interaktif. Ini adalah panduan praktis yang menunjukkan bahwa dengan perencanaan dan eksekusi yang tepat, transformasi digital mampu menciptakan kota yang lebih cerdas, responsif, dan berorientasi pada kebutuhan penduduknya.',
                'published_at' => Carbon::create(2024, 6, 18),
                'is_active' => true,
            ],
            [
                'title' => 'Interoperabilitas Data Kunci Ekosistem HealthTech Terintegrasi',
                'category' => 'HealthTech',
                'reading_time' => 12,
                'summary' => 'Laporan "Interoperabilitas Data Kunci Ekosistem HealthTech Terintegrasi" adalah analisis yang sangat relevan dan mendesak dalam konteks pengembangan HealthTech di Indonesia. Dengan estimasi waktu baca 12 menit, laporan ini secara spesifik membahas tantangan dan solusi untuk mencapai interoperabilitas data antar berbagai pemangku kepentingan dalam ekosistem kesehatan. Dalam realitanya, salah satu hambatan terbesar bagi kemajuan layanan kesehatan digital di Indonesia adalah fragmentasi data, di mana informasi pasien seringkali terisolasi di berbagai rumah sakit, klinik, dan aplikasi kesehatan. Laporan ini menggarisbawahi bagaimana interoperabilitas — kemampuan sistem untuk berbagi dan menggunakan data secara mulus — menjadi fondasi esensial untuk menciptakan ekosistem HealthTech yang benar-benar terintegrasi, yang pada gilirannya dapat meningkatkan kualitas layanan, efisiensi operasional, dan pengalaman pasien. Ini bukan sekadar diskusi teknis, melainkan peta jalan praktis untuk mengatasi salah satu masalah fundamental dalam digitalisasi sektor kesehatan Indonesia.',
                'published_at' => Carbon::create(2024, 5, 2),
                'is_active' => true,
            ],
            [
                'title' => 'Open Banking: Peluang & Tantangan bagi Bank Tradisional',
                'category' => 'FinTech',
                'reading_time' => 14,
                'summary' => 'Laporan "Open Banking: Peluang & Tantangan bagi Bank Tradisional" adalah analisis mendalam yang sangat relevan bagi industri keuangan di Indonesia. Termasuk dalam kategori FinTech dengan waktu baca sekitar 14 menit, laporan ini mengkaji secara komprehensif bagaimana inisiatif Open Banking akan mengubah lanskap perbankan. Dalam realitanya, Open Banking mendorong berbagi data finansial secara aman melalui API, memungkinkan pihak ketiga untuk menciptakan layanan inovatif. Bagi bank tradisional, ini adalah pisau bermata dua: sebuah peluang besar untuk berinovasi, mengembangkan produk baru, dan meningkatkan pengalaman pelanggan melalui kolaborasi dengan fintech. Namun, di sisi lain, ini juga tantangan signifikan yang menuntut mereka untuk beradaptasi dengan model bisnis yang lebih terbuka, meningkatkan keamanan data, dan menghadapi persaingan dari pemain non-bank. Laporan ini memberikan panduan praktis tentang bagaimana bank tradisional dapat beradaptasi dan berinovasi dalam era baru ini, memastikan mereka tetap relevan dan kompetitif di tengah gelombang transformasi digital.',
                'published_at' => Carbon::create(2024, 4, 10),
                'is_active' => true,
            ],
            
            // Kategori: Masa Depan Pekerjaan & Strategi
            [
                'title' => 'Membangun Budaya Kerja Hybrid yang Produktif dan Aman',
                'category' => 'Strategi Bisnis',
                'reading_time' => 10,
                'summary' => 'Panduan "Membangun Budaya Kerja Hybrid yang Produktif dan Aman" adalah sumber daya esensial bagi perusahaan yang beradaptasi dengan model kerja modern. Berada dalam kategori Strategi Bisnis dengan waktu baca sekitar 10 menit, laporan ini dirancang untuk para pemimpin HR dan IT yang ingin menciptakan lingkungan kerja hybrid yang tidak hanya produktif tetapi juga aman dari ancaman siber. Dalam realitanya di Indonesia, banyak organisasi kini mengadopsi model kerja hybrid, namun seringkali menghadapi tantangan dalam menjaga produktivitas tim yang tersebar dan mengamankan data di luar lingkungan kantor tradisional. Laporan ini memberikan strategi praktis untuk mengelola tantangan tersebut, termasuk membangun komunikasi yang efektif, menjaga keterlibatan karyawan, serta menerapkan kebijakan dan teknologi keamanan siber yang kuat. Ini adalah peta jalan yang realistis untuk memastikan bahwa model kerja hybrid dapat berjalan sukses dan berkelanjutan bagi perusahaan.',
                'published_at' => Carbon::create(2024, 3, 30),
                'is_active' => true,
            ],
            [
                'title' => 'Demokratisasi Pengembangan Aplikasi dengan Platform Low-Code',
                'category' => 'Inovasi Teknologi',
                'reading_time' => 8,
                'summary' => 'Laporan "Demokratisasi Pengembangan Aplikasi dengan Platform Low-Code" menyoroti salah satu inovasi paling transformatif di dunia teknologi saat ini. Berada dalam kategori Inovasi Teknologi dengan estimasi waktu baca 8 menit, laporan ini mengeksplorasi bagaimana platform low-code/no-code secara fundamental mengubah lanskap pengembangan aplikasi. Dalam realitanya, kebutuhan akan aplikasi kustom terus meningkat di setiap organisasi di Indonesia, namun ketersediaan developer terampil seringkali menjadi kendala. Platform low-code/no-code hadir sebagai solusi, memberdayakan tim non-teknis—seperti staf bisnis, marketing, atau operasional—untuk secara mandiri membangun aplikasi dan mengotomatisasi proses bisnis. Ini mempercepat siklus pengembangan, mengurangi ketergantungan pada tim IT, dan mendorong inovasi dari berbagai lini bisnis. Laporan ini menjabarkan bagaimana teknologi ini memungkinkan organisasi untuk lebih gesit dan responsif terhadap kebutuhan pasar yang berubah, sekaligus mengatasi gap talenta teknis.',
                'published_at' => Carbon::create(2024, 2, 14),
                'is_active' => true,
            ],
            [
                'title' => 'Teknologi sebagai Penggerak ESG: Laporan Keberlanjutan Digital',
                'category' => 'Strategi & ESG',
                'reading_time' => 12,
                'summary' => 'Laporan "Teknologi sebagai Penggerak ESG: Laporan Keberlanjutan Digital" menyoroti perpaduan krusial antara inovasi teknologi dan tanggung jawab korporasi. Berada dalam kategori Strategi & ESG dengan waktu baca sekitar 12 menit, dokumen ini menguraikan secara detail bagaimana solusi digital dapat membantu perusahaan mencapai target Environmental, Social, and Governance (ESG) mereka. Dalam realitanya, di Indonesia maupun global, tekanan dari investor, regulator, dan masyarakat untuk praktik bisnis yang berkelanjutan semakin meningkat. Laporan ini menunjukkan secara praktis bagaimana teknologi seperti AI, big data, dan IoT dapat digunakan untuk memantau konsumsi energi, mengelola rantai pasok yang etis, meningkatkan inklusi sosial, dan memastikan tata kelola perusahaan yang transparan. Meskipun diterbitkan pada Januari 2024 dan mungkin tidak lagi menjadi publikasi paling mutakhir, prinsip-prinsip yang dibahas tetap sangat relevan. Laporan ini adalah panduan strategis bagi perusahaan yang ingin tidak hanya memenuhi standar ESG, tetapi juga menjadikannya sebagai pendorong nilai bisnis dan reputasi.',
                'published_at' => Carbon::create(2024, 1, 5),
                'is_active' => false,
            ],
        ];

        foreach ($reportsData as $report) {
            $slug = Str::slug($report['title']);

            Report::create([
                'title' => $report['title'],
                'slug' => $slug,
                'category' => $report['category'],
                'author' => 'Tim Riset Beyond Digital',
                'summary' => $report['summary'],
                'cover_image' => "{$slug}.jpg",
                'file_path' => "reports/pdf/{$slug}.pdf",
                'reading_time' => $report['reading_time'],
                'published_at' => $report['published_at'],
                'is_active' => $report['is_active'],
            ]);
        }
    }
}