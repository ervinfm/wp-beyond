<?php

use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

if (!function_exists('getFeaturedFooterNav')) {
    /**
     * Mengambil dan memformat data navigasi footer yang di-featured.
     * Hasilnya di-cache selama 1 jam untuk efisiensi.
     *
     * @return array
     */
    function getFeaturedFooterNav(): array
    {
        // Cache akan menyimpan hasil query selama 60 menit.
        // Jika data di-update, cache akan otomatis diperbarui setelah 60 menit,
        // atau Anda bisa membersihkan cache secara manual.
        return Cache::remember('featured_footer_nav', 60, function () {
            // Ambil 3 layanan yang di-featured
            $featuredServices = Service::where('is_featured', true)
                ->latest()
                ->take(3)
                ->get(['title', 'slug']);

            // Ambil 3 produk yang di-featured
            $featuredProducts = Product::where('is_featured', true)
                ->latest()
                ->take(4)
                ->get(['title', 'slug']);

            // Format data layanan sesuai kebutuhan frontend
            $servicesLinks = $featuredServices->map(function ($service) {
                return ['name' => $service->title, 'href' => '/services/' . $service->slug];
            })->toArray();

            // Format data produk sesuai kebutuhan frontend
            $productsLinks = $featuredProducts->map(function ($product) {
                return ['name' => $product->title, 'href' => '/products/' . $product->slug];
            })->toArray();

            // Tambahkan link "Lihat Semua" di akhir
            $servicesLinks[] = ['name' => 'Lihat Semua Layanan', 'href' => '/services'];
            $productsLinks[] = ['name' => 'Lihat Semua Produk', 'href' => '/products'];

            return [
                [
                    'title' => 'Layanan Kami',
                    'links' => $servicesLinks,
                ],
                [
                    'title' => 'Produk Unggulan', // Judul bisa disesuaikan
                    'links' => $productsLinks,
                ],
            ];
        });
    }
}