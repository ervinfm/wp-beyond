<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\{
    HomeController,
    PageController,
    ServiceController,
    ProductController,
    PortfolioController,
    BlogController,
    CareerController,
    InvestmentController,
    ReportController,
    EventController,
    GlossaryController,
    DeveloperHubController,
};

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Statis
// Untuk about, contact, dll. kita bisa pakai 1 controller saja
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'store'])->name('contact.store');

// Resources
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolio:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/kategori/{category:slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/artikel/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/career', [CareerController::class, 'index'])->name('career.index');
Route::get('/career/{slug}', [CareerController::class, 'show'])->name('career.show');

Route::get('/investasi', [InvestmentController::class, 'index'])->name('investments.index');
Route::get('/investasi/{investment:slug}', [InvestmentController::class, 'show'])->name('investments.show');

Route::controller(ReportController::class) // Menggunakan controller yang sama untuk semua route di grup ini
    ->name('reports.') // Semua nama route akan diawali dengan 'reports.'
    ->group(function () {
        Route::get('/resources/reports', 'index')->name('index');
        Route::get('/resources/reports/{report:slug}', 'show')->name('show');
        Route::post('/reports/{report:slug}/download', 'handleDownload')->name('download');
    });
    
Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/glossary', [GlossaryController::class, 'index'])->name('glossary.index');

Route::get('/developers', [DeveloperHubController::class, 'index'])->name('developers.index');

Route::get('/tes-403', function () {
    abort(403, 'Akses Ditolak.');
});