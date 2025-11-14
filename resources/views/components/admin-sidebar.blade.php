{{-- Ini adalah komponen untuk sidebar admin --}}
<div class="flex-shrink-0 w-64 bg-[#1E1E1E] text-gray-300 flex flex-col">
    <!-- Logo atau Judul Panel -->
    <div class="h-16 flex items-center justify-center border-b border-gray-700">
        <span class="text-white text-xl font-bold">ADMIN MUA</span>
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex-col flex p-4 space-y-4">

        <!-- Link Dashboard -->
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>

        <!-- Link Kelola Layanan (Perbaiki di sini) -->
        <x-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')">
            {{ __('Kelola Layanan') }}
        </x-nav-link>

        <!-- Link Kelola Portofolio (Perbaiki di sini) -->
        <x-nav-link :href="route('admin.portfolios.index')" :active="request()->routeIs('admin.portfolios.*')">
            {{ __('Kelola Portofolio') }}
        </x-nav-link>

        <!-- Link Kelola Booking (Perbaiki di sini) -->
        <x-nav-link :href="route('admin.bookings.index')" :active="request()->routeIs('admin.bookings.*')">
            {{ __('Kelola Booking') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.*')">
            {{ __('Kelola Event') }}
        </x-nav-link>

        <x-nav-link :href="route('admin.testimonials.index')" :active="request()->routeIs('admin.testimonials.*')">
            {{ __('Kelola Testimoni') }}
        </x-nav-link>
    </nav>
    <div class="p-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="w-full text-left">
                {{ __('Log Out') }}
            </x-nav-link>
        </form>
    </div>
</div>
