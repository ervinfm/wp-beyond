<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::where('status', 'upcoming')->orderBy('event_date', 'asc')->get();
        $pastEvents = Event::where('status', 'past')->orderBy('event_date', 'desc')->paginate(6);
        return Inertia::render('Web/Events/Index', compact('upcomingEvents', 'pastEvents'));
    }
}
