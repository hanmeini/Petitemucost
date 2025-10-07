<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex flex-col min-h-screen">

            {{-- 1. Panggil Komponen Navbar di sini --}}
            <x-navbar />

            {{-- 2. Konten Utama (Slot) --}}
            {{-- Bagian ini akan diisi oleh setiap halaman yang menggunakan layout ini --}}
            <main class="flex-grow">
                {{ $slot }}
            </main>

            {{-- 3. Panggil Komponen Footer di sini --}}
            <x-footer />

        </div>
    </body>
</html>
