<x-layouts.landing title="Komunitas IT Kalimantan Tengah | {{ config('app.name') }}">

    <section id="home"
             class="pt-28 pb-24 bg-gradient-to-br from-blue-700 via-blue-600 to-purple-600 text-white gradient-animate overflow-hidden relative">
        <!-- Decorative circles -->
        <div class="absolute top-20 right-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center relative z-10">
            <div data-aos="fade-right">
                <div class="inline-block mb-4 px-4 py-2 bg-white/20 rounded-full text-sm backdrop-blur-sm">
                    🚀 Komunitas IT Terbesar di Kalteng
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6">
                    Wadah Pengembangan<br>
                    <span class="text-yellow-300 drop-shadow-lg">Talenta IT Kalimantan Tengah</span>
                </h1>
                <p class="text-blue-100 mb-8 text-lg">
                    NaraiCoder adalah komunitas terbuka untuk belajar, berbagi,
                    dan berkolaborasi di bidang teknologi dan digital.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#" data-scroll="events"
                       class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:shadow-xl transition-all transform hover:scale-105">
                        Lihat Event
                    </a>
                    @guest
                        <a href="#" data-scroll="join"
                           class="border-2 border-white px-8 py-4 rounded-lg font-semibold">
                            Gabung Sekarang
                        </a>
                    @else
                        <a href="{{ route('my-events.index') }}"
                           class="border-2 border-white px-8 py-4 rounded-lg font-semibold">
                            Lihat Event Saya
                        </a>
                    @endguest
                </div>

                <div class="flex gap-8 mt-12">
                    <div data-aos="fade-up" data-aos-delay="100">
                        <div class="text-3xl font-bold">300+</div>
                        <div class="text-blue-200 text-sm">Member</div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="200">
                        <div class="text-3xl font-bold">50+</div>
                        <div class="text-blue-200 text-sm">Event Terselenggara</div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="300">
                        <div class="text-3xl font-bold">30+</div>
                        <div class="text-blue-200 text-sm">Partner</div>
                    </div>
                </div>
            </div>

            <div class="hidden md:block" data-aos="fade-left">
                <div class="relative float-animation">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=600&fit=crop"
                         class="rounded-2xl shadow-2xl">
                    <div class="absolute -bottom-6 -left-6 bg-white text-gray-800 p-4 rounded-xl shadow-xl">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                <span class="text-white text-2xl">✓</span>
                            </div>
                            <div>
                                <div class="font-bold">Event Active</div>
                                <div class="text-sm text-gray-600">3 Event Berjalan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-5">
            <div class="absolute top-10 left-10 w-20 h-20 border-4 border-blue-600 rounded-lg"></div>
            <div class="absolute bottom-20 right-20 w-32 h-32 border-4 border-purple-600 rounded-full"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
            <div data-aos="fade-up">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Tentang Kami</span>
                <h2 class="text-4xl font-extrabold mb-4 mt-2">Tentang NaraiCoder</h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto mb-8 rounded-full"></div>
            </div>

            <p class="max-w-3xl mx-auto text-gray-600 text-lg leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                Kami adalah komunitas non-profit yang berfokus pada pengembangan
                skill IT, digital, dan teknologi melalui event, workshop,
                dan kolaborasi nyata.
            </p>

            <div class="grid md:grid-cols-3 gap-8 mt-16">
                <div class="p-8 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl shadow-lg card-hover"
                     data-aos="flip-left" data-aos-delay="100">
                    <div
                        class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 pulse-glow">
                        <span class="text-3xl">📅</span>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Event Berkualitas</h3>
                    <p class="text-sm text-gray-600">
                        Online, offline, dan hybrid event dengan praktisi nyata dan materi terkini.
                    </p>
                </div>

                <div class="p-8 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl shadow-lg card-hover"
                     data-aos="flip-left" data-aos-delay="200">
                    <div
                        class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4 pulse-glow">
                        <span class="text-3xl">👥</span>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Komunitas Aktif</h3>
                    <p class="text-sm text-gray-600">
                        Networking sehat antar developer, designer, dan digital talent dari berbagai level.
                    </p>
                </div>

                <div class="p-8 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl shadow-lg card-hover"
                     data-aos="flip-left" data-aos-delay="300">
                    <div
                        class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mx-auto mb-4 pulse-glow">
                        <span class="text-3xl">🚀</span>
                    </div>
                    <h3 class="font-bold text-xl mb-3">Pengembangan Karier</h3>
                    <p class="text-sm text-gray-600">
                        Akses mentorship, sharing session, dan peluang kolaborasi dengan profesional.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="events" class="py-24 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Event Kami</span>
                <h2 class="text-4xl font-extrabold mb-4 mt-2">Event Mendatang</h2>
                <p class="text-gray-600 text-lg">Beberapa event yang sedang atau akan berlangsung</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($events as $event)
                    <x-event-card :event="$event"/>
                @endforeach
            </div>
        </div>
    </section>

    <section id="join"
             class="py-24 bg-gradient-to-br from-blue-600 via-blue-700 to-purple-700 text-white text-center relative overflow-hidden gradient-animate">
        <div class="absolute top-0 left-0 w-full h-full opacity-10">
            <div class="absolute top-10 left-20 w-32 h-32 border-4 border-white rounded-full"></div>
            <div class="absolute bottom-20 right-20 w-40 h-40 border-4 border-white rounded-lg"></div>
        </div>

        <div class="relative z-10" data-aos="zoom-in">
            <div class="max-w-3xl mx-auto px-6">
                @guest
                    <div class="inline-block mb-6 px-6 py-2 bg-white/20 rounded-full text-sm backdrop-blur-sm">
                        ✨ Bergabunglah Bersama 300+ Member
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
                        Siap Bergabung dengan NaraiCoder?
                    </h2>
                    <p class="text-blue-100 mb-10 text-lg">
                        Daftar sekarang dan ikut event serta komunitas kami. Gratis dan terbuka untuk semua!
                    </p>

                    <a href="{{ route('google.login') }}"
                       class="inline-block bg-white text-blue-600 px-10 py-5 rounded-xl font-bold hover:shadow-2xl transition-all transform hover:scale-105 text-lg">
                        <span class="mr-2">🚀</span> Daftar Sekarang
                    </a>
                @else
                    <h2>Selamat Datang Kembali 👋</h2>
                    <p class="text-blue-100 mb-10">
                        Lihat event terbaru dan lanjutkan perjalanan belajarmu bersama komunitas.
                    </p>

                    <div class="flex justify-center gap-4">
                        <a href="{{ route('my-events.index') }}"
                           class="bg-white text-blue-600 px-10 py-5 rounded-xl font-bold">
                            🎫 Lihat Event
                        </a>

                        <a href="{{ route('home') }}"
                           class="border-2 border-white px-10 py-5 rounded-xl font-bold">
                            📌 Event Saya
                        </a>
                    </div>
                @endguest

                <div class="flex justify-center gap-8 mt-12">
                    <div class="text-center">
                        <div class="text-3xl mb-2">💯</div>
                        <div class="text-sm text-blue-200">Gratis Selamanya</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl mb-2">🎓</div>
                        <div class="text-sm text-blue-200">Learning Path</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl mb-2">🤝</div>
                        <div class="text-sm text-blue-200">Networking</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.landing>
