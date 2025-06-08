<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\{
    Product, ProductCategory,
};

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [
            [
                'title' => 'SwiftCRM',
                'short_description' => 'Platform CRM all-in-one berbasis AI untuk otomatisasi penjualan dan layanan pelanggan.',
                'long_description' => 'SwiftCRM adalah solusi Customer Relationship Management (CRM) revolusioner yang didukung oleh kecerdasan buatan. Ini mengotomatiskan proses penjualan, pemasaran, dan layanan pelanggan, membantu bisnis membangun hubungan yang lebih kuat dengan klien, meningkatkan konversi, dan mengoptimalkan operasional.',
                'image' => 'swiftcrm.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.swiftcrm.com',
                'price' => 899000.00,    // Sebelumnya $59.99, perkiraan Rp 899.000/bulan
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 2,
                'is_featured' => true,
            ],
            [
                'title' => 'QuantumShield',
                'short_description' => 'Solusi keamanan siber proaktif dengan deteksi ancaman real-time dan respons otomatis.',
                'long_description' => 'QuantumShield adalah sistem keamanan siber canggih yang melindungi aset digital Anda dari berbagai ancaman. Dengan teknologi AI dan pembelajaran mesin, ia mendeteksi anomali dan serangan siber secara real-time, memberikan respons otomatis untuk meminimalkan risiko dan kerugian.',
                'image' => 'quantumshield.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.quantumshield.com',
                'price' => 1499000.00,   // Sebelumnya $99.50, perkiraan Rp 1.499.000/bulan
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 6,
                'is_featured' => true,
            ],
            [
                'title' => 'OptiFlow ERP',
                'short_description' => 'Sistem ERP modular berbasis cloud untuk efisiensi operasional dan pengelolaan rantai pasok.',
                'long_description' => 'OptiFlow ERP adalah Enterprise Resource Planning (ERP) berbasis cloud yang membantu bisnis mengelola semua aspek operasional mereka. Dari keuangan, SDM, manufaktur, hingga rantai pasok, OptiFlow mengintegrasikan semuanya dalam satu platform yang mudah digunakan.',
                'image' => 'optiflow-erp.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.optiflow-erp.com',
                'price' => 3499000.00,  // Sebelumnya $199.00, perkiraan Rp 3.499.000/bulan (bisa lebih tinggi tergantung modul)
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 2,
                'is_featured' => true,
            ],
            [
                'title' => 'DevOps Dynamo',
                'short_description' => 'Platform otomatisasi CI/CD untuk pengembangan perangkat lunak yang lebih cepat dan andal.',
                'long_description' => 'DevOps Dynamo mempercepat siklus pengembangan perangkat lunak Anda dengan otomatisasi Continuous Integration (CI) dan Continuous Deployment (CD). Ini memastikan pengiriman kode yang lebih cepat, kualitas yang lebih tinggi, dan kolaborasi tim yang lebih baik.',
                'image' => 'devops-dynamo.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.devops-dynamo.com',
                'price' => 1099000.00,  // Sebelumnya $75.00, perkiraan Rp 1.099.000/bulan
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 1,
                'is_featured' => false,
            ],
            [
                'title' => 'Analyzify BI',
                'short_description' => 'Dashboard business intelligence interaktif dengan visualisasi data canggih dan insight prediktif.',
                'long_description' => 'Analyzify BI mengubah data mentah menjadi wawasan bisnis yang actionable. Dengan dashboard interaktif dan alat visualisasi canggih, Anda dapat membuat keputusan berdasarkan data dan memprediksi tren masa depan dengan lebih akurat.',
                'image' => 'analyzify-bi.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.analyzify-bi.com',
                'price' => 1749000.00,  // Sebelumnya $120.00, perkiraan Rp 1.749.000/bulan
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'EduSphere LMS',
                'short_description' => 'Sistem manajemen pembelajaran (LMS) intuitif untuk pendidikan online dan pelatihan korporat.',
                'long_description' => 'EduSphere LMS adalah platform yang sempurna untuk institusi pendidikan dan perusahaan yang ingin menyediakan pembelajaran online yang efektif. Dengan fitur kursus interaktif, pelacakan kemajuan, dan penilaian, EduSphere mendukung pengalaman belajar yang menarik.',
                'image' => 'edusphere-lms.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.edusphere-lms.com',
                'price' => 649000.00,   // Sebelumnya $45.00, perkiraan Rp 649.000/bulan
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 1,
                'is_featured' => false,
            ],
            [
                'title' => 'MediConnect HIS',
                'short_description' => 'Sistem informasi rumah sakit (HIS) terintegrasi untuk pengelolaan pasien, rekam medis, dan administrasi.',
                'long_description' => 'MediConnect HIS streamlines operasi rumah sakit dengan mengintegrasikan manajemen pasien, rekam medis elektronik, jadwal dokter, billing, dan administrasi dalam satu sistem terpadu. Ini meningkatkan efisiensi dan kualitas layanan kesehatan.',
                'image' => 'mediconnect-his.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.mediconnect-his.com',
                'price' => 4990000.00,  // Sebelumnya $250.00, perkiraan Rp 4.990.000/bulan (bisa jauh lebih tinggi)
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 4,
                'is_featured' => true,
            ],
            [
                'title' => 'AgriSmart IoT',
                'short_description' => 'Platform IoT untuk pertanian cerdas, memantau kondisi lahan dan mengoptimalkan hasil panen.',
                'long_description' => 'AgriSmart IoT membawa teknologi ke pertanian dengan sensor pintar yang memantau kelembaban tanah, suhu, dan nutrisi secara real-time. Data ini membantu petani membuat keputusan yang lebih baik untuk irigasi, pemupukan, dan pengelolaan hama, memaksimalkan hasil panen dan efisiensi.',
                'image' => 'agrismart-iot.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.agrismart-iot.com',
                'price' => 1275000.00,  // Sebelumnya $85.00, perkiraan Rp 1.275.000/bulan
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 5,
                'is_featured' => false,
            ],
            [
                'title' => 'RetailFlow POS',
                'short_description' => 'Solusi Point-of-Sale (POS) modern dengan fitur manajemen inventaris dan analitik penjualan.',
                'long_description' => 'RetailFlow POS adalah sistem Point-of-Sale yang intuitif dan kuat untuk bisnis ritel. Dilengkapi dengan manajemen inventaris yang cerdas, pelacakan penjualan, dan laporan analitik yang mendalam, ini membantu Anda mengelola toko Anda dengan mudah dan efektif.',
                'image' => 'retailflow-pos.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.retailflow-pos.com',
                'price' => 949000.00,   // Sebelumnya $65.00, perkiraan Rp 949.000/bulan
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'FinanciaLedger',
                'short_description' => 'Aplikasi akuntansi berbasis cloud yang aman dan mudah digunakan untuk bisnis kecil hingga menengah.',
                'long_description' => 'FinanciaLedger menyederhanakan pembukuan dan akuntansi untuk bisnis Anda. Kelola faktur, pengeluaran, pembayaran, dan laporan keuangan dengan mudah dari mana saja. Dengan fitur keamanan tingkat tinggi, data finansial Anda selalu terlindungi.',
                'image' => 'financialedger.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.financialedger.com',
                'price' => 449000.00,    // Sebelumnya $35.00, perkiraan Rp 449.000/bulan
                'pricing_type' => 'subscription',
                'subscription_interval' => 'monthly',
                'product_category_id' => 3,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'title' => $product['title'],
                'slug' => Str::slug($product['title']), // Membuat slug dari judul
                'short_description' => $product['short_description'],
                'long_description' => $product['long_description'],
                'image' => $product['image'],
                'demo_url' => $product['demo_url'],
                'price' => $product['price'],
                'pricing_type' => $product['pricing_type'],
                'subscription_interval' => $product['subscription_interval'],
                'is_featured' => $product['is_featured'],
                'product_category_id' => $product['product_category_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $oneTimePurchaseProducts = [
            [
                'title' => 'Proxima Code Editor - Lisensi Profesional',
                'slug' => 'proxima-code-editor-pro', // Dibuat dari title
                'short_description' => 'Editor kode canggih dengan fitur lengkap untuk developer profesional. Beli sekali, pakai selamanya.',
                'long_description' => '<p>Proxima Code Editor adalah lingkungan pengembangan terintegrasi (IDE) ringan namun kuat, dirancang untuk efisiensi dan kenyamanan coding. Dengan lisensi profesional ini, Anda mendapatkan akses seumur hidup ke semua fitur premium, termasuk debugging tingkat lanjut, integrasi Git yang mulus, kustomisasi tema tanpa batas, dan dukungan prioritas. Tidak ada biaya langganan bulanan atau tahunan.</p><h3>Fitur Utama:</h3><ul><li>IntelliSense & auto-completion cerdas</li><li>Debugger terintegrasi untuk berbagai bahasa</li><li>Manajemen proyek & workspace</li><li>Ekstensi & plugin marketplace</li><li>Update gratis untuk versi minor</li></ul>',
                'image' => 'proxima-editor.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.proximaeditor.com/pro', // Bisa link ke halaman fitur atau video demo
                'price' => 1250000.00,    // Contoh harga sekali beli
                'pricing_type' => 'one_time_purchase',
                'subscription_interval' => null, // Tidak ada interval untuk sekali beli
                'product_category_id' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'Atlas UI Kit Pro - Paket Komponen Desain Web & Mobile',
                'slug' => 'atlas-ui-kit-pro',
                'short_description' => 'Percepat alur kerja desain Anda dengan ribuan komponen UI siap pakai untuk Figma, Sketch, dan Adobe XD.',
                'long_description' => '<p>Atlas UI Kit Pro adalah koleksi lengkap komponen antarmuka pengguna (UI) berkualitas tinggi yang dirancang untuk membantu desainer dan developer membangun aplikasi web dan mobile yang menawan dengan lebih cepat. Paket ini mencakup berbagai macam elemen, mulai dari tombol, form, navigasi, hingga template halaman penuh yang responsif dan mudah dikustomisasi. Beli sekali dan dapatkan akses ke semua update minor kit ini.</p><h3>Yang Anda Dapatkan:</h3><ul><li>1000+ Komponen UI Kustom</li><li>50+ Template Halaman Siap Pakai</li><li>Dukungan untuk Figma, Sketch, & Adobe XD</li><li>Versi Terang & Gelap (Light & Dark Mode)</li><li>Dokumentasi Lengkap</li></ul>',
                'image' => 'atlas-ui-kit.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => 'https://demo.atlasuikit.com', // Bisa link ke preview kit
                'price' => 799000.00,     // Contoh harga sekali beli
                'pricing_type' => 'one_time_purchase',
                'subscription_interval' => null,
                'product_category_id' => 1,
                'is_featured' => true,
            ],
            [
                'title' => 'CyberGuard Security Suite - Lisensi Personal Seumur Hidup',
                'slug' => 'cyberguard-security-suite-personal',
                'short_description' => 'Solusi keamanan komprehensif untuk melindungi PC atau Mac Anda dari virus, malware, dan ancaman online lainnya.',
                'long_description' => '<p>Lindungi kehidupan digital Anda dengan CyberGuard Security Suite. Paket keamanan ini menawarkan perlindungan real-time terhadap berbagai ancaman siber, termasuk virus, ransomware, spyware, dan phishing. Dengan lisensi personal seumur hidup, Anda mendapatkan proteksi berkelanjutan tanpa perlu khawatir tentang perpanjangan tahunan. Termasuk firewall canggih, proteksi web, dan pembaruan basis data ancaman (definisi virus) selama 5 tahun.</p><h3>Fitur Proteksi:</h3><ul><li>Anti-Virus & Anti-Malware Real-time</li><li>Firewall Cerdas Dua Arah</li><li>Proteksi Anti-Phishing & Keamanan Web</li><li>Mode Gaming (Tidak Mengganggu)</li><li>Pembaruan Definisi Ancaman Otomatis (selama 5 tahun)</li></ul>',
                'image' => 'cyberguard-suite.jpg', // Ganti dengan path gambar yang sesuai
                'demo_url' => null, // Mungkin tidak ada demo interaktif, bisa link ke halaman fitur
                'price' => 550000.00,      // Contoh harga sekali beli
                'pricing_type' => 'one_time_purchase',
                'subscription_interval' => null,
                'product_category_id' => 6,
                'is_featured' => false,
            ],
        ];

        foreach ($oneTimePurchaseProducts as $oneTimePurchaseProduct) {
            DB::table('products')->insert([
                'title' => $oneTimePurchaseProduct['title'],
                'slug' => Str::slug($oneTimePurchaseProduct['title']), // Membuat slug dari judul
                'short_description' => $oneTimePurchaseProduct['short_description'],
                'long_description' => $oneTimePurchaseProduct['long_description'],
                'image' => $oneTimePurchaseProduct['image'],
                'demo_url' => $oneTimePurchaseProduct['demo_url'],
                'price' => $oneTimePurchaseProduct['price'],
                'pricing_type' => $oneTimePurchaseProduct['pricing_type'],
                'subscription_interval' => $oneTimePurchaseProduct['subscription_interval'],
                'is_featured' => $oneTimePurchaseProduct['is_featured'],
                'product_category_id' => $oneTimePurchaseProduct['product_category_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}