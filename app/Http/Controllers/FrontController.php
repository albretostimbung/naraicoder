<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::first();
        $partners = Partner::latest()->get();

        return view('front.index', compact('heroSection', 'partners'));
    }
}
