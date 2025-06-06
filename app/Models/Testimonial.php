<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_name',
        'company_name',
        'position',
        'content',
        'avatar_path',
        'rating', // Rating bintang 1-5
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
        ];
    }
}
