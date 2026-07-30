<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">

        <!-- SEO Dasar -->
        <title>{{ $title ?? 'Pettitemucos - Spesialis Cosplay & Douyin Makeup Semarang' }}</title>
        <meta name="description" content="{{ $description ?? 'Menghidupkan karakter impianmu lewat seni makeup yang detail dan profesional. Booking jadwal makeup cosplay dan photoshoot kamu sekarang!' }}">
        <meta name="keywords" content="makeup cosplay, makeup douyin, MUA semarang, pettitemucos, makeup karakter, sewa makeup">
        <meta name="author" content="Pettitemucos">

        <!-- Open Graph / Facebook / WhatsApp -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $title ?? 'Pettitemucos - Spesialis Cosplay & Douyin Makeup Semarang' }}">
        <meta property="og:description" content="{{ $description ?? 'Menghidupkan karakter impianmu lewat seni makeup yang detail dan profesional.' }}">
        <meta property="og:image" content="{{ $ogImage ?? asset('images/logo.png') }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="{{ $title ?? 'Pettitemucos - Spesialis Cosplay & Douyin Makeup' }}">
        <meta property="twitter:description" content="{{ $description ?? 'Menghidupkan karakter impianmu lewat seni makeup yang detail dan profesional.' }}">
        <meta property="twitter:image" content="{{ $ogImage ?? asset('images/logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex flex-col min-h-screen">
            <x-navbar />
            <main class="flex-grow">
                {{ $slot }}
            </main>
            <x-footer />

        </div>
    </body>
</html>
