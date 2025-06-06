<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'location',
        'type', // cth: 'Full-time', 'Part-time', 'Internship'
        'description',
        'requirements',
        'deadline',
        'is_active',
        'user_id',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_active' => 'boolean', // Otomatis konversi 1/0 ke true/false
        'responsibilities' => 'array',
        'qualifications'   => 'array',
        'closing_date' => 'date', // Anda punya 'deadline' dan 'closing_date', pastikan keduanya memang kolom yang berbeda
    ];

    /**
     * Relasi: Lowongan ini dipublikasikan oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
