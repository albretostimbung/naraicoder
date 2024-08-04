<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    @vite(['resources/js/app.js'])
    <style>
        .owl-dot {
            background: #1977F3;
            border-radius: 50%;
            width: 12px;
            height: 12px;
            margin: 0 5px;
        }

        .owl-dot.active {
            background: #ffffff;
        }

        .owl-nav button {
            background: #1977F3;
            border: none;
            color: #fff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            line-height: 30px;
            font-size: 16px;
        }

        .owl-nav button.owl-prev {
            left: 10px;
            font-size: 16px;
        }

        .owl-nav button.owl-next {
            right: 10px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="fixed top-0 z-20 w-full bg-white border-gray-200 start-0">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <image
                    src="{{ App\Models\CommunityProfile::first()->logo ? asset('storage/' . App\Models\CommunityProfile::first()->logo) : asset('assets/images/logo.png') }}"
                    class="w-[249px] h-[84px]" alt="Logo" />
            </a>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                    <a href="#"
                        class="block px-3 py-2 {{ request()->routeIs('home') ? 'text-blue-500' : 'text-black' }} rounded md:bg-transparent md:p-0">Home</a>
                    <a href="#" class="block px-3 py-2 text-black rounded md:bg-transparent md:p-0">Articles</a>
                    <a href="#" class="block px-3 py-2 text-black rounded md:bg-transparent md:p-0">About</a>
                    <a href="#" class="block px-3 py-2 text-black rounded md:bg-transparent md:p-0">Contact</a>
                    <a href="{{ json_decode(App\Models\CommunityProfile::first()->social_media)->instagram ?? '#' }}"
                        class="block px-3 py-2 text-2xl text-black rounded md:bg-transparent md:p-0">
                        <img src="{{ asset('assets/svgs/ic-instagram.svg') }}" alt="Instagram" />
                    </a>
                    <a href="{{ json_decode(App\Models\CommunityProfile::first()->social_media)->youtube ?? '#' }}"
                        class="block px-3 py-2 text-2xl text-black rounded md:bg-transparent md:p-0">
                        <img src="{{ asset('assets/svgs/ic-youtube.svg') }}" alt="Youtube" />
                    </a>
                    <a href="{{ json_decode(App\Models\CommunityProfile::first()->social_media)->linkedin ?? '#' }}"
                        class="block px-3 py-2 text-2xl text-black rounded md:bg-transparent md:p-0">
                        <img src="{{ asset('assets/svgs/ic-linkedin.svg') }}" alt="Linkedin" />
                    </a>
                    <a class="block px-3 py-2 text-black rounded md:bg-transparent md:p-0"
                        href="{{ route('login') }}">Sign In</a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div style="background-color: #F6F6F6" class="py-16">
        <div class="mx-8 mt-36">
            <div class="flex flex-wrap w-full justify-evenly">
                <div>
                    <h1 class="text-2xl font-bold w-96">
                        Bertumbuh dengan kolaborasi, Menuju visi &quot;Bersinergi, Berkolaborasi dan
                        Berinovasi&quot;
                    </h1>
                    <div class="mt-4">
                        <a href="{{ route('login') }}" style="background-color: #0F3F62"
                            class="px-3 py-2 font-medium text-white duration-100 ease-in-out rounded-md hover:bg-blue-700">
                            Bergabung
                        </a>
                    </div>
                </div>
                <div>
                    <Image src="{{ asset('assets/images/home-croods-1.webp') }}" width={476} height={323}
                        alt="Hero" />
                </div>
            </div>
        </div>
    </div>

    <!-- Our Partnership -->
    <div class="my-20">
        <h1 class="mb-4 text-4xl font-bold text-center">Our Partnership</h1>
        <div class="w-[80rem] m-auto flex flex-wrap justify-center items-center gap-8">
            @foreach ($partners as $partner)
                <div class="mt-4 bg-gray-200 w-[243px] h-[105px] flex justify-center items-center rounded-md">
                    <a href="{{ $partner->website }}" target="_blank">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt={{ $partner->name }}
                            class="object-contain w-[180px] h-[100px] p-2" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Event -->
    <div class="mb-20">
        <h1 class="mb-4 text-4xl font-bold text-center">Event</h1>
        <div class="w-[80rem] m-auto flex flex-wrap justify-center items-center gap-8">
            <!-- Owl Carousel -->
            <div class="items-center owl-carousel">
                @foreach ($events as $event)
                    @foreach ($event->event_images as $image)
                        <div class="item">
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/' . $image->image) }}"
                                    class="!w-[926px] !h-[508px] object-fit" alt="{{ $event->title }}" />
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <!-- Event / Blog -->
    <div class="mb-20">
        <h1 class="mb-4 text-4xl font-bold text-center">Article</h1>
        <div class="w-[70rem] m-auto flex flex-wrap justify-center items-center gap-8">
            @foreach ($articles as $article)
                <div class="w-[300px] h-[382px] bg-white rounded-md shadow-md">
                    <img src="{{ asset('storage/' . $article->image) }}" alt={{ $article->name }}
                        class="w-full h-44 rounded-t-md w-[200px] h-[200px]" />

                    <div class="p-4">
                        <div class="mb-4">
                            <h1 class="mb-2 text-lg font-bold">{{ $article->name }}</h1>
                            <p class="text-sm text-gray-500">{!! Illuminate\Support\Str::limit($article->content, 100) !!}</p>
                        </div>
                        <footer class="flex items-center justify-between">
                            <div class="text-gray-500">{{ $article->created_at->format('d F Y') }}</div>
                            <a href="#" class="font-bold">
                                Read More
                            </a>
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-4 bg-white border-t-2 border-gray-200">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-8 mx-auto">
            <div class="text-lg font-bold">{{ config('app.name') }} {{ date('Y') }}</div>
            <div>
                <ul class="flex flex-wrap gap-x-8">
                    <li>
                        <a href="{{ json_decode(App\Models\CommunityProfile::first()->social_media)->instagram ?? '#' }}"
                            className="block py-2 px-3 rounded md:border-0 md:p-0 text-black md:hover:text-blue-500 hover:text-white text-2xl">
                            <img src="{{ asset('assets/svgs/ic-instagram.svg') }}" alt="Instagram" />
                        </a>
                    </li>
                    <li>
                        <a href="{{ json_decode(App\Models\CommunityProfile::first()->social_media)->youtube ?? '#' }}"
                            className="block py-2 px-3 rounded md:border-0 md:p-0 text-black md:hover:text-blue-500 hover:text-white text-2xl">
                            <img src="{{ asset('assets/svgs/ic-youtube.svg') }}" alt="Youtube" />
                        </a>
                    </li>
                    <li>
                        <a href="{{ json_decode(App\Models\CommunityProfile::first()->social_media)->linkedin ?? '#' }}"
                            className="block py-2 px-3 rounded md:border-0 md:p-0 text-black md:hover:text-blue-500 hover:text-white text-2xl">
                            <img src="{{ asset('assets/svgs/ic-linkedin.svg') }}" alt="linkedin" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- jQuery (necessary for Owl Carousel) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                nav: true
            });

            $('.owl-nav').addClass('flex justify-center');
        });
    </script>
</body>

</html>
