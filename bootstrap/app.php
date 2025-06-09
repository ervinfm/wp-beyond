<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Inertia\Inertia;
// Import interface utama untuk semua exception HTTP
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Pendaftaran middleware Anda sudah benar dan rapi.
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
            \App\Http\Middleware\ShareFooterNavigation::class,
            \App\Http\Middleware\LogVisitor::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
        // Daftarkan handler utama untuk semua jenis error.
        $exceptions->render(function (Throwable $e, Request $request) {
            
            // Cek apakah ini adalah exception yang berhubungan dengan HTTP (4xx atau 5xx)
            if ($e instanceof HttpExceptionInterface) {
                $status = $e->getStatusCode();
            } else {
                // Jika bukan (misal: error koneksi database, error logika), ini adalah kesalahan server murni (500)
                $status = 500;
            }

            // Daftar halaman error kustom yang kita miliki
            $errorPages = [403, 404, 500, 503];

            // Jika status code ada di dalam daftar yang ingin kita tangani secara kustom
            if (in_array($status, $errorPages)) {
                
                // Pengecualian: Jika ini error 500 DAN kita sedang dalam mode development,
                // jangan tampilkan halaman kustom. Biarkan Laravel menampilkan halaman debug Ignition.
                if ($status === 500 && config('app.debug')) {
                    // Cukup kembalikan default render dari Laravel
                    return; 
                }

                // Untuk error 404, 403, 503, atau 500 di mode produksi, tampilkan halaman Vue kustom.
                return Inertia::render("Web/Errors/{$status}", ['status' => $status])
                    ->toResponse($request)
                    ->setStatusCode($status);
            }
        });

    })->create();