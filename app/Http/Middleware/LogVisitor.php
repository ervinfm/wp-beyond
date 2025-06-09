<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Location; // <-- Import package lokasi
use Jenssegers\Agent\Agent; // <-- Import package agent

class LogVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah session untuk visit ini sudah ada
        if (!$request->session()->has('visit_logged')) {
            
            // Ambil data lokasi dari IP. Akan me-return false jika gagal (misal: di localhost)
            $position = Location::get($request->ip()); 
            
            // Ambil data perangkat
            $agent = new Agent();
            $deviceType = 'Desktop';
            if ($agent->isMobile()) {
                $deviceType = 'Mobile';
            } elseif ($agent->isTablet()) {
                $deviceType = 'Tablet';
            }

            // Catat pengunjung ini ke database dengan data yang lebih lengkap
            Visit::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'referer_url' => $request->header('referer'),
                'landing_page' => $request->fullUrl(), // Halaman pertama yang dikunjungi
                'utm_source' => $request->query('utm_source'),
                'utm_medium' => $request->query('utm_medium'),
                'utm_campaign' => $request->query('utm_campaign'),
                'location_city' => $position ? $position->cityName : null,
                'location_country' => $position ? $position->countryName : null,
                'device_type' => $deviceType,
            ]);

            // Set session agar tidak dicatat lagi selama sesi ini berlangsung
            $request->session()->put('visit_logged', true);
        }

        return $next($request);
    }
}