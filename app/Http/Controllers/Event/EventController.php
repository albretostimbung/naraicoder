<?php

namespace App\Http\Controllers\Event;

use Exception;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->get();

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if (!$request->hasFile('image')) {
                    $event = Event::create(array_merge($request->validated(), [
                        'slug' => Str::slug($request->title),
                        'is_online' => $request->filled('is_online') ? 1 : 0,
                    ]));

                    foreach ($request->image as $key => $image) {
                        $imagePath = $image->store('event_images', 'public');

                        $event->event_images()->create([
                            'event_id' => $event->id,
                            'image' => $imagePath,
                            'is_primary' => $key === 0 ? 1 : 0,
                        ]);
                    }

                    return;
                }

                $event = Event::create(array_merge($request->validated(), [
                    'slug' => Str::slug($request->title),
                    'is_online' => $request->filled('is_online') ? 1 : 0,
                ]));

                foreach ($request->image as $key => $image) {
                    $imagePath = $image->store('event_images', 'public');

                    $event->event_images()->create([
                        'event_id' => $event->id,
                        'image' => $imagePath,
                        'is_primary' => $key === 0 ? 1 : 0,
                    ]);
                }
            });

            return redirect()->route('admin.events.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        try {
            DB::transaction(function () use ($request, $event) {
                if (!$request->hasFile('image')) {
                    $event->update((array_merge($request->validated(), [
                        'slug' => Str::slug($request->title),
                        'is_online' => $request->filled('is_online') ? 1 : 0,
                    ])));

                    return;
                }

                foreach ($event->event_images as $image) {
                    if (isset($image->image) && file_exists(storage_path('app/public/' . $image->image))) {
                        unlink(storage_path('app/public/' . $image->image));
                    }
                }

                $event->update(array_merge($request->validated(), [
                    'slug' => Str::slug($request->title),
                    'is_online' => $request->filled('is_online') ? 1 : 0,
                ]));

                foreach ($request->image as $key => $image) {
                    $imagePath = $image->store('event_images', 'public');

                    $event->event_images()->create([
                        'event_id' => $event->id,
                        'image' => $imagePath,
                        'is_primary' => $key === 0 ? 1 : 0,
                    ]);
                }
            });

            return redirect()->route('admin.events.index');
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
