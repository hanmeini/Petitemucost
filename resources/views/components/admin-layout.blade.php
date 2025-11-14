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

        {{-- Kita tambahkan script Alpine.js $persist biar status sidebar-nya diingat --}}
        <script src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased text-white bg-[#1E1E1E]">
        <div x-data="{
                sidebarOpen: $persist(true).as('admin_sidebar_open'),
                mobileMenuOpen: false
             }"
             class="flex min-h-screen">
            <x-admin-sidebar :sidebar-open="true" /> {{-- Akan kita buat dinamis di langkah 2 --}}

            {{-- === SIDEBAR MOBILE (DRAWER) === --}}
            <div x-show="mobileMenuOpen" class="fixed inset-0 z-50 flex lg:hidden" style="display: none;">
                {{-- Overlay --}}
                <div x-show="mobileMenuOpen"
                     @click="mobileMenuOpen = false"
                     x-transition:enter="transition-opacity ease-linear duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition-opacity ease-linear duration-300"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-black/50 backdrop-blur-sm"></div>

                {{-- Konten Sidebar Mobile (kita panggil komponen yang sama) --}}
                <div x-show="mobileMenuOpen"
                     x-transition:enter="transition ease-in-out duration-300 transform"
                     x-transition:enter-start="-translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transition ease-in-out duration-300 transform"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="-translate-x-full"
                     class="relative w-64">
                    <x-admin-sidebar :sidebar-open="true" />
                </div>
            </div>

            {{-- === KONTEN UTAMA === --}}
            <div class="flex-1 flex flex-col w-full">

                <!-- Header Atas (Sekarang ada tombol Hamburger) -->
                <header class="sticky top-0 z-30 bg-[#1E1E1E]/80 backdrop-blur-md border-b border-gray-700">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            {{-- Tombol Hamburger (hanya tampil di mobile) --}}
                            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-400 hover:text-white lg:hidden">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>

                            {{-- Judul Halaman ($header) --}}
                            <div class="flex items-center">
                                <div class="font-semibold text-xl text-white leading-tight">
                                    {{ $header }}
                                </div>
                            </div>

                            {{-- Spacer (biar judul di tengah kalau mau) --}}
                            <div class="hidden lg:block"></div>
                        </div>
                    </div>
                </header>

                <!-- Konten Halaman (Slot) -->
                <main class="flex-1 p-4 sm:p-6 lg:p-8">
                    {{ $slot }}
                </main>

            </div>
        </div>

        @stack('scripts')
    </body>
</html>
