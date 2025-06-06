<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\GlossaryTerm;
use Inertia\Inertia;

class GlossaryController extends Controller
{
    public function index()
    {
        $terms = GlossaryTerm::orderBy('term')->get()
            ->groupBy(fn($item) => strtoupper(substr($item->term, 0, 1)));

        return Inertia::render('Web/Glossary/Index', ['groupedTerms' => $terms]);
    }
}
