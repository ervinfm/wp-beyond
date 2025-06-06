<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Investment;

class InvestmentController extends Controller
{
     public function index()
    {
        // Ambil semua data investasi, diurutkan dari yang paling baru.
        // Kita hanya ambil kolom yang perlu untuk halaman daftar agar lebih efisien.
        $investments = Investment::latest()->get([
            'id',
            'title',
            'slug',
            'category',
            'short_description',
            'target_amount',
            'current_amount',
            'cover_image',
            'status',
        ]);

        // Kirim data ke komponen Vue menggunakan Inertia
        return Inertia::render('Web/Investments/Index', [
            'investments' => $investments,
            'pageTitle' => 'Peluang Investasi' // Contoh properti tambahan
        ]);
    }

    /**
     * Menampilkan halaman detail untuk satu peluang investasi.
     * URL: /investasi/{slug}
     */
    public function show(Investment $investment)
    {
        // Berkat Route Model Binding Laravel, kita tidak perlu mencari data manual.
        // Laravel otomatis mengambil data Investment berdasarkan {slug} di URL.
        
        // Kirim data tunggal ke komponen Vue menggunakan Inertia
        return Inertia::render('Web/Investments/Show', [
            'investment' => $investment,
        ]);
    }
}
