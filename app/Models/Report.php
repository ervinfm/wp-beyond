<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Report extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'author',
        'summary',
        'cover_image',
        'file_path',
        'published_at',
        'is_active',
    ];

    /**
     * Atribut yang harus di-casting ke tipe data tertentu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Boot the model.
     * Otomatis membuat slug saat data dibuat atau diubah.
     */
    protected static function booted(): void
    {
        static::creating(function (Report $report) {
            $report->slug = Str::slug($report->title);
        });

        static::updating(function (Report $report) {
            $report->slug = Str::slug($report->title);
        });
    }
}