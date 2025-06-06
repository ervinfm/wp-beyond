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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Untuk URL yang SEO-friendly (cth: /services/web-development)
            $table->string('short_description', 255); // Untuk tampilan di kartu/card
            $table->longText('long_description'); // Untuk halaman detail layanan
            $table->string('image')->nullable(); // Path ke gambar utama layanan
            $table->string('icon')->nullable(); // Bisa untuk nama class ikon (cth: 'fa-solid fa-code')
            $table->json('key_features')->nullable();
            $table->json('client_benefits')->nullable();
            $table->text('problem_statement')->nullable();
            $table->boolean('is_featured')->default(false)->index(); // Untuk menampilkan di Home Page
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
