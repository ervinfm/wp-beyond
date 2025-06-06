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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Contoh: "Pendanaan Seri A"
            $table->string('slug')->unique(); // Untuk URL yang rapi
            $table->string('category'); // Contoh: "Teknologi", "Properti"
            $table->text('short_description'); // Deskripsi singkat untuk tampilan daftar
            $table->longText('full_content'); // Konten lengkap untuk halaman detail
            $table->decimal('target_amount', 15, 2); // Target dana
            $table->decimal('current_amount', 15, 2)->default(0); // Dana terkumpul
            $table->string('cover_image')->nullable(); // Path gambar utama
            $table->enum('status', ['open', 'closed', 'fully_funded'])->default('open'); // Status investasi
            $table->date('end_date'); // Batas akhir penggalangan dana
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
