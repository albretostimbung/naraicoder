<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="flex h-[100vh] justify-between gap-7 md:p-[5%] lg:px-[10%]">
        <div class="w-1/2">
            <img src="{{ asset('assets/images/sign-in-image.svg') }}" alt="" class="w-[500px] h-[500px]" />
        </div>
        <section class="w-1/2">
            <h1 class="mb-5 text-2xl font-semibold">Sign In</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="h-[60px] mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                        Email
                    </label>
                    <input type="email" name="email"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Email address" />
                    @error('email')
                        <div>
                            <p class="text-xs font-medium text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="h-[60px]">
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                        Password
                    </label>
                    <input type="password" name="password"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Password" />
                    @error('password')
                        <div>
                            <p class="text-xs font-medium text-red-700">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <p class="py-4 text-sm">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </p>

                <button type="submit"
                    class="flex justify-center w-full py-3 text-sm text-white bg-blue-600 rounded-lg cursor-pointer">Sign
                    In</button>
            </form>
            <div class="flex justify-center mt-2 ">
                <p class="text-sm">Don’t have an account? <span class="font-semibold text-primary">
                        <a href="{{ route('register') }}">Sign Up</a>
                    </span></p>
            </div>
        </section>
    </div>
</body>

</html>
