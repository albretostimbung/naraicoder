@php use Carbon\Carbon; @endphp
<x-layouts.landing :title="$event->title">

    {{-- HERO SECTION --}}
    <section class="pt-20 pb-8 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            {{-- Breadcrumb --}}
            <nav class="mb-6 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700">Home</a>
                <span class="mx-2 text-gray-400">/</span>
                <a href="{{ route('events.index') }}" class="text-gray-500 hover:text-gray-700">Events</a>
                <span class="mx-2 text-gray-400">/</span>
                <span class="text-gray-900 font-medium">{{ Str::limit($event->title, 40) }}</span>
            </nav>

            <div class="grid lg:grid-cols-3 gap-8">

                {{-- LEFT: IMAGE & DETAILS --}}
                <div class="lg:col-span-2">

                    {{-- Featured Image --}}
                    <div class="relative overflow-hidden rounded-2xl shadow-xl mb-6 group">
                        <img
                            src="{{ $event->featured_image ? asset('storage/' . $event->featured_image) : 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d' }}"
                            alt="{{ $event->title }}"
                            class="w-full h-[400px] object-cover transition-transform duration-300 group-hover:scale-105"
                        >

                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>

                        {{-- Status Badge --}}
                        <div class="absolute top-4 left-4">
                            <span class="px-4 py-2 rounded-full text-sm font-bold shadow-lg backdrop-blur-sm
                                @class([
                                    'bg-green-500/90 text-white' => $event->status === 'OPEN',
                                    'bg-yellow-500/90 text-white' => $event->status === 'COMING_SOON',
                                    'bg-red-500/90 text-white' => $event->status === 'CLOSED',
                                ])">
                                ● {{ str_replace('_', ' ', $event->status) }}
                            </span>
                        </div>

                        {{-- Event Type Badge --}}
                        <div class="absolute top-4 right-4">
                            <span class="px-4 py-2 rounded-full text-xs font-semibold shadow-lg backdrop-blur-sm
                                @class([
                                    'bg-blue-500/90 text-white' => $event->event_type === 'ONLINE',
                                    'bg-green-500/90 text-white' => $event->event_type === 'OFFLINE',
                                    'bg-purple-500/90 text-white' => $event->event_type === 'HYBRID',
                                ])">
                                {{ $event->event_type }}
                            </span>
                        </div>
                    </div>

                    {{-- Title --}}
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                        {{ $event->title }}
                    </h1>

                    {{-- Quick Info Cards --}}
                    <div class="grid sm:grid-cols-2 gap-4 mb-6">

                        {{-- Date Start --}}
                        <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-xl border border-blue-100">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 font-medium mb-1">Start Date</p>
                                <p class="text-sm font-bold text-gray-900">
                                    {{ Carbon::parse($event->date_start)->translatedFormat('d M Y') }}
                                </p>
                                <p class="text-xs text-gray-600">
                                    {{ Carbon::parse($event->date_start)->translatedFormat('H:i') }}
                                </p>
                            </div>
                        </div>

                        {{-- Date End --}}
                        <div class="flex items-start space-x-3 p-4 bg-red-50 rounded-xl border border-red-100">
                            <div class="flex-shrink-0 w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 font-medium mb-1">End Date</p>
                                <p class="text-sm font-bold text-gray-900">
                                    {{ Carbon::parse($event->date_end)->translatedFormat('d M Y') }}
                                </p>
                                <p class="text-xs text-gray-600">
                                    {{ Carbon::parse($event->date_end)->translatedFormat('H:i') }}
                                </p>
                            </div>
                        </div>

                    </div>

                    {{-- Description --}}
                    <div class="bg-white rounded-xl border p-6 mb-6">
                        <h2 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            About This Event
                        </h2>
                        <div class="prose prose-sm max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($event->description)) !!}
                        </div>
                    </div>

                </div>

                {{-- RIGHT: ACTION CARD (STICKY) --}}
                <div class="lg:col-span-1">
                    <div class="lg:sticky lg:top-24">

                        {{-- Registration Card --}}
                        <div class="bg-white rounded-2xl shadow-xl border-2 border-gray-100 overflow-hidden">

                            {{-- Header --}}
                            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4 text-white">
                                <h3 class="text-lg font-bold">Event Registration</h3>
                            </div>

                            {{-- Body --}}
                            <div class="p-6 space-y-4">

                                {{-- Quota Info --}}
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Available Seats</p>
                                            <p class="text-xl font-bold text-gray-900">{{ $event->quota }}</p>
                                        </div>
                                    </div>
                                </div>

                                @if ($event->status !== 'OPEN')

                                    {{-- Event Not Open --}}
                                    <div class="text-center py-8">
                                        <div
                                            class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                        </div>
                                        <p class="text-gray-700 font-semibold mb-1">
                                            {{ $event->status === 'COMING_SOON' ? 'Coming Soon' : 'Registration Closed' }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            {{ $event->status === 'COMING_SOON' ? 'Stay tuned for registration opening' : 'This event has ended' }}
                                        </p>
                                    </div>

                                @else

                                    @auth

                                        {{-- Registration Form --}}
                                        <form method="POST" action="{{ route('home', $event) }}">
                                            @csrf

                                            <button type="submit"
                                                    class="w-full py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                                Register Now
                                            </button>
                                        </form>

                                    @else

                                        {{-- Login Required --}}
                                        <div class="text-center py-4">
                                            <p class="text-sm text-gray-600 mb-4">Please login to register</p>
                                            <a href="{{ route('home') }}"
                                               class="flex items-center justify-center w-full py-4 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200 shadow hover:shadow-md">
                                                <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                                                    <path fill="#4285F4"
                                                          d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                                    <path fill="#34A853"
                                                          d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                                    <path fill="#FBBC05"
                                                          d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                                    <path fill="#EA4335"
                                                          d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                                </svg>
                                                Login with Google
                                            </a>
                                        </div>

                                    @endauth

                                @endif

                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

</x-layouts.landing>
