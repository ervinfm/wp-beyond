<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Portfolio; // Pastikan model Portfolio di-import
use Illuminate\Support\Str; // Untuk Str::limit

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with('service') // Eager load relasi service
            ->orderBy('project_date', 'desc')    // Urutkan berdasarkan tanggal proyek terbaru
            ->paginate(6)                        // Misalnya 9 item per halaman
            ->through(fn ($portfolio) => [
                'id' => $portfolio->id,
                'title' => $portfolio->title,
                'slug' => $portfolio->slug,
                // Ambil deskripsi singkat dari description atau buat field baru jika ada
                'short_description' => Str::limit(strip_tags($portfolio->description), 100), // Ambil 100 karakter & hapus tag HTML
                'client_name' => $portfolio->client_name,
                'project_date_formatted' => $portfolio->project_date ? $portfolio->project_date->isoFormat('D MMMM YYYY') : null, // Format tanggal
                'project_url' => $portfolio->project_url,
                'cover_image_url' => $portfolio->cover_image_url, // Menggunakan accessor dari model
                'service_name' => $portfolio->service ? $portfolio->service->title : null, // Nama layanan jika ada
            ]);

        return Inertia::render('Web/Portfolio/Index', [
            'portfolios' => $portfolios, // Ganti nama prop menjadi 'portfolios'
        ]);
    }

    /**
     * Display the specified resource.
     * Anda perlu membuat route untuk ini di web.php:
     * Route::get('/portfolio/{portfolio:slug}', [PortfolioController::class, 'show'])->name('portfolios.show');
     */
     public function show(Portfolio $portfolio) // Menggunakan Route Model Binding
    {
        // Eager load relasi jika perlu
        $portfolio->load('service');

        return Inertia::render('Web/Portfolio/Show', [
            'portfolio' => [
                'id' => $portfolio->id,
                'title' => $portfolio->title,
                'slug' => $portfolio->slug,
                'description' => $portfolio->description,
                'client_name' => $portfolio->client_name,
                'project_date_formatted' => $portfolio->project_date ? $portfolio->project_date->isoFormat('D MMMM YYYY') : null,
                'project_url' => $portfolio->project_url,
                'cover_image_url' => $portfolio->cover_image_url, // Dari accessor
                'service_name' => $portfolio->service ? $portfolio->service->title : null,
                'service_slug' => $portfolio->service ? $portfolio->service->slug : null,

                // --- BAGIAN YANG DIPERBAIKI ---
                // Ubah setiap nama file di dalam array menjadi URL lengkap.
                'gallery_images' => $portfolio->images ? collect($portfolio->images)->map(function ($filename) {
                    // $filename adalah nama file, misal: 'proyek-a-1.jpg'
                    // Kita bangun path lengkapnya di sini sesuai struktur folder Anda.
                    return asset('images/portfolio/galery/' . $filename);
                })->all() : [], // Hasilnya akan menjadi array URL lengkap
            ],
        ]);
    }
}