<div x-data="{ sidebarOpen: $persist(true).as('admin_sidebar_open') }"
     class="flex-shrink-0 bg-white text-gray-600 flex flex-col transition-all duration-300 border-r border-gray-100 h-screen sticky top-0 z-40 shadow-sm"
     :class="sidebarOpen ? 'w-64' : 'w-20'">

    <!-- Logo & Brand -->
    <div class="h-16 flex items-center justify-center border-b border-gray-100" :class="sidebarOpen ? 'px-6' : 'px-4'">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 overflow-hidden group">
            {{-- Logo Gradient Pink --}}
            <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-pink-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-md group-hover:shadow-pink-200 transition-all duration-300">
                <img src="{{ asset('images/logo.png') }}" alt="P" class="w-6 h-6 object-contain brightness-0 invert">
            </div>

            <div x-show="sidebarOpen" class="flex flex-col">
                <span class="text-gray-800 text-lg font-bold tracking-wide whitespace-nowrap font-hellohoney">Pettitemucos</span>
                <span class="text-[10px] text-gray-400 font-medium uppercase tracking-widest">Admin Panel</span>
            </div>
        </a>
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex-grow p-4 space-y-1 overflow-y-auto custom-scrollbar">
        {{-- Dashboard --}}
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" ::sidebar-open="sidebarOpen">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
            </x-slot>
            {{ __('Dashboard') }}
        </x-nav-link>

        {{-- Pemisah --}}
        <div class="my-4 border-t border-gray-100 mx-2"></div>

        <x-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')" ::sidebar-open="sidebarOpen">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
            </x-slot>
            {{ __('Kelola Layanan') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.portfolios.index')" :active="request()->routeIs('admin.portfolios.*')" ::sidebar-open="sidebarOpen">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </x-slot>
            {{ __('Kelola Portofolio') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.*')" ::sidebar-open="sidebarOpen">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </x-slot>
            {{ __('Kelola Event') }}
        </x-nav-link>

        <div class="my-4 border-t border-gray-100 mx-2"></div>

        <x-nav-link :href="route('admin.bookings.index')" :active="request()->routeIs('admin.bookings.*')" ::sidebar-open="sidebarOpen" :badge="$adminNotificationCount ?? null">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
            </x-slot>
            {{ __('Kelola Booking') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.testimonials.index')" :active="request()->routeIs('admin.testimonials.*')" ::sidebar-open="sidebarOpen">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.98 9.921c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
            </x-slot>
            {{ __('Kelola Testimoni') }}
        </x-nav-link>
    </nav>

    <!-- Footer Sidebar -->
    <div class="p-3 border-t border-gray-100 bg-gray-50">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center gap-4 p-3 rounded-lg text-gray-500 hover:bg-pink-50 hover:text-pink-600 transition-all duration-200 group" :class="!sidebarOpen && 'justify-center'">
                <div class="flex-shrink-0 w-5 h-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                </div>
                <span class="flex-1 whitespace-nowrap font-medium" x-show="sidebarOpen">Keluar</span>
            </a>
        </form>
        <button @click="sidebarOpen = !sidebarOpen" class="mt-2 w-full flex items-center justify-center p-2 rounded-lg text-gray-400 hover:bg-gray-200 hover:text-gray-600 transition-colors duration-200">
            <svg class="w-5 h-5 transition-transform duration-300" :class="sidebarOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
        </button>
    </div>
</div>
