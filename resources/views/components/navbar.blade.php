<nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md shadow-lg z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-xl">N</span>
            </div>
            <span class="font-bold text-lg bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                NaraiCoder
            </span>
        </div>

        <div class="hidden md:flex gap-6 text-sm font-medium">
            <a href="#" data-scroll="home">Beranda</a>
            <a href="#" data-scroll="about">Tentang</a>
            <a href="#" data-scroll="events">Event</a>
            <a href="#" data-scroll="join">Gabung</a>
        </div>

        <a href="{{ route('google.login') }}"
           class="px-4 py-2 text-sm rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            Masuk / Daftar
        </a>
    </div>
</nav>
