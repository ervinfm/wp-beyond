<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class ShareFooterNavigation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Bagikan data dari helper sebagai "shared props" Inertia
        Inertia::share([
            // 'footerNav' akan menjadi nama prop yang bisa diakses di Vue
            'footerNav' => fn () => getFeaturedFooterNav(),
        ]);

        return $next($request);
    }
}