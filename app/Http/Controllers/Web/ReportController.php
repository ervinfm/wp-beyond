<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Inertia\Inertia;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('is_active', true)->latest('published_at')->paginate(9);
        return Inertia::render('Web/Reports/Index', compact('reports'));
    }

    public function show(Report $report)
    {
        return Inertia::render('Web/Reports/Show', compact('report'));
    }
}
