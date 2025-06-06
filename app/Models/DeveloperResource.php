<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DeveloperResource extends Model
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
        'category',
        'content',
        'order_column',
    ];

    /**
     * Boot the model.
     * Secara otomatis membuat slug saat resource baru dibuat.
     */
    protected static function booted(): void
    {
        static::creating(function (DeveloperResource $resource) {
            $resource->slug = Str::slug($resource->title);
        });

        static::updating(function (DeveloperResource $resource) {
            $resource->slug = Str::slug($resource->title);
        });
    }
}