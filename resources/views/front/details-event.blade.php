<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaraiCoder</title>
    <link href="{{ asset('output.css') }}" rel="stylesheet" />
    <link href="{{ asset('main.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
</head>

<body class="font-[Poppins]">
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center my-[10px] px-4 md:px-0">
        <div class="logo-container flex gap-[30px] items-center">
            <a href="{{ route('front.index') }}" class="flex shrink-0">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="logo" />
            </a>
        </div>
        <div class="hidden md:flex">
            <a href="{{ route('front.index') }}" class="font-medium gap-[10px] p-[12px_22px]">Home</a>
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

    <div id="mobile-menu" class="hidden md:hidden">
        <a href="{{ route('front.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Home</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Articles</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">About</a>
        <a href="#" class="block py-2 px-4 text-sm hover:bg-gray-200">Contact</a>
    </div>

    <section id="Hero" class="max-w-[1130px] mx-auto"
        style="background-image: url('{{ asset('assets/images/hero-image-2.svg') }}'); background-repeat: no-repeat; background-size: contain;">
        <div class="text-center text-[#0F3F62] pt-[100px]">
            <h2 class="text-2xl font-semibold leading-[30px] max-w-[700px] mx-auto">{{ $event->name }}</h2>
            <p class="text-md font-light mt-[10px]">{{ $event->created_at->format('d F Y') }} |
                {{ $event->is_online ? 'Online' : 'Offline' }}</p>
        </div>
        <div class="text-center mt-[30px]">
            <a href="#"
                class="inline-block rounded-full px-[54px] py-[12px] bg-[#2E4DEC] hover:bg-[#0F3F62] text-white font-semibold uppercase transition-all duration-300">Register</a>
        </div>
        <div class="bg-[#2A5675] mt-[30px] text-center">
            <img src="{{ Storage::url($event->thumbnail) }}" alt="{{ $event->name }}"
                class="inline-block w-[500px] py-[50px]">
        </div>
    </section>

    <footer id="Footer" class="py-[100px] bg-[#F7F8FA]">
        <div class="flex gap-x-24 items-start max-w-[1130px] mx-auto">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="logo">
            </a>
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
                <div class="font-semibold text-lg mb-[36px]">Account</div>
                <div class="flex flex-col gap-y-4">
                    <a href="#">My Account</a>
                    <a href="#">Top Benefit</a>
                    <a href="#">How-to Tutorials</a>
                    <a href="#">Moment</a>
                </div>
            </div>
            <div>
                <div class="font-semibold text-lg mb-[36px]">Office</div>
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
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden')
    });
</script>

</html>
