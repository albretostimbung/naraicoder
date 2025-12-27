<footer class="bg-gray-900 text-gray-400 py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
{{--                    <div--}}
{{--                        class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">--}}
{{--                        <span class="text-white font-bold text-xl">N</span>--}}
{{--                    </div>--}}
{{--                    <span class="font-bold text-lg text-white">NaraiCoder</span>--}}
                    <img src="{{ asset('assets/images/logo.png') }}" alt="NaraiCoder Logo" class="w-32">
                </div>
                <p class="text-sm">
                    Komunitas IT terbesar di Kalimantan Tengah untuk pengembangan talenta digital.
                </p>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    {{--                    <a href="#" data-scroll="about" class="hover:text-blue-600 transition-colors">--}}
                    {{--                        Tentang--}}
                    {{--                    </a>--}}
                    {{--                    <a href="#" data-scroll="events" class="hover:text-blue-600 transition-colors">--}}
                    {{--                        Event--}}
                    {{--                    </a>--}}
                    {{--                    <a href="#" data-scroll="join" class="hover:text-blue-600 transition-colors">--}}
                    {{--                        Gabung--}}
                    {{--                    </a>--}}
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">
                            Event
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">
                            Gabung
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Kontak</h4>
                <ul class="space-y-2 text-sm">
                    <li>📧 hello@naraicoder.id</li>
                    <li>📱 +62 xxx xxxx xxxx</li>
                    <li>📍 Palangka Raya, Kalteng</li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Social Media</h4>
                <div class="flex gap-3">
                    <a href="https://www.instagram.com/Naraicoder"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-pink-500 transition-colors">
                        <span>ig</span>
                    </a>
                    <a href="https://t.me/naraicoder"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-400 transition-colors">
                        <span>t</span>
                    </a>
                    <a href="https://youtube.com/@naraicoder7273?si=8-eaeJF_oZoXNydY"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-600 transition-colors">
                        <span>yt</span>
                    </a>
                    <a href="https://www.linkedin.com/company/naraicoder/"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                        <span>in</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center text-sm">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</footer>
