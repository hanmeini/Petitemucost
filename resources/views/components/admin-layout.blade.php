<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-t">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts (Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Script Chart.js --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black flex">

            {{-- Panggil komponen sidebar --}}
            <x-admin-sidebar />

            {{-- Container untuk sisa konten --}}
            <div class="flex-1 flex flex-col">

                <!-- Header Halaman -->
                @if (isset($header))
                    <header class="bg-[#1E1E1E] shadow-sm border-b text-white border-gray-600">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Konten Utama (Slot) -->
                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>

            </div>
        </div>

        {{-- TAMBAHKAN WADAH UNTUK SCRIPT DI SINI --}}
        @stack('scripts')
    </body>
</html>

