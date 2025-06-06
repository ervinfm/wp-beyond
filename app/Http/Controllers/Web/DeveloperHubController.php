<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\DeveloperResource;
use Inertia\Inertia;

class DeveloperHubController extends Controller
{
    public function index()
    {
        $resources = DeveloperResource::orderBy('category')->orderBy('order_column')->get()
            ->groupBy('category');

        $firstResource = DeveloperResource::orderBy('category')->orderBy('order_column')->first();

        return Inertia::render('Web/Developers/Index', compact('resources', 'firstResource'));
    }
}
