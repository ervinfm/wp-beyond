<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeveloperResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Hapus data lama untuk menghindari duplikasi saat seeding ulang
        DB::table('developer_resources')->truncate();

        $resources = [
            // Kategori: Getting Started
            [
                'title' => 'Selamat Datang di API Kami',
                'category' => 'Getting Started',
                'content' => "## Selamat Datang!\n\nIni adalah panduan lengkap untuk menggunakan API kami. Dokumentasi ini akan memandu Anda melalui proses otentikasi, memberikan referensi endpoint, dan menjelaskan praktik terbaik.\n\nJika Anda memiliki pertanyaan, jangan ragu untuk menghubungi tim support kami.",
                'order_column' => 1,
            ],
            [
                'title' => 'Panduan Instalasi Awal',
                'category' => 'Getting Started',
                'content' => "## Instalasi\n\nUntuk memulai, Anda perlu mendapatkan **API Key** dari dashboard Anda. Semua permintaan ke API harus menyertakan header otentikasi.\n\nContoh penggunaan dengan cURL:\n```bash\ncurl -X GET '[https://api.example.com/v1/ping](https://api.example.com/v1/ping)' \\\n     -H 'Authorization: Bearer YOUR_API_KEY'\n```",
                'order_column' => 2,
            ],
            // Kategori: Authentication
            [
                'title' => 'Otentikasi Menggunakan API Key',
                'category' => 'Authentication',
                'content' => "## Otentikasi API Key\n\nAPI kami menggunakan **Bearer Token Authentication**. Anda harus menyertakan API Key Anda dalam header `Authorization` pada setiap permintaan.\n\n- **Header**: `Authorization`\n- **Value**: `Bearer [API_KEY_ANDA]`\n\nPastikan untuk menjaga kerahasiaan API Key Anda.",
                'order_column' => 1,
            ],
            [
                'title' => 'Penanganan Error Otentikasi',
                'category' => 'Authentication',
                'content' => "## Kode Error Otentikasi\n\nJika otentikasi gagal, Anda akan menerima respons dengan kode status HTTP berikut:\n\n| Kode Status | Deskripsi |\n| :--- | :--- |\n| `401 Unauthorized` | API Key tidak valid atau tidak disertakan. |\n| `403 Forbidden` | API Key valid, tetapi tidak memiliki izin untuk mengakses resource ini. |",
                'order_column' => 2,
            ],
            // Kategori: API Reference
            [
                'title' => 'GET /api/v1/products',
                'category' => 'API Reference',
                'content' => "### Mengambil Daftar Produk\n\nEndpoint ini digunakan untuk mengambil daftar semua produk yang tersedia. Endpoint ini mendukung paginasi.\n\n**Query Parameters:**\n- `page` (integer, opsional): Nomor halaman yang ingin ditampilkan.\n- `limit` (integer, opsional): Jumlah item per halaman. Default: 15.",
                'order_column' => 1,
            ],
            [
                'title' => 'GET /api/v1/products/{id}',
                'category' => 'API Reference',
                'content' => "### Mengambil Detail Produk\n\nEndpoint untuk mengambil detail satu produk berdasarkan ID uniknya.\n\n**Contoh Respons Sukses (200 OK):**\n```json\n{\n  \"id\": 101,\n  \"name\": \"Laptop Pro 15\",\n  \"price\": 25000000,\n  \"stock\": 50\n}\n```",
                'order_column' => 2,
            ],
            [
                'title' => 'POST /api/v1/orders',
                'category' => 'API Reference',
                'content' => "### Membuat Pesanan Baru\n\nEndpoint untuk membuat pesanan baru.\n\n**Body Request (JSON):**\n```json\n{\n  \"product_id\": 101,\n  \"quantity\": 2,\n  \"customer_name\": \"Budi Santoso\"\n}\n```",
                'order_column' => 3,
            ],
             // Kategori: Best Practices
            [
                'title' => 'Rate Limiting',
                'category' => 'Best Practices',
                'content' => "## Batasan Penggunaan (Rate Limiting)\n\nUntuk memastikan stabilitas layanan bagi semua pengguna, kami memberlakukan batasan penggunaan (rate limit).\n\n- **Batas**: 1000 permintaan per jam per API Key.\n\nJika Anda melebihi batas ini, Anda akan menerima respons dengan kode status `429 Too Many Requests`.",
                'order_column' => 1,
            ],
        ];

        $dataToInsert = [];
        foreach ($resources as $resource) {
            $dataToInsert[] = [
                'title' => $resource['title'],
                'slug' => Str::slug($resource['title']),
                'category' => $resource['category'],
                'content' => $resource['content'],
                'order_column' => $resource['order_column'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('developer_resources')->insert($dataToInsert);
    }
}