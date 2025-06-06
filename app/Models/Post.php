<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image', // DISESUAIKAN: dari 'cover_image' menjadi 'image' agar cocok dengan migrasi
        'published_at',
        'category_id',
        'user_id',
        'status',      // Tambahkan status agar bisa di-update
        'is_featured', // Tambahkan is_featured agar bisa di-update
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean', // Tambahkan cast untuk is_featured
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}