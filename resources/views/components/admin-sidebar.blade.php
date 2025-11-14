<div x-data="{ sidebarOpen: $persist(true).as('admin_sidebar_open') }"
     class="flex-shrink-0 bg-[#1E1E1E] text-gray-300 flex flex-col transition-all duration-300"
     :class="sidebarOpen ? 'w-64' : 'w-30'">

    <!-- Logo -->
    <div class="h-16 flex items-center justify-center border-b border-gray-700" :class="sidebarOpen ? 'px-6' : 'px-4'">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 overflow-hidden">
            <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center text-white font-bold text-lg shadow-md">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PetiteMucost" class="w-full h-full object-cover">
            </div>
            <span x-show="sidebarOpen" x-transition:enter="transition-opacity duration-300" x-transition:leave="transition-opacity duration-100"
                  class="text-white text-lg font-bold whitespace-nowrap">ADMIN</span>
        </a>
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex-grow p-4 space-y-2 overflow-y-auto border-r border-gray-700">
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" :sidebar-open="true">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6-4a1 1 0 001-1v-1a1 1 0 10-2 0v1a1 1 0 001 1z" /></svg>
            </x-slot>
            {{ __('Dashboard') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')" :sidebar-open="true">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16v4m-2-2h4m5 16v4m-2-2h4M19 5v4m-2-2h4M12 3v4m-2-2h4M12 17v4m-2-2h4" /></svg>
            </x-slot>
            {{ __('Kelola Layanan') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.portfolios.index')" :active="request()->routeIs('admin.portfolios.*')" :sidebar-open="true">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </x-slot>
            {{ __('Kelola Portofolio') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.bookings.index')" :active="request()->routeIs('admin.bookings.*')" ::sidebar-open="sidebarOpen" :badge="$adminNotificationCount > 0 ? $adminNotificationCount : null">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </x-slot>
            {{ __('Kelola Booking') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.*')" :sidebar-open="true">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </x-slot>
            {{ __('Kelola Event') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.testimonials.index')" :active="request()->routeIs('admin.testimonials.*')" :sidebar-open="true">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.98 9.921c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
            </x-slot>
            {{ __('Kelola Testimoni') }}
        </x-nav-link>

    </nav>

    <!-- Tombol Toggle (Lipat/Buka) -->
    <div class="p-4 border-t border-gray-700">
        <button @click="sidebarOpen = !sidebarOpen"
                class="flex items-center justify-center w-full p-2 rounded-lg text-gray-400 hover:bg-gray-700 hover:text-white transition-colors">
            {{-- Ikon panah kiri (jika terbuka) --}}
            <svg x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path></svg>
            {{-- Ikon panah kanan (jika terlipat) --}}
            <svg x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
        </button>
    </div>
</div>
