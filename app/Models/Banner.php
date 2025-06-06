<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'identifier',
        'name',
        'display_type',
        'is_active',
        'notes',
        'valid_from',
        'valid_to',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'valid_from' => 'datetime',
        'valid_to' => 'datetime',
    ];

    /**
     * Mendapatkan semua item media untuk banner ini.
     */
    public function items(): HasMany
    {
        return $this->hasMany(BannerItem::class)->orderBy('display_order', 'asc');
    }

    /**
     * Mendapatkan hanya item media yang aktif.
     */
    public function activeItems(): HasMany
    {
        return $this->hasMany(BannerItem::class)
                    ->where('is_active', true)
                    ->orderBy('display_order', 'asc');
    }
}