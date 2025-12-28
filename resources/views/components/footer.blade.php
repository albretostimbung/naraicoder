<footer class="bg-gray-900 text-gray-400 py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="NaraiCoder Logo" class="w-32">
                </div>
                <p class="text-sm">
                    Komunitas IT terbesar di Kalimantan Tengah untuk pengembangan talenta digital.
                </p>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
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
                    <li class="flex items-center gap-1">
                        <x-lucide-icon name="mail" class="inline w-4 h-4"/>
                        <span>info@naraicoder.org</span>
                    </li>
                    <li class="flex items-center gap-1">
                        <x-lucide-icon name="pin" class="inline w-4 h-4"/>
                        <span>Palangka Raya, Kalimantan Tengah</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Social Media</h4>
                <div class="flex gap-3">
                    <a href="https://www.instagram.com/Naraicoder"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:text-[#E1306C]/80 transition-colors">
                        <x-lucide-icon name="instagram" class="w-5 h-5"/>
                    </a>
                    <a href="https://youtube.com/@naraicoder7273?si=8-eaeJF_oZoXNydY"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:text-[#FF0000]/80 transition-colors">
                        <x-lucide-icon name="youtube" class="w-5 h-5"/>
                    </a>
                    <a href="https://www.linkedin.com/company/naraicoder/"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:text-[#0A66C2]/80 transition-colors">
                        <x-lucide-icon name="linkedin" class="w-5 h-5"/>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center text-sm">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</footer>
