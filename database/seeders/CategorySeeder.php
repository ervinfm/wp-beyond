<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Pastikan model Category di-impor
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate(); // Kosongkan tabel dulu

        $categories = [
            ['name' => 'Pengembangan Web'],
            ['name' => 'Aplikasi Mobile'],
            ['name' => 'Kecerdasan Buatan (AI)'],
            ['name' => 'Keamanan Siber'],
            ['name' => 'Infrastruktur Cloud & DevOps'],
            ['name' => 'Analitik Data'],
            ['name' => 'Berita Teknologi'],
            ['name' => 'Tutorial & Panduan'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
            ]);
        }
    }
}