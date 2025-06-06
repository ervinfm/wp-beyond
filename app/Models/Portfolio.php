<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

      protected $fillable = [
        'project_name',
        'slug',
        'client_name',
        'description',
        'project_url',
        'cover_image',
        'project_date',
        'service_id', // Opsional: Portfolio ini hasil dari service apa?
        'user_id',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'project_date' => 'date:Y-m-d', // Casting ke objek Carbon, format saat serialisasi
        'images' => 'array',          // Otomatis encode/decode JSON
        'is_featured' => 'boolean',   // Jika Anda menambahkan field is_featured nanti
    ];

     /**
     * Secara otomatis menambahkan accessor ke output array/JSON model.
     */
    protected $appends = ['cover_image_url'];

    /**
     * Relasi: Portfolio ini dibuat oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Relasi ke model Service.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

     /**
     * Accessor untuk mendapatkan URL lengkap gambar cover.
     * Sesuaikan path 'portfolios/covers/' jika berbeda.
     */
    public function getCoverImageUrlAttribute(): ?string
    {
        if ($this->cover_image) {
            // 1. Cek apakah nilai $this->cover_image sudah merupakan URL absolut
            if (Str::startsWith($this->cover_image, ['http://', 'https://'])) {
                return $this->cover_image; // Langsung kembalikan jika sudah URL
            }

            // 2. Jika bukan URL absolut, maka ini adalah nama file atau path relatif.
            // Asumsi $this->cover_image HANYA berisi nama file (misal: 'proyek-saya.jpg')
            // dan folder base Anda adalah 'public/Images/Portfolio/'
            $pathInPublicFolder = 'Images/Portfolio/' . $this->cover_image;
            return asset($pathInPublicFolder);

            // ALTERNATIF:
            // Jika $this->cover_image SUDAH berisi 'Images/Portfolio/proyek-saya.jpg'
            // maka Anda cukup menggunakan:
            // return asset($this->cover_image);
        }

        // 3. Opsional: Kembalikan path ke gambar placeholder default jika $this->cover_image kosong
        // return asset('images/defaults/portfolio_placeholder.jpg'); // Ganti dengan path placeholder Anda
        return null;
    }
}
