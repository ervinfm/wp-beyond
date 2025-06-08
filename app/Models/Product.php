<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'tagline',
        'description',
        'logo_path',
        'demo_url',
        'price',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2', // Konversi harga ke format desimal untuk akurasi
        ];
    }

    /**
     * Relasi: Sebuah Product ditambahkan oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
