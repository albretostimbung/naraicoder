<?php

namespace App\Http\Controllers\Events;

use App\Constants\GeneralConstant;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index(Request $request)
    {
        $events = Event::query()
            ->when($request->type, fn($q) => $q->where('event_type', $request->type))
            ->when($request->search, fn($q) => $q->where(function($query) use ($request) {
                $query->where('title', 'like', "{$request->search}%")
                    ->orWhere('description', 'like', "{$request->search}%");
            }))
            ->where('start_at', '>=', now())
            ->orderBy('start_at')
            ->paginate(9);

        return view('landing.events.index', compact('events'));
    }

    public function register(Request $request, Event $event)
    {
        $user = $request->user();

        if ($event->status !== GeneralConstant::EVENT_STATUS_PUBLISHED) {
            return back()->with('error', 'This event is not available for registration.');
        }

        if (!$event->isRegistrationOpen()) {
            return back()->with('error', 'Registration for this event is closed.');
        }

        if ($event->registrations()->where('user_id', $user->id)->exists()) {
            return back()->with('info', 'You are already registered for this event.');
        }

        // Simpan registration
        EventRegistration::create([
            'event_id' => $event->id,
            'user_id' => $user->id,
            'participation_type' => $event->event_type, // ONLINE / OFFLINE
        ]);

        // Redirect dengan pesan sukses
        return redirect()
            ->route('events.show', $event->slug)
            ->with('success', 'You have successfully registered for this event.');
    }

    public function show(string $id)
    {
        $event = $this->eventService->getEventBySlug($id);
        return view('landing.events.show', compact('event'));
    }
}
