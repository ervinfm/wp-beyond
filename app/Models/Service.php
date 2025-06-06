<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 
        'slug', 
        'short_description', 
        'problem_statement', // Pastikan ini ada
        'long_description', 
        'image', 
        'icon', 
        'key_features',    // Pastikan ini ada
        'client_benefits', // Pastikan ini ada
        'is_featured',
    ];
    
    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'key_features' => 'array',
            'client_benefits' => 'array',
        ];
    }
    

    /**
     * Relasi: Sebuah Service dibuat oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}


