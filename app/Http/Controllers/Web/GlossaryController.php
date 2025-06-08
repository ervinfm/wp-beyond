<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\GlossaryTerm;
use Illuminate\Support\Facades\Cache; // <-- 1. Jangan lupa import Cache
use Inertia\Inertia;

class GlossaryController extends Controller
{
    public function index()
    {
        // Definisikan kunci cache yang unik dan durasi cache (misal: 24 jam)
        $cacheKey = 'glossary.terms.grouped';
        $cacheDuration = 60 * 24; // dalam menit

        // Gunakan Cache::remember untuk menyimpan hasil query
        $groupedTerms = Cache::remember($cacheKey, $cacheDuration, function () {
            // Jika data tidak ada di cache, query ini akan dijalankan
            return GlossaryTerm::orderBy('term', 'asc')
                ->get(['id', 'term', 'definition']) // <-- 2. Hanya ambil kolom yang dibutuhkan
                ->groupBy(fn($item) => strtoupper(substr($item->term, 0, 1)));
        });

        return Inertia::render('Web/Glossary/Index', ['groupedTerms' => $groupedTerms]);
    }
}