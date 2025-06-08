<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'author', 'summary', 'cover_image', 'file_path', 
        'published_at', 'is_active', 'category', 'reading_time'
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Accessor untuk atribut cover_image.
     * Secara otomatis mengubah path yang tersimpan di database menjadi URL lengkap.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
}