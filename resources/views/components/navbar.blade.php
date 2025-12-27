<nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md shadow-lg z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-xl">N</span>
            </div>
            <span class="font-bold text-lg bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                NaraiCoder
            </span>
        </a>

        <div class="hidden md:flex gap-6 text-sm font-medium">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('home') }}">Tentang</a>
            <a href="{{ route('home') }}">Event</a>
            <a href="{{ route('home') }}">Gabung</a>
        </div>

        <!-- Auth Section -->
        @auth
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                        class="flex items-center gap-2 px-3 py-1.5 rounded-lg hover:bg-gray-100 transition">
                    <img src="{{ auth()->user()->avatar }}"
                         class="w-8 h-8 rounded-full">
                    <span class="text-sm font-medium">
                        {{ auth()->user()->name }}
                    </span>
                </button>

                <!-- Dropdown -->
                <div x-show="open"
                     @click.outside="open = false"
                     x-transition
                     class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg overflow-hidden">

                    <a href="{{ route('my-events.index') }}"
                       class="block px-4 py-2 text-sm hover:bg-gray-100">
                        My Events
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('google.login') }}"
               class="px-4 py-2 text-sm rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                Masuk / Daftar
            </a>
        @endauth
    </div>
</nav>
