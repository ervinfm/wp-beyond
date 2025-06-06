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
        Schema::create('technology_logos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nama teknologi, contoh: 'Laravel', 'ReactJS', 'VueJS'
            $table->string('logo_path'); // Path atau URL gambar logo
            $table->text('description')->nullable(); // Deskripsi singkat teknologi
            $table->string('website_url')->nullable(); // URL resmi teknologi
            $table->integer('display_order')->default(0); // Urutan tampilan, jika diperlukan
            $table->boolean('is_active')->default(true); // Status aktif/nonaktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('technology_logos');
    }
};
