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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->nullable()->constrained('product_categories')->onDelete('set null');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description', 255);
            $table->longText('long_description');
            $table->string('image')->nullable(); // Gambar utama produk
            $table->string('demo_url')->nullable(); // Link ke halaman demo produk
            $table->decimal('price', 15, 2)->nullable(); // Harga produk, presisi untuk uang
            $table->string('pricing_type')->default('subscription'); // Contoh: 'subscription', 'one_time_purchase'
            $table->string('subscription_interval')->nullable(); 
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
        Schema::dropIfExists('products');
    }
};
