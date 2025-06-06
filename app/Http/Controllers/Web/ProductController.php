<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Pastikan model Product di-import
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua produk, atau yang terbaru lebih dulu jika diinginkan
        $products = Product::orderBy('created_at', 'desc')->paginate(8);

        return Inertia::render('Web/Products/Index', [
            'products' => $products, // $products sekarang adalah objek Paginator
        ]);
    }

    /**
     * Display the specified resource.
     * Menggunakan Route Model Binding dengan slug.
     * Pastikan di file routes/web.php Anda mendefinisikan route seperti:
     * Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
     */
    public function show(Product $product) // Menggunakan route model binding dengan slug
    {
        return Inertia::render('Web/Products/Show', [
            'product' => $product,
        ]);
    }
}