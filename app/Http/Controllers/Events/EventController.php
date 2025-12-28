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
        $userId = auth()->id();

        try {
            $this->eventService->registerUserToEvent($event->id, $userId);
            return redirect()->back()->with('success', 'You have successfully registered for this event.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $event = $this->eventService->getEventBySlug($id);
        return view('landing.events.show', compact('event'));
    }
}
