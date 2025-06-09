<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    public const UPDATED_AT = null;
    const CREATED_AT = 'visit_timestamp';

    protected $fillable = [
        'ip_address',
        'user_agent',
        'referer_url',
        'landing_page', // <-- Tambahan
        'utm_source',   // <-- Tambahan
        'utm_medium',   // <-- Tambahan
        'utm_campaign', // <-- Tambahan
        'location_city',// <-- Tambahan
        'location_country',// <-- Tambahan
        'device_type',  // <-- Tambahan
    ];
}