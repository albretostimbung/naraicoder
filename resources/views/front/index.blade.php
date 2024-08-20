<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaraiCoder</title>
    <link href="./output.css" rel="stylesheet" />
    <link href="./main.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
</head>

<body class="font-[Poppins]">
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center my-[10px]">
        <div class="logo-container flex gap-[30px] items-center">
            <a href="{{ route('front.index') }}" class="flex shrink-0">
                <img src="./assets/images/logos/logo.svg" alt="logo" />
            </a>
        </div>
        <div class="flex">
            <a href="#"
                class="font-medium gap-[10px] p-[12px_22px] {{ request()->routeIs('front.index') ? 'text-[#2E4DEC]' : '' }}">Home</a>
            <a href="#" class="font-medium gap-[10px] p-[12px_22px]">Articles</a>
            <a href="#" class="font-medium gap-[10px] p-[12px_22px]">About</a>
            <a href="#" class="font-medium gap-[10px] p-[12px_22px]">Contact</a>
        </div>
    </nav>

    <section id="Hero" class="w-full mx-auto flex justify-center items-center bg-[#F7F8FA]">
        <div class="max-w-[1130px] pt-[60px] pb-[36px] text-center">
            <div class="mb-[20px] text-3xl font-semibold leading-8">
                {!! $heroSection->heading !!}
            </div>
            <a href="{{ $heroSection->button_link }}"
                class="rounded-full p-[12px_54px] uppercase bg-[#2E4DEC] text-white font-semibold hover:bg-[#0F3F62] transition-all duration-300">{{ $heroSection->button_text }}</a>
            <div class="flex items-center justify-center">
                <img src="{{ Storage::url($heroSection->thumbnail) }}" alt="Hero" class="mt-[64px]">
            </div>
        </div>
    </section>

    <section id="Partners" class="max-w-[1130px] mx-auto mt-[50px]">
        <div class="text-4xl font-semibold text-center mb-[16px]">Our Partners</div>
        <div class="font-light font-[#E5E5E5] text-center mb-[50px] leading-8">Meet the valued partners who help us
            build<br />and
            strengthen our
            community every day</div>
        <div class="w-full overflow-hidden outline-none main-carousel">
            @forelse($partners as $partner)
                <div class="flex shrink-0 mr-[46px]">
                    <a href="{{ $partner->url }}"
                        class="rounded-[16px] border border-[#E5E5E5] p-[25px] flex items-center">
                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" />
                    </a>
                </div>
            @empty
                <p>Belum ada data</p>
            @endforelse
        </div>
    </section>

    <section id="Events" class="max-w-[1130px] mx-auto mt-[80px]">
        <div class="flex justify-between items-center mb-[50px]">
            <div class="text-4xl font-semibold leading-[48px]">Latest Events<br />For You</div>
            <a href="#"
                class="rounded-full p-[12px_54px] border border-[#22222] uppercase bg-white text-black font-semibold hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">Explore
                All</a>
        </div>
        <div class="flex items-center justify-between h-fit">
            <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[16px] overflow-hidden">
                <img src="./assets/images/events/event-1.png" class="absolute object-cover w-full h-full thumbnail"
                    alt="icon" />
                <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                </div>
                <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                    <div class="flex flex-col gap-[10px]">
                        <a href="details.html"
                            class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">Rela
                            Tampil Menarik Depan Wanita, Pria Ini Jadi Bahan Bicaraan</a>
                        <p class="text-white">12 Jun, 2024</p>
                    </div>
                </div>
            </div>
            <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
                <div class="w-[455px] flex flex-col gap-5 shrink-0">
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal, begini
                                    tipsnya!</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Gaya pakaian pernikahan artis ini beneran
                                    unik</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Tips bersepeda bareng pasangan baru, makin
                                    seru!
                                </h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                    begini
                                    tipsnya!</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                    begini
                                    tipsnya!</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                    begini
                                    tipsnya!</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div
                    class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
                </div>
            </div>
        </div>
    </section>

    <section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[100px]">
        <div class="flex flex-col gap-3 shrink-0 w-fit">
            <a href="#">
                <div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
                    <img src="./assets/images/ads/banner-wide-1.gif" class="object-cover w-full h-full"
                        alt="ads" />
                </div>
            </a>
            <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
                Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
                        src="./assets/images/icons/message-question.svg" alt="icon" /></a>
            </p>
        </div>
    </section>

    <section id="Articles" class="max-w-[1130px] mx-auto mt-[80px]">
        <div class="flex justify-between items-center mb-[50px]">
            <div class="text-4xl font-semibold leading-[48px]">Latest Articles<br />For You</div>
            <a href="#"
                class="rounded-full p-[12px_54px] border border-[#22222] uppercase bg-white text-black font-semibold hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">Explore
                All</a>
        </div>
        <div class="flex items-center justify-between h-fit">
            <div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[16px] overflow-hidden">
                <img src="./assets/images/events/event-1.png" class="absolute object-cover w-full h-full thumbnail"
                    alt="icon" />
                <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10">
                </div>
                <div class="card-detail w-full flex items-end p-[30px] relative z-20">
                    <div class="flex flex-col gap-[10px]">
                        <a href="details.html"
                            class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">Rela
                            Tampil Menarik Depan Wanita, Pria Ini Jadi Bahan Bicaraan</a>
                        <p class="text-white">12 Jun, 2024</p>
                    </div>
                </div>
            </div>
            <div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
                <div class="w-[455px] flex flex-col gap-5 shrink-0">
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                    begini
                                    tipsnya!</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Gaya pakaian pernikahan artis ini beneran
                                    unik</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Tips bersepeda bareng pasangan baru, makin
                                    seru!
                                </h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                    begini
                                    tipsnya!</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                    begini
                                    tipsnya!</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                    <a href="details.html" class="card py-[2px]">
                        <div
                            class="rounded-[16px] border border-[#E5E5E5] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#2E4DEC] transition-all duration-300">
                            <div class="w-[130px] h-[100px] flex shrink-0 rounded-[16px] overflow-hidden">
                                <img src="./assets/images/events/event-1.png" class="object-cover w-full h-full"
                                    alt="thumbnail" />
                            </div>
                            <div class="flex flex-col justify-center-center gap-[6px]">
                                <h3 class="font-bold text-lg leading-[27px]">Bikin house party tanpa biaya mahal,
                                    begini
                                    tipsnya!</h3>
                                <p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div
                    class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]">
                </div>
            </div>
        </div>
    </section>

    <footer id="Footer" class="mt-[100px] py-[100px] bg-[#F7F8FA]">
        <div class="flex gap-x-24 items-start max-w-[1130px] mx-auto">
            <img src="./assets/images/logos/logo.svg" alt="logo">
            <div>
                <div class="font-semibold text-lg mb-[32px]">Explore</div>
                <div class="flex flex-col gap-y-4">
                    <a href="#">Our Services</a>
                    <a href="#">Spesification</a>
                    <a href="#">Refund</a>
                    <a href="#">Playlist</a>
                </div>
            </div>
            <div>
                <div class="font-semibold text-lg mb-[32px]">Account</div>
                <div class="flex flex-col gap-y-4">
                    <a href="#">My Account</a>
                    <a href="#">Top Benefit</a>
                    <a href="#">How-to Tutorials</a>
                    <a href="#">Moment</a>
                </div>
            </div>
            <div>
                <div class="font-semibold text-lg mb-[32px]">Office</div>
                <div class="flex flex-col gap-y-4">
                    <a href="#">+021 2208 1996</a>
                    <a href="#">Menteng, Palangka Raya</a>
                    <a href="#">No. 1 (NaraiCoder)</a>
                    <a href="#">support@naraicoder.org</a>
                </div>
            </div>
        </div>
    </footer>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="js/carousel.js"></script>

</html>
