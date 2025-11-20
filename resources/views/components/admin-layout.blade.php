@props(['header' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    {{-- UBAH DI SINI: Background terang --}}
    <body class="font-sans antialiased text-gray-900 bg-gray-50">

        <div x-data="{
                sidebarOpen: $persist(true).as('admin_sidebar_open'),
                mobileMenuOpen: false
             }"
             class="flex min-h-screen">

            {{-- Sidebar Desktop --}}
            <x-admin-sidebar :sidebar-open="true" />

            {{-- Sidebar Mobile --}}
            <div x-show="mobileMenuOpen" class="fixed inset-0 z-50 flex lg:hidden" style="display: none;">
                <div x-show="mobileMenuOpen" @click="mobileMenuOpen = false" class="fixed inset-0 bg-gray-900/20 backdrop-blur-sm"></div>
                <div x-show="mobileMenuOpen" class="relative w-64">
                    <x-admin-sidebar :sidebar-open="true" />
                </div>
            </div>

            {{-- Konten Utama --}}
            <div class="flex-1 flex flex-col w-full transition-all duration-300">

                <!-- Header Putih dengan Shadow Halus -->
                <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 hover:text-pink-600 lg:hidden">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>

                            <div class="flex items-center w-full">
                                <div class="font-bold text-xl text-gray-800 leading-tight w-full">
                                    {{ $header }}
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <main class="flex-1 p-4 sm:p-6 lg:p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
