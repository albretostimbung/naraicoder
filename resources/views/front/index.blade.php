<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') ?? 'Laravel' }}</title>
    <meta name="description" content="Your site description here">
    <link rel="canonical" href="{{ url()->current() }}">
    <link href="{{ asset('output.css') }}" rel="stylesheet" />
    <link href="{{ asset('main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
</head>

<body class="font-[Poppins]">
    <header>
        <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center my-[10px] px-4 md:px-0">
            <div class="logo-container flex gap-[30px] items-center">
                <a href="{{ route('front.index') }}" class="flex shrink-0">
                    <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="logo" />
                </a>
            </div>
            <div class="hidden md:flex">
                <a href="{{ route('front.index') }}"
                    class="font-medium gap-[10px] p-[12px_22px] {{ request()->routeIs('front.index') ? 'text-[#2E4DEC]' : '' }}">Home</a>
                <a href="#" class="font-medium gap-[10px] p-[12px_22px]">Articles</a>
                <a href="#" class="font-medium gap-[10px] p-[12px_22px]">About</a>
                <a href="#" class="font-medium gap-[10px] p-[12px_22px]">Contact</a>
            </div>
            <button id="menu-toggle" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>

        <div id="mobile-menu" class="hidden md:hidden" aria-label="Mobile navigation menu">
            <a href="{{ route('front.index') }}"
                class="block py-2 px-4 text-sm hover:bg-gray-200 {{ request()->routeIs('front.index') ? 'text-[#2E4DEC]' : '' }}">Home</a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Articles</a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">About</a>
            <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Contact</a>
        </div>
    </header>

    <main>
        <section id="Hero" class="w-full mx-auto flex justify-center items-center bg-[#F7F8FA]"
            aria-label="Hero section">
            <div class="max-w-[1130px] pt-[60px] pb-[36px] text-center">
                <div class="mb-[20px] text-3xl font-semibold leading-8">{!! $heroSection->heading ?? '' !!}</div>
                <a href="{{ $heroSection->button_link ?? '#' }}"
                    class="rounded-full p-[12px_54px] uppercase bg-[#2E4DEC] hover:bg-[#0F3F62] transition-all duration-300 text-white font-semibold">{{ $heroSection->button_text ?? '' }}</a>
                <div class="flex items-center justify-center">
                    <img src="{{ Storage::url($heroSection->thumbnail) ?? '' }}" alt="Hero" class="mt-[64px]">
                </div>
            </div>
        </section>

        <section id="Partners" class="max-w-[1130px] mx-auto mt-[50px]" aria-label="Our partners">
            <div class="text-4xl font-semibold text-center mb-[16px]">Our Partners</div>
            <div class="font-light font-[#E5E5E5] text-center mb-[50px] leading-8">Meet the valued partners who help us
                build<br />and
                strengthen our
                community every day</div>
            <div class="main-carousel w-full outline-none overflow-hidden p-[2px]">
                @forelse($partners as $partner)
                    <div class="flex shrink-0 mr-[45px]">
                        <a href="{{ $partner->url }}"
                            class="rounded-[16px] border border-[#E5E5E5] p-[25px] flex items-center hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" />
                        </a>
                    </div>
                @empty
                    <div class="text-center text-xl font-semibold">No data found</div>
                @endforelse
            </div>
        </section>

        <section id="Events" class="max-w-[1130px] mx-auto mt-[80px]" aria-label="Latest events">
            <div class="flex justify-between items-center mb-[50px]">
                <div class="text-4xl font-semibold leading-[48px]">Latest Events<br />For You</div>
                <a href="#"
                    class="rounded-full p-[12px_54px] border border-[#22222] uppercase bg-white text-black font-semibold hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">Explore
                    All</a>
            </div>
            <div class="flex justify-between items-center h-fit">
                <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[16px] overflow-hidden">
                    <img src="{{ Storage::url($featured_event->thumbnail) }}"
                        class="thumbnail absolute w-full h-full object-cover" alt="icon" />
                    <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                    </div>
                    <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                        <div class="flex flex-col gap-[10px]">
                            <p class="text-white">{{ $featured_event->is_online ? 'Online' : 'Offline' }}</p>
                            <a href="{{ route('front.details-event', $featured_event->slug) }}"
                                class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{ str()->limit($featured_event->name, 50) }}</a>
                            <p class="text-white">{{ $featured_event->created_at->format('d M, Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
                    <div class="w-[455px] flex flex-col gap-5 shrink-0">
                        @forelse($events as $event)
                            <a href="{{ route('front.details-event', $event->slug) }}" class="card py-[2px]">
                                <div
                                    class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                                    <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                        <img src="{{ Storage::url($event->thumbnail) }}"
                                            class="object-cover w-full h-full" alt="thumbnail" />
                                    </div>
                                    <div class="flex flex-col justify-center-center gap-[6px]">
                                        <h3 class="font-bold text-lg leading-[27px]">
                                            {{ str()->limit($event->name, 50) }}
                                        </h3>
                                        <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                            {{ $event->created_at->format('d M, Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="text-center text-xl font-semibold">No data found</div>
                        @endforelse
                    </div>
                    <div
                        class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
                    </div>
                </div>
            </div>
        </section>

        <section id="Advertisement"
            class="max-w-[1130px] mx-auto flex justify-center mt-[50px] md:mt-[100px] px-4 md:px-0"
            aria-label="Advertisement">
            <div class="flex flex-col gap-3 shrink-0 w-full md:w-fit">
                @forelse($banner_ads as $banner)
                    <a href="{{ $banner->link }}">
                        <div
                            class="w-full md:w-[900px] h-[80px] md:h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
                            <img src="{{ Storage::url($banner->thumbnail) }}" class="object-cover w-full h-full"
                                alt="ads" />
                        </div>
                    </a>
                @empty
                    <div class="text-center text-xl font-semibold">No data found</div>
                @endforelse
                <p
                    class="font-medium text-xs md:text-sm leading-[18px] md:leading-[21px] text-[#A3A6AE] flex items-center gap-1">
                    Our Advertisement <a href="#" class="w-[16px] h-[16px] md:w-[18px] md:h-[18px]"><img
                            src="{{ asset('assets/images/icons/message-question.svg') }}" alt="icon"
                            class="w-full h-full" /></a>
                </p>
            </div>
        </section>

        <section id="Articles" class="max-w-[1130px] mx-auto mt-[80px]" aria-label="Latest articles">
            <div class="flex justify-between items-center mb-[50px]">
                <div class="text-4xl font-semibold leading-[48px]">Latest Articles<br />For You</div>
                <a href="#"
                    class="rounded-full p-[12px_54px] border border-[#22222] uppercase bg-white text-black font-semibold hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">Explore
                    All</a>
            </div>
            <div class="flex justify-between items-center h-fit">
                <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[16px] overflow-hidden">
                    <img src="{{ Storage::url($featured_article->thumbnail) }}"
                        class="thumbnail absolute w-full h-full object-cover" alt="icon" />
                    <div
                        class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                    </div>
                    <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                        <div class="flex flex-col gap-[10px]">
                            <a href="details.html"
                                class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{ str()->limit($featured_article->name, 50) }}</a>
                            <p class="text-white">{{ $featured_article->created_at->format('d M, Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
                    <div class="w-[455px] flex flex-col gap-5 shrink-0">
                        @forelse($articles as $article)
                            <a href="details.html" class="card py-[2px]">
                                <div
                                    class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                                    <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                        <img src="{{ Storage::url($article->thumbnail) }}"
                                            class="object-cover w-full h-full" alt="thumbnail" />
                                    </div>
                                    <div class="flex flex-col justify-center-center gap-[6px]">
                                        <h3 class="font-bold text-lg leading-[27px]">
                                            {{ str()->limit($article->name, 50) }}</h3>
                                        <p class="text-sm leading-[21px] text-[#A3A6AE]">
                                            {{ $article->created_at->format('d M, Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="text-center text-xl font-semibold">No data found</div>
                        @endforelse
                    </div>
                    <div
                        class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="Footer" class="mt-[50px] md:mt-[100px] py-[50px] md:py-[100px] bg-[#F7F8FA]">
        <div
            class="flex flex-col md:flex-row gap-y-8 md:gap-x-8 lg:gap-x-24 items-start max-w-[1130px] mx-auto px-4 md:px-6 lg:px-0">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="logo" class="mb-6 md:mb-0">
            </a>
            <div class="w-full md:w-auto">
                <div class="font-semibold text-lg mb-[24px] md:mb-[32px]">Explore</div>
                <div class="flex flex-col gap-y-3 md:gap-y-4">
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">Our Services</a>
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">Spesification</a>
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">Refund</a>
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">Playlist</a>
                </div>
            </div>
            <div class="w-full md:w-auto">
                <div class="font-semibold text-lg mb-[24px] md:mb-[36px]">Account</div>
                <div class="flex flex-col gap-y-3 md:gap-y-4">
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">My Account</a>
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">Top Benefit</a>
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">How-to Tutorials</a>
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">Moment</a>
                </div>
            </div>
            <div class="w-full md:w-auto">
                <div class="font-semibold text-lg mb-[24px] md:mb-[36px]">Office</div>
                <div class="flex flex-col gap-y-3 md:gap-y-4">
                    <a href="tel:+02122081996" class="hover:text-[#2E4DEC] transition-colors duration-300">+021 2208
                        1996</a>
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">Menteng, Palangka
                        Raya</a>
                    <a href="#" class="hover:text-[#2E4DEC] transition-colors duration-300">No. 1
                        (NaraiCoder)</a>
                    <a href="mailto:support@naraicoder.org"
                        class="hover:text-[#2E4DEC] transition-colors duration-300">support@naraicoder.org</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/carousel.js') }}" defer></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
            mobileMenu.setAttribute('aria-expanded', mobileMenu.classList.contains('hidden') ? 'false' : 'true');
        });
    </script>
</body>

</html>
