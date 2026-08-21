<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Permana Laundry — Laundry Bersih, Cepat, Terpercaya')</title>
    <meta name="description" content="@yield('description', 'Layanan laundry kiloan dan express di Tangerang. Hitung estimasi harga cucianmu secara instan.')">
    <link rel="icon" href="{{ asset('icons/favicon.png') }}"/>

    {{-- Font: Inter untuk tipografi yang rapi & netral --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{--
        Asumsi: project Laravel-mu sudah setup Tailwind via Vite (standar sejak
        Laravel 9+). Jika belum, jalankan:
            npm install -D tailwindcss postcss autoprefixer
            npx tailwindcss init -p
        lalu pastikan resources/css/app.css berisi @tailwind base/components/utilities
        dan file ini terhubung lewat @vite bawaan Laravel.
    --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', ui-sans-serif, system-ui, sans-serif; }
        /* Sembunyikan elemen ber-x-cloak sampai Alpine.js selesai load,
           mencegah "kedipan" konten sebelum interaktivitas siap. */
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-white text-slate-700 antialiased">
    @yield('content')
</body>
</html>
