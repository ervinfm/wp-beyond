<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Inertia\Inertia;

class ReportController extends Controller
{
    public function index()
    {
        // Ambil 1 laporan terbaru sebagai unggulan
        $featuredReport = Report::where('is_active', true)->latest('published_at')->first();

        // Ambil laporan lainnya (selain yang unggulan) dengan paginasi
        $otherReports = Report::where('is_active', true)
            ->when($featuredReport, function ($query) use ($featuredReport) {
                $query->where('id', '!=', $featuredReport->id);
            })
            ->latest('published_at')
            ->paginate(6);

        return Inertia::render('Web/Reports/Index', [
            'featuredReport' => $featuredReport,
            'otherReports' => $otherReports,
        ]);
    }

    public function show(Report $report)
    {
        // Eager load relasi jika ada (saat ini tidak ada, tapi ini praktik yang baik)
        // $report->load('nama_relasi');

        // Ambil 3 laporan lain yang terbaru (selain yang sedang dibuka) untuk rekomendasi
        $otherReports = Report::where('is_active', true)
            ->where('id', '!=', $report->id) // Kecualikan laporan saat ini
            ->latest('published_at')
            ->take(3)
            ->get();

        return Inertia::render('Web/Reports/Show', [
            'report' => $report,
            'otherReports' => $otherReports,
        ]);
    }

     public function handleDownload(Request $request, Report $report)
    {
        // 1. Validasi input dari form (pastikan email diisi dengan benar)
        $request->validate([
            'email' => 'required|email:rfc,dns',
        ]);

        // 2. (Opsional) Logika Bisnis: Simpan email sebagai prospek/lead
        // Anda bisa menyimpan email ini ke tabel 'leads' atau mengirimkannya
        // ke layanan email marketing seperti Mailchimp.
        // Lead::create(['email' => $request->email, 'interest' => 'Report: ' . $report->title]);

        // 3. Logika untuk mengunduh file
        $filePath = $report->file_path; // Cth: 'reports/pdf/nama-laporan.pdf'

        // Periksa apakah file benar-benar ada di storage
        if (Storage::disk('public')->exists($filePath)) {
            // Buat nama file yang akan dilihat oleh pengguna saat mengunduh
            $downloadName = $report->slug . '.pdf';

            // Kembalikan response download
            return Storage::disk('public')->download($filePath, $downloadName);
        }

        // Jika file tidak ditemukan, kembalikan ke halaman sebelumnya dengan pesan error
        return back()->with('error', 'Maaf, file laporan tidak dapat ditemukan. Silakan hubungi administrator.');
    }
}
