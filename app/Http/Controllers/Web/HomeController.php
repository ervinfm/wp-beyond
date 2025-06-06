<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{
    Service, Product, Portfolio, Testimonial, Post, TechnologyLogo, 
};


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data untuk setiap section
        $featuredServices = Service::where('is_featured', true)->latest()->take(4)->get();
        $featuredProducts = Product::orderByDesc('is_featured')
                           ->get()                          
                           ->map(function ($product) {
                               // Bagian ini tetap sama
                               $imageFilename = $product->image ?: 'default-product-placeholder.png';

                               return [
                                   'id' => $product->id,
                                   'label' => $product->is_featured ? 'Produk Unggulan' : 'Produk Lainnya', // Label bisa dibuat dinamis
                                   'title' => $product->title,
                                   'subtitle' => $product->short_description,
                                   'buttonText' => $product->demo_url ? 'Coba Demo Gratis' : 'Lihat Detail Produk',
                                   'buttonUrl' => $product->demo_url ?: ($product->slug ? route('products.show', $product->slug) : '#'),
                                   'image_filename' => $imageFilename,
                               ];
                           });

        $featuredPortfolio = Portfolio::latest()->take(4)->get();
        $testimonials = Testimonial::latest()->get();
        $latestPosts = Post::latest()->take(3)->get();
        $techLogos = TechnologyLogo::all();

        return Inertia::render('Web/Home', [
            'featuredServices' => $featuredServices,
            'featuredProducts' => $featuredProducts,
            'featuredPortfolio' => $featuredPortfolio,
            'testimonials' => $testimonials,
            'techLogos' => $techLogos,
            'latestPosts' => $latestPosts,
        ]);
    }
}
