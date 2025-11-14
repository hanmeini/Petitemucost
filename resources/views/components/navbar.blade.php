<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50 w-full">
    <!-- Primary Navigation Menu -->
    <div class="items-center justify-center px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="flex justify-between h-20">
                <!-- Logo -->
                <div class="shrink-0 flex flex-row items-center gap-2 justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="logo Pettitemucos" class="w-10 h-10 object-cover">
                    <a href="{{ route('home') }}" class="text-2xl font-bold">
                        Pettitemucos
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-indigo-400 text-gray-900' : 'border-transparent text-gray-500' }} hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        {{ __('Beranda') }}
                    </a>
                    <a href="{{ route('services.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('services.*') ? 'border-indigo-400 text-gray-900' : 'border-transparent text-gray-500' }} hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        {{ __('Layanan') }}
                    </a>
                    <a href="{{ route('portfolios.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('portfolios.*') ? 'border-indigo-400 text-gray-900' : 'border-transparent text-gray-500' }} hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        {{ __('Portofolio') }}
                    </a>
                </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    @if(Auth::user()->role == 'client')
                    <a href="{{ route('notifications.index') }}" class="relative p-2 mr-3 text-gray-500 hover:text-pink-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                        {{-- Lingkaran Notifikasi --}}
                        @if($unreadNotificationsCount > 0)
                            <span class="absolute top-1 right-1 flex h-4 w-4">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                                <span class="relative inline-flex items-center justify-center rounded-full h-4 w-4 bg-pink-500 text-white text-[10px] font-bold">
                                    {{ $unreadNotificationsCount }}
                                </span>
                            </span>
                        @endif
                    </a>
                    @endif
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>Hi, {{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            {{-- LOGIKA DASHBOARD BERDASARKAN ROLE --}}
                            @if(Auth::user()->role === 'admin')
                                <x-dropdown-link :href="route('admin.dashboard')">
                                    {{ __('Admin Dashboard') }}
                                </x-dropdown-link>
                            @else
                                <x-dropdown-link :href="route('dashboard')">
                                    {{ __('Dashboard Saya') }}
                                </x-dropdown-link>
                            @endif

                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-pink-600 transition-colors font-medium">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-pink-600 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-700 active:bg-pink-900 focus:outline-none focus:border-pink-900 focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Register
                            </a>
                        @endif
                    </div>
                @endauth
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                @auth
                    {{-- Lonceng Notifikasi (HANYA MOBILE) --}}
                    @if(Auth::user()->role == 'client')
                    <a href="{{ route('notifications.index') }}" class="relative p-2 mr-1 text-gray-500 hover:text-pink-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                        @if($unreadNotificationsCount > 0)
                            <span class="absolute top-1 right-1 flex h-4 w-4">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                                <span class="relative inline-flex items-center justify-center rounded-full h-4 w-4 bg-pink-500 text-white text-[10px] font-bold">
                                    {{ $unreadNotificationsCount }}
                                </span>
                            </span>
                        @endif
                    </a>
                    @endif
                @endauth

                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Latar Belakang Overlay (Saat Menu Mobile Terbuka) -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-40 bg-black/30 backdrop-blur-sm sm:hidden"
         @click="open = false"
         style="display: none;">
    </div>

    <!-- Panel Sidebar Menu Mobile (Slide dari Kanan) -->
    <div x-show="open"
         x-transition:enter="transition ease-in-out duration-300 transform"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in-out duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed top-0 right-0 h-full w-80 max-w-[calc(100%-3rem)] bg-white rounded-l-3xl shadow-2xl z-50 flex flex-col"
         @click.away="open = false"
         style="display: none;">

        @auth
            <!-- Bagian Profile (Sesuai Desain) -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center gap-4">
                    <img class="h-16 w-16 rounded-full object-cover shadow-sm"
                         src="{{ Auth::user()->avatar ?? 'https://placehold.co/100x100/fce7f3/d15b88?text=' . strtoupper(substr(Auth::user()->name, 0, 1)) }}"
                         alt="Profile">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                        <a href="{{ route('profile.edit') }}" class="text-sm text-gray-500 hover:text-pink-600 transition-colors">
                            Lihat profile
                        </a>
                    </div>
                </div>
            </div>
        @endauth

        <!-- Menu Links -->
        <nav class="flex-grow p-6 space-y-2">
            @auth
                {{-- Logika Dashboard untuk User Login --}}
                @if(Auth::user()->role === 'admin')
                    <x-mobile-nav-link :href="route('admin.dashboard')" :icon="'grid'">
                        Admin Dashboard
                    </x-mobile-nav-link>
                @else
                    <x-mobile-nav-link :href="route('dashboard')" :icon="'grid'">
                        Dashboard Saya
                    </x-mobile-nav-link>
                @endif
                <x-mobile-nav-link :href="route('profile.edit')" :icon="'user'">
                    Profile Saya
                </x-mobile-nav-link>
                @if(Auth::user()->role == 'client')
                    <x-mobile-nav-link :href="route('notifications.index')" class="flex items-center relative text-sm text-gray-600 hover:text-pink-600 mt-5 p-3 rounded-lg">
                        @if($unreadNotificationsCount > 0)
                            <span class="absolute left-7 top-0 w-5 h-5 bg-pink-500 text-white text-xs font-bold rounded-full flex items-center justify-center">
                                {{ $unreadNotificationsCount }}
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                            </span>
                        @endif
                        <span class="font-medium">Notifikasi</span>
                    </x-mobile-nav-link>
                @endif
                <div class="pt-4 pb-2">
                    <div class="border-t border-gray-100"></div>
                </div>
            @endauth

            {{-- Menu Publik --}}
            <x-mobile-nav-link :href="route('home')" :icon="'home'">
                Beranda
            </x-mobile-nav-link>
            <x-mobile-nav-link :href="route('services.index')" :icon="'sparkles'">
                Layanan
            </x-mobile-nav-link>
            <x-mobile-nav-link :href="route('portfolios.index')" :icon="'image'">
                Portofolio
            </x-mobile-nav-link>
        </nav>

        <!-- Logout / Login Section -->
        <div class="p-6 border-t border-gray-100">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="flex items-center gap-4 text-gray-700 hover:text-pink-600 transition-colors font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="font-medium">Log Out</span>
                    </a>
                </form>
            @else
                <div class="space-y-3">
                    <a href="{{ route('login') }}" class="block w-full text-center px-4 py-3 bg-gray-50 text-gray-700 rounded-xl font-semibold text-sm hover:bg-gray-100">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block w-full text-center px-4 py-3 bg-pink-600 text-white rounded-xl font-semibold text-sm hover:bg-pink-700">
                            Register
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>
