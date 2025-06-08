<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        // Ambil 1 acara mendatang terdekat sebagai unggulan/featured
        $featuredEvent = Event::where('status', 'upcoming')->orderBy('event_date', 'asc')->first();

        // Ambil acara mendatang lainnya (jika ada), kecualikan yang sudah jadi unggulan
        $otherUpcomingEvents = Event::where('status', 'upcoming')
            ->when($featuredEvent, function ($query) use ($featuredEvent) {
                $query->where('id', '!=', $featuredEvent->id);
            })
            ->orderBy('event_date', 'asc')
            ->take(2) // Ambil 2 berikutnya saja agar tidak terlalu ramai
            ->get();

        // Ambil acara yang sudah lewat dengan paginasi
        $pastEvents = Event::where('status', 'past')->orderBy('event_date', 'desc')->paginate(6);

        return Inertia::render('Web/Events/Index', [
            'featuredEvent' => $featuredEvent,
            'otherUpcomingEvents' => $otherUpcomingEvents,
            'pastEvents' => $pastEvents,
        ]);
    }
}