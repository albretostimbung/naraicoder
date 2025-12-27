<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyEventController extends Controller
{
    public function index()
    {
        $registrations = auth()->user()
            ->eventRegistrations()
            ->with('event')
            ->latest()
            ->get();

        return view('landing.my-events.index', compact('registrations'));
    }
}
