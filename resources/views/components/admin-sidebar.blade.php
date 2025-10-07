<aside class="w-64 flex-shrink-0 bg-white border-r border-gray-200">
    <div class="p-4">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
            {{-- Ganti dengan logo Anda jika ada --}}
            <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.25278C12 6.25278 6.75 3 4.5 3C2.25 3 0 5.25278 0 7.50556C0 12.7611 12 21 12 21C12 21 24 12.7611 24 7.50556C24 5.25278 21.75 3 19.5 3C17.25 3 12 6.25278 12 6.25278Z" />
            </svg>
            <span class="text-xl font-semibold text-gray-800">Admin MUA</span>
        </a>
    </div>

    <nav class="mt-6 px-2 flex flex-col space-y-4">
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>

        <h3 class="px-4 mt-6 mb-2 text-xs uppercase text-gray-500 font-bold">
            Manajemen
        </h3>

        <x-nav-link href="/admin/services" :active="request()->routeIs('services.*')">
            {{ __('Kelola Layanan') }}
        </x-nav-link>

        <x-nav-link :href="route('portfolios.index')" :active="request()->routeIs('portfolios.*')">
            {{ __('Kelola Portfolio') }}
        </x-nav-link>

        <x-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.*')">
            {{ __('Kelola Booking') }}
        </x-nav-link>
    </nav>
</aside>
