<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'NaraiCoder – Komunitas IT Kalimantan Tengah' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap"
          rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Alpine.js -->
    @include('partials.alpine')

    <style>
        body { font-family: 'Poppins', sans-serif; }
        html {
            scroll-behavior: smooth;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800">

<x-navbar />

<main>
    {{ $slot }}
</main>

<x-footer />

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true, offset: 100 });

    document.querySelectorAll('[data-scroll]').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.getElementById(this.dataset.scroll);
            if (!target) return;
            history.replaceState(null, '', window.location.pathname);
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
</script>

@stack('scripts')
</body>
</html>
