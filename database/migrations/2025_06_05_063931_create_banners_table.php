<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->unique()->comment('Pengenal unik untuk banner, cth: homepage_hero, services_header, product_sidebar');
            $table->string('name')->comment('Nama deskriptif untuk banner, cth: Banner Utama Beranda, Header Halaman Layanan');
            $table->enum('display_type', ['single', 'carousel', 'video_background'])->default('single')
                  ->comment('Cara banner item ditampilkan: single (tampilkan item pertama aktif), carousel (slider), video_background (jika itemnya video)');
            $table->boolean('is_active')->default(true)->index()->comment('Status aktif banner secara keseluruhan');
            $table->text('notes')->nullable()->comment('Catatan internal untuk admin');
            $table->dateTime('valid_from')->nullable()->comment('Jadwalkan banner mulai tampil');
            $table->dateTime('valid_to')->nullable()->comment('Jadwalan banner berhenti tampil');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('banner_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banner_id')->constrained('banners')->onDelete('cascade'); // Relasi ke tabel banners
            $table->string('title')->nullable()->comment('Judul opsional untuk item banner, bisa untuk alt text gambar atau overlay');
            $table->text('caption')->nullable()->comment('Keterangan atau teks overlay opsional');
            $table->enum('media_type', ['image', 'video'])->default('image')->comment('Jenis media: gambar atau video');
            $table->string('media_path')->comment('Path ke file media (cth: banners/gambar.jpg) atau URL eksternal (cth: YouTube embed URL)');
            $table->string('link_url')->nullable()->comment('URL tujuan jika item banner diklik');
            $table->string('link_target', 20)->default('_self')->comment('Target link: _self, _blank, dll.');
            $table->integer('display_order')->default(0)->comment('Urutan tampil item dalam satu banner (untuk carousel)');
            $table->boolean('is_active')->default(true)->index()->comment('Status aktif untuk item banner individual');
            $table->json('video_settings')->nullable()->comment('Pengaturan khusus video: autoplay, loop, muted, controls. Cth: {"autoplay": true, "loop": true, "muted": true}');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_items');
        Schema::dropIfExists('banners');
    }
};
