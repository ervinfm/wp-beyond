<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{
    Product, ProductCategory,
};

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // <-- Tambahkan Request $request
    {
        // 1. Mulai query builder
        $productsQuery = Product::query()->with(['category']); // Ganti category menjadi categories (plural)

        // 2. Terapkan filter jika ada parameter 'category' di URL
        if ($request->query('category')) {
            $productsQuery->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->query('category'));
            });
        }
        
        // 3. Ambil hasil query dengan paginasi
        //    Paginator Laravel otomatis akan menambahkan query string yang ada
        $products = $productsQuery->latest()->paginate(8)->withQueryString();

        // Ambil semua kategori untuk ditampilkan sebagai tombol filter
        $categories = ProductCategory::orderBy('name', 'asc')->get();

        // 4. Kirim data ke Vue
        return Inertia::render('Web/Products/Index', [
            'products' => $products,
            'productCategories' => $categories, // Ganti nama prop agar lebih jelas (plural)
            'filters' => $request->only(['category']), // Kirim filter yang aktif ke Vue
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