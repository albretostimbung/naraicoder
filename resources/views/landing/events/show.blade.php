@php use Carbon\Carbon; @endphp
<x-layouts.landing :title="$event->title . ' | ' . config('app.name')">

    {{-- HERO SECTION --}}
    <section class="pt-24 pb-12 bg-gradient-to-b from-gray-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            {{-- Breadcrumb --}}
            <nav class="mb-8 flex items-center space-x-2 text-sm" data-aos="fade-down">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-blue-600 transition-colors">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Home
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('events.index') }}"
                   class="text-gray-500 hover:text-blue-600 transition-colors">Events</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900 font-medium">{{ Str::limit($event->title, 50) }}</span>
            </nav>

            <div class="grid lg:grid-cols-3 gap-8">

                {{-- LEFT: MAIN CONTENT --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Featured Image --}}
                    <div class="relative overflow-hidden rounded-2xl shadow-2xl group" data-aos="zoom-in">
                        <img
                            src="{{ $event->featured_image ? cloudinary_url($event->featured_image) : 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d' }}"
                            alt="{{ $event->title }}"
                            class="w-full h-[450px] object-cover transition-transform duration-500 group-hover:scale-110"
                        >

                        {{-- Gradient Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                        {{-- Badges Container --}}
                        <div class="absolute top-4 left-4 right-4 flex justify-between items-start">
                            {{-- Status Badge --}}
                            <span class="px-4 py-2 rounded-full text-sm font-bold shadow-lg backdrop-blur-md
                                @if ($event->registration_status === 'OPEN') bg-green-500/95 text-white
                                @elseif ($event->registration_status === 'COMING_SOON') bg-yellow-500/95 text-white
                                @elseif ($event->registration_status === 'CLOSED') bg-red-500/95 text-white
                                @endif">
                                <span class="inline-block w-2 h-2 rounded-full bg-white mr-2 animate-pulse"></span>
                                {{ str_replace('_', ' ', $event->registration_status) }}
                            </span>

                            {{-- Event Type Badge --}}
                            <span class="px-4 py-2 rounded-full text-sm font-bold shadow-lg backdrop-blur-md
                                @if ($event->event_type === 'ONLINE') bg-blue-500/95 text-white
                                @elseif ($event->event_type === 'OFFLINE') bg-purple-500/95 text-white
                                @endif">
                                {{ $event->event_type === 'ONLINE' ? '🌐 Online Event' : '📍 Offline Event' }}
                            </span>
                        </div>

                        {{-- Title Overlay --}}
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <h1 class="text-3xl lg:text-4xl font-bold text-white mb-2 leading-tight drop-shadow-lg">
                                {{ $event->title }}
                            </h1>
                            <p class="text-white/90 text-sm font-medium">
                                Organized by {{ $event->organizer ?? config('app.name') }}
                            </p>
                        </div>
                    </div>

                    {{-- Quick Info Grid --}}
                    <div class="grid sm:grid-cols-2 gap-4" data-aos="fade-up">

                        {{-- Start Date Card --}}
                        <div
                            class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-5 border-2 border-blue-200 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-blue-700 font-bold uppercase tracking-wide mb-1">Start
                                        Date</p>
                                    <p class="text-lg font-bold text-gray-900">
                                        {{ $event->start_at->format('d M Y') }}
                                    </p>
                                    <p class="text-sm text-gray-700 font-medium">
                                        {{ $event->start_at->format('H:i') }} WIB
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- End Date Card --}}
                        <div
                            class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-5 border-2 border-purple-200 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-purple-700 font-bold uppercase tracking-wide mb-1">End
                                        Date</p>
                                    <p class="text-lg font-bold text-gray-900">
                                        {{ $event->end_at->format('d M Y') }}
                                    </p>
                                    <p class="text-sm text-gray-700 font-medium">
                                        {{ $event->end_at->format('H:i') }} WIB
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Participants Card --}}
                        <div
                            class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-5 border-2 border-green-200 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-green-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-green-700 font-bold uppercase tracking-wide mb-1">
                                        Participants</p>
                                    <p class="text-lg font-bold text-gray-900">
                                        {{ $event->registrations->count() }} Registered
                                    </p>
                                    <p class="text-sm text-gray-700 font-medium">
                                        Unlimited seats
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if ($event->event_type === 'ONLINE')
                            <div
                                class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-5 border-2 border-blue-200 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                <div class="flex items-start space-x-4">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-md">
                                        🌐
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-blue-700 font-bold uppercase tracking-wide mb-1">
                                            Event Type</p>
                                        <p class="text-lg font-bold text-gray-900">
                                            Online Event
                                        </p>
                                        <p class="text-sm text-gray-700 font-medium">
                                            Access link will be shared before event starts
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @elseif( $event->event_type === 'OFFLINE' )
                        {{-- Location Card --}}
                        <div
                            class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-5 border-2 border-orange-200 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="flex-shrink-0 w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-orange-700 font-bold uppercase tracking-wide mb-1">
                                        Location</p>
                                    <p class="text-sm font-bold text-gray-900 line-clamp-2">
                                        {{ $event->location }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>

                    {{-- Description Card --}}
                    <div class="bg-white rounded-2xl shadow-lg border-2 border-gray-100 p-8" data-aos="fade-up"
                         data-aos-delay="100">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900">About This Event</h2>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($event->description)) !!}
                        </div>
                    </div>

                </div>

                {{-- RIGHT: REGISTRATION CARD (STICKY) --}}
                <div class="lg:col-span-1">
                    {{-- Alerts --}}
                    @if (session('success'))
                        <x-ui.alert
                            type="success"
                            title="✓ Registration successful"
                            :message="session('success')"
                            :autohide="4000"
                        />
                    @endif

                    @if (session('error'))
                        <x-ui.alert
                            type="error"
                            title="✕ Registration failed"
                            :message="session('error')"
                            :autohide="4000"
                        />
                    @endif

                    <div class="lg:sticky lg:top-24 space-y-4" data-aos="fade-left">
                        {{-- Registration Card --}}
                        <div class="bg-white rounded-2xl shadow-2xl border-2 border-gray-100 overflow-hidden">

                            {{-- Header with Gradient --}}
                            <div
                                class="bg-gradient-to-r from-blue-600 via-blue-700 to-purple-600 px-6 py-5 text-white relative overflow-hidden">
                                <div class="absolute inset-0 bg-black/10"></div>
                                <div class="relative">
                                    <h3 class="text-xl font-bold mb-1">Event Registration</h3>
                                    <p class="text-blue-100 text-sm">Secure your spot now</p>
                                </div>
                            </div>

                            {{-- Body --}}
                            <div class="p-6 space-y-5">

                                @if ($event->registration_status !== 'OPEN')

                                    {{-- Event Not Open State --}}
                                    <div class="text-center py-10">
                                        <div
                                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-5 shadow-inner">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                        </div>
                                        <p class="text-xl text-gray-900 font-bold mb-2">
                                            {{ $event->registration_status === 'COMING_SOON' ? '⏳ Coming Soon' : '🔒 Registration Closed' }}
                                        </p>
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            {{ $event->registration_status === 'COMING_SOON' ? 'Stay tuned! Registration will open soon.' : 'This event registration has ended.' }}
                                        </p>
                                    </div>

                                @else

                                    @auth

                                        @if(auth()->check() && $event->registrations->where('user_id', auth()->id())->isNotEmpty())

                                            {{-- Already Registered State --}}
                                            <div class="text-center py-8">
                                                <div
                                                    class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-5 shadow-lg animate-pulse">
                                                    <svg class="w-10 h-10 text-green-600" fill="none"
                                                         stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                </div>

                                                <p class="text-xl font-bold text-gray-900 mb-2">
                                                    ✓ You're Registered!
                                                </p>
                                                <p class="text-gray-600 mb-6 text-sm">
                                                    We'll send you a reminder before the event starts.
                                                </p>

                                                <a href="{{ route('my-events.index') }}"
                                                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                         viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                    View My Events
                                                </a>
                                            </div>

                                        @else

                                            {{-- Registration Form --}}
                                            <div class="space-y-4">
                                                <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-4">
                                                    <div class="flex items-start space-x-3">
                                                        <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0"
                                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <div>
                                                            <p class="text-sm font-semibold text-blue-900 mb-1">Quick
                                                                Registration</p>
                                                            <p class="text-xs text-blue-700">One click to secure your
                                                                spot!</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form method="POST" action="{{ route('events.register', $event) }}">
                                                    @csrf
                                                    <button type="submit"
                                                            class="w-full py-4 bg-gradient-to-r from-blue-600 via-blue-700 to-purple-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center space-x-2 group">
                                                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform"
                                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <span>Register Now</span>
                                                    </button>
                                                </form>

                                                <p class="text-xs text-center text-gray-500 leading-relaxed">
                                                    🔒 Your information is secure and will only be used for event
                                                    communication.
                                                </p>
                                            </div>

                                        @endif

                                    @else

                                        {{-- Login Required State --}}
                                        <div class="text-center py-6 space-y-4">
                                            <div
                                                class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
                                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                            </div>

                                            <div>
                                                <p class="text-lg font-bold text-gray-900 mb-1">Login Required</p>
                                                <p class="text-sm text-gray-600">Please sign in to register for this
                                                    event</p>
                                            </div>

                                            <a href="{{ route('google.login', ['redirect' => url()->current()]) }}"
                                               class="flex items-center justify-center w-full py-4 bg-white border-2 border-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 shadow-md hover:shadow-lg group">
                                                <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform"
                                                     viewBox="0 0 24 24">
                                                    <path fill="#4285F4"
                                                          d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                                    <path fill="#34A853"
                                                          d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                                    <path fill="#FBBC05"
                                                          d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                                    <path fill="#EA4335"
                                                          d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                                </svg>
                                                <span>Continue with Google</span>
                                            </a>

                                            <p class="text-xs text-gray-500">
                                                No account? We'll create one for you automatically
                                            </p>
                                        </div>

                                    @endauth

                                @endif

                            </div>

                        </div>

                        {{-- Share Card with Alpine.js --}}
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-5 border border-gray-200">
                            <p class="text-sm font-semibold text-gray-900 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                Share this event
                            </p>
                            <div class="flex space-x-2" x-data="{ copied: false }">
                                {{-- Facebook --}}
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                   target="_blank"
                                   class="flex-1 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium text-center inline-flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    <span class="hidden sm:inline">Facebook</span>
                                </a>

                                {{-- Twitter --}}
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($event->title) }}"
                                   target="_blank"
                                   class="flex-1 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition text-sm font-medium text-center inline-flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                    <span class="hidden sm:inline">Twitter</span>
                                </a>

                                {{-- Copy Link --}}
                                <button @click="navigator.clipboard.writeText('{{ url()->current() }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                        class="flex-1 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800 transition text-sm font-medium inline-flex items-center justify-center gap-2">
                                    <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                    <svg x-show="copied" x-cloak class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span x-text="copied ? 'Copied!' : 'Copy'" class="hidden sm:inline">Copy</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

    @push('scripts')
        <script>
            function copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(() => {
                    const button = event.currentTarget;
                    const copyText = button.querySelector('.copy-text');
                    const copiedText = button.querySelector('.copied-text');

                    copyText.classList.add('hidden');
                    copiedText.classList.remove('hidden');

                    setTimeout(() => {
                        copyText.classList.remove('hidden');
                        copiedText.classList.add('hidden');
                    }, 2000);
                }).catch(err => {
                    alert('Failed to copy link');
                });
            }
        </script>
    @endpush
</x-layouts.landing>
