<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        $events = $this->eventService->getAllOpenEvents();

        return view('landing.index', compact('events'));
    }
}
