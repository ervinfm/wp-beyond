<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'location', 'type']);

        // Query dasar untuk lowongan yang aktif
        $baseQuery = JobVacancy::query()->where('is_active', true);

        // --- MODIFIKASI DIMULAI DI SINI ---

        // 1. Ambil semua lokasi unik dari lowongan yang aktif
        $availableLocations = JobVacancy::query()
            ->where('is_active', true)
            ->distinct()
            ->orderBy('location', 'asc')
            ->pluck('location');

        // 2. Ambil semua jenis pekerjaan unik dari lowongan yang aktif
        $availableTypes = JobVacancy::query()
            ->where('is_active', true)
            ->distinct()
            ->orderBy('type', 'asc')
            ->pluck('type');

        // 3. Ambil semua judul pekerjaan untuk rekomendasi pencarian
        $jobTitlesForRecommendation = JobVacancy::query()
            ->where('is_active', true)
            ->distinct()
            ->orderBy('title', 'asc')
            ->pluck('title');

        // --- MODIFIKASI SELESAI ---

        $jobVacancies = (clone $baseQuery) // Clone query dasar agar tidak terpengaruh
            ->when($request->input('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->where('is_active', true);
            })
            ->when($request->input('location'), function ($query, $location) {
                $query->where('location', $location);
            })
            ->when($request->input('type'), function ($query, $type) {
                $query->where('type', $type);
            })
            ->orderByDesc('created_at')
            ->paginate(6)
            ->withQueryString()
            ->through(fn ($job) => [
                'id' => $job->id,
                'title' => $job->title,
                'slug' => $job->slug,
                'location' => $job->location,
                'type' => $job->type,
                'short_description' => $job->short_description ?: Str::limit(strip_tags($job->description), 150),
                'closing_date_formatted' => $job->closing_date ? Carbon::parse($job->closing_date)->translatedFormat('j M Y') : null,
            ]);

        return Inertia::render('Web/Career/Index', [
            'jobVacancies' => $jobVacancies,
            'filters' => $filters,
            'availableLocations' => $availableLocations, // Kirim data lokasi ke Vue
            'availableTypes' => $availableTypes,       // Kirim data jenis ke Vue
            'jobTitlesForRecommendation' => $jobTitlesForRecommendation, // Kirim data judul ke Vue
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        // Ambil data lowongan berdasarkan slug, pastikan aktif, atau tampilkan 404 jika tidak ada
        $jobVacancy = JobVacancy::where('slug', $slug)
                                ->where('is_active', true)
                                ->firstOrFail();

        // Format data yang akan dikirim ke Vue
        $jobData = [
            'title' => $jobVacancy->title,
            'slug' => $jobVacancy->slug,
            'location' => $jobVacancy->location,
            'type' => $jobVacancy->type,
            'description' => $jobVacancy->description,
            // Data JSON sudah otomatis menjadi array berkat casting di model
            'responsibilities' => $jobVacancy->responsibilities,
            'qualifications' => $jobVacancy->qualifications,
            'closing_date_formatted' => $jobVacancy->closing_date ? $jobVacancy->closing_date->translatedFormat('l, j F Y') : 'Tidak ditentukan',
            // URL untuk tombol "Lamar" (bisa diubah ke link form eksternal jika ada)
            'apply_url' => 'mailto:hrd@perusahaananda.com?subject=Lamaran untuk posisi ' . urlencode($jobVacancy->title),
        ];

        return Inertia::render('Web/Career/Show', [
            'job' => $jobData,
        ]);
    }
}