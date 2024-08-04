<?php

namespace App\Http\Controllers\Front;

use App\Models\Event;
use App\Models\Article;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\CommunityProfile;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        $communityProfile = CommunityProfile::first();
        $partners = Partner::latest()->get();
        $events = Event::latest()->get();
        $articles = Article::latest()->get();

        return view('front.index', compact('communityProfile', 'partners', 'events', 'articles'));
    }
}
