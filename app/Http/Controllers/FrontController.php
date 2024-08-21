<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\Partner;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use App\Models\BannerAdvertisement;

class FrontController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::first();
        $partners = Partner::latest()->get();
        $featured_event = Event::where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();
        $events = Event::where('is_featured', 'not_featured')
            ->inRandomOrder()
            ->take(6)
            ->get();
        $banner_ads = BannerAdvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->take(1)
            ->get();
        $featured_article = Article::where('is_featured', 'featured')
            ->inRandomOrder()
            ->first();
        $articles = Article::where('is_featured', 'not_featured')
            ->inRandomOrder()
            ->take(6)
            ->get();

        return view('front.index', compact('heroSection', 'partners', 'featured_event', 'events', 'banner_ads', 'featured_article', 'articles'));
    }

    public function details_event(Event $event)
    {
        return view('front.details-event', compact('event'));
    }
}
