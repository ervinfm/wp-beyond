<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'banner_id',
        'title',
        'caption',
        'media_type',
        'media_path',
        'link_url',
        'link_target',
        'display_order',
        'is_active',
        'video_settings',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'video_settings' => 'array', // Otomatis encode/decode JSON
        'display_order' => 'integer',
    ];

    /**
     * Mendapatkan banner induk dari item ini.
     */
    public function banner(): BelongsTo
    {
        return $this->belongsTo(Banner::class);
    }
}