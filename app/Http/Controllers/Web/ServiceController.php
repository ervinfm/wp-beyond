<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Inertia\Inertia;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('title', 'asc') // Urutkan berdasarkan judul
            ->paginate(6) // Misalnya 9 layanan per halaman
            ->through(fn ($service) => [ // Transformasi data di sini
                'id' => $service->id,
                'title' => $service->title,
                'slug' => $service->slug,
                'short_description' => $service->short_description,
                // 'long_description' => $service->long_description, // Tidak perlu untuk halaman index
                // Ubah path gambar menjadi URL absolut
                'image_url' => $service->image ? asset('images/services/' . $service->image) : null, 
                'icon' => $service->icon,
                'is_featured' => $service->is_featured, // Tidak perlu untuk halaman index
            ]);

        return Inertia::render('Web/Services/Index', [
            'services' => $services,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service) // Route Model Binding
    {
        return Inertia::render('Web/Services/Show', [
            'service' => $service,
        ]);
    }

}
