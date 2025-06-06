<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GlossaryTerm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'term',
        'slug',
        'definition',
    ];

    /**
     * Boot the model.
     * Secara otomatis membuat slug saat term baru dibuat atau diubah.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($term) {
            $term->slug = Str::slug($term->term);
        });

        static::updating(function ($term) {
            $term->slug = Str::slug($term->term);
        });
    }
}