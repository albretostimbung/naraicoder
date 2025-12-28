<nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md shadow-lg z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('assets/images/logo.png') }}" alt="NaraiCoder Logo" class="w-32">
        </a>

        {{-- Desktop Navigation --}}
        <div class="hidden md:flex gap-6 text-sm font-medium">
            <a href="{{ route('home') }}"
               class="hover:text-blue-600 transition-colors {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">
                Beranda
            </a>

            <a href="{{ route('home') }}#about"
               class="hover:text-blue-600 transition-colors scroll-smooth">
                Tentang
            </a>

            <a href="{{ route('events.index') }}"
               class="hover:text-blue-600 transition-colors scroll-smooth">
                Event
            </a>

            @guest
                <a href="{{ route('home') }}#join"
                   class="hover:text-blue-600 transition-colors scroll-smooth">
                    Gabung
                </a>
            @else
                <a href="{{ route('my-events.index') }}"
                   class="hover:text-blue-600 transition-colors {{ request()->routeIs('my-events.*') ? 'text-blue-600 font-semibold' : '' }}">
                    Event Saya
                </a>
            @endguest
        </div>

        {{-- Auth Section --}}
        @auth
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                        class="flex items-center gap-2 px-3 py-1.5 rounded-lg hover:bg-gray-100 transition">
                    <img src="{{ auth()->user()->avatar }}"
                         alt="{{ auth()->user()->name }}"
                         class="w-8 h-8 rounded-full object-cover border-2 border-blue-100">
                    <span class="text-sm font-medium hidden sm:block">
                        {{ Str::limit(auth()->user()->name, 15) }}
                    </span>
                    <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                {{-- Dropdown --}}
                <div x-show="open"
                     @click.outside="open = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-xl overflow-hidden">

                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-xs text-gray-500 mb-1">Signed in as</p>
                        <p class="text-sm font-semibold text-gray-900 truncate" title="{{ auth()->user()->email }}">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                    <a href="{{ route('my-events.index') }}"
                       class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>My Events</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors border-t border-gray-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('google.login', ['redirect' => url()->current()]) }}"
               class="flex items-center gap-2 px-5 py-2 text-sm rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium hover:from-blue-700 hover:to-purple-700 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                </svg>
                <span>Masuk / Daftar</span>
            </a>
        @endauth

        {{-- Mobile Menu Toggle (Optional) --}}
        <button class="md:hidden p-2 rounded-lg hover:bg-gray-100"
                @click="$dispatch('toggle-mobile-menu')">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
</nav>
