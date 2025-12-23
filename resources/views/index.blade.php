<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>NaraiCoder – Komunitas IT Kalimantan Tengah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap"
          rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .gradient-animate {
            background-size: 200% 200%;
            animation: gradient 8s ease infinite;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }

        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
            }
            50% {
                box-shadow: 0 0 30px rgba(59, 130, 246, 0.8);
            }
        }

        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav class="fixed top-0 w-full bg-white/90 backdrop-blur-md shadow-lg z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="#" data-scroll="home" class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-xl">N</span>
            </div>
            <span class="font-bold text-lg bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">NaraiCoder</span>
        </a>

        <div class="hidden md:flex gap-6 text-sm font-medium">
            <a href="#" data-scroll="home" class="hover:text-blue-600 transition-colors">Beranda</a>
            <a href="#" data-scroll="about" class="hover:text-blue-600 transition-colors">Tentang</a>
            <a href="#" data-scroll="events" class="hover:text-blue-600 transition-colors">Event</a>
            <a href="#" data-scroll="join" class="hover:text-blue-600 transition-colors">Gabung</a>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('google.login') }}"
               class="px-4 py-2 text-sm rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:shadow-lg transition-all">
                Masuk/Daftar
            </a>
        </div>
    </div>
</nav>

<!-- HERO -->
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
                <a href="#" data-scroll="join"
                   class="border-2 border-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-all transform hover:scale-105">
                    Gabung Sekarang
                </a>
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

<!-- ABOUT -->
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
                <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 pulse-glow">
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
                <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mx-auto mb-4 pulse-glow">
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

<!-- EVENTS -->
<section id="events" class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Event Kami</span>
            <h2 class="text-4xl font-extrabold mb-4 mt-2">Event Mendatang</h2>
            <p class="text-gray-600 text-lg">Beberapa event yang sedang atau akan berlangsung</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Event Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="zoom-in"
                 data-aos-delay="100">
                <div class="relative overflow-hidden h-56">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=600&h=400&fit=crop"
                         class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                        ONLINE
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                        <span>📅 20 Jan 2024</span>
                        <span>•</span>
                        <span>⏰ 19:00 WITA</span>
                    </div>
                    <h3 class="font-bold text-xl mb-2">
                        Laravel for Beginner
                    </h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Belajar Laravel dari nol bersama mentor berpengalaman dan praktik langsung.
                    </p>
                    <a href="#"
                       class="inline-flex items-center text-blue-600 font-semibold hover:gap-3 gap-2 transition-all">
                        Gabung Sekarang
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="zoom-in"
                 data-aos-delay="200">
                <div class="relative overflow-hidden h-56">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&h=400&fit=crop"
                         class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute top-4 right-4 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                        OFFLINE
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                        <span>📅 25 Jan 2024</span>
                        <span>•</span>
                        <span>📍 Palangka Raya</span>
                    </div>
                    <h3 class="font-bold text-xl mb-2">
                        Tech Meetup Palangka Raya
                    </h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Networking dan sharing bersama komunitas lokal di venue nyaman.
                    </p>
                    <a href="#"
                       class="inline-flex items-center text-blue-600 font-semibold hover:gap-3 gap-2 transition-all">
                        Daftar Sekarang
                        <span>→</span>
                    </a>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover" data-aos="zoom-in"
                 data-aos-delay="300">
                <div class="relative overflow-hidden h-56">
                    <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600&h=400&fit=crop"
                         class="h-full w-full object-cover transform hover:scale-110 transition-transform duration-500">
                    <div
                        class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                        HYBRID
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                        <span>📅 1 Feb 2024</span>
                        <span>•</span>
                        <span>🌐 Online + Offline</span>
                    </div>
                    <h3 class="font-bold text-xl mb-2">
                        Public Speaking for Tech
                    </h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Offline venue + online streaming untuk jangkauan lebih luas.
                    </p>
                    <a href="#"
                       class="inline-flex items-center text-blue-600 font-semibold hover:gap-3 gap-2 transition-all">
                        Daftar Sekarang
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section id="join"
         class="py-24 bg-gradient-to-br from-blue-600 via-blue-700 to-purple-700 text-white text-center relative overflow-hidden gradient-animate">
    <div class="absolute top-0 left-0 w-full h-full opacity-10">
        <div class="absolute top-10 left-20 w-32 h-32 border-4 border-white rounded-full"></div>
        <div class="absolute bottom-20 right-20 w-40 h-40 border-4 border-white rounded-lg"></div>
    </div>

    <div class="relative z-10" data-aos="zoom-in">
        <div class="max-w-3xl mx-auto px-6">
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

<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-400 py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">N</span>
                    </div>
                    <span class="font-bold text-lg text-white">NaraiCoder</span>
                </div>
                <p class="text-sm">
                    Komunitas IT terbesar di Kalimantan Tengah untuk pengembangan talenta digital.
                </p>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <a href="#" data-scroll="about" class="hover:text-blue-600 transition-colors">
                        Tentang
                    </a>
                    <a href="#" data-scroll="events" class="hover:text-blue-600 transition-colors">
                        Event
                    </a>
                    <a href="#" data-scroll="join" class="hover:text-blue-600 transition-colors">
                        Gabung
                    </a>

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
                    <a href="#"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                        <span>f</span>
                    </a>
                    <a href="#"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                        <span>in</span>
                    </a>
                    <a href="#"
                       class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-colors">
                        <span>ig</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center text-sm">
            © {{ date('Y') }} NaraiCoder. All rights reserved. Made with ❤️ in Kalimantan Tengah
        </div>
    </div>
</footer>

<!-- AOS Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
    document.querySelectorAll('[data-scroll]').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('data-scroll');
            const target = document.getElementById(targetId);

            if (!target) return;

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });
</script>

</body>
</html>
