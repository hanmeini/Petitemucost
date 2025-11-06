<nav class="bg-white transition-colors duration-300 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div id="text" class="flex justify-between items-center h-16 text-gray-900">
                    {{-- Logo atau Nama Website --}}
                    <div class="flex-shrink-0">
                        <a href="/" class="text-xl font-bold ">Pettitemucos</a>
                    </div>

                    {{-- Menu Navigasi (Desktop) --}}
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8 font-semibold text-md trantition-transform">
                        <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2
                                {{ request()->routeIs('/') ? 'border-pink-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                            Beranda
                        </a>
                        <a href="{{ route('services.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2
                                {{ request()->routeIs('services.index') ? 'border-pink-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                            Layanan
                        </a>
                        <a href="{{ route('portfolios.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2
                                {{ request()->routeIs('portfolios.index') ? 'border-pink-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                            Portofolio
                        </a>
                        <a href="/contact" class="inline-flex items-center px-1 pt-1 border-b-2
                                {{ request()->routeIs('contact') ? 'border-pink-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                            Kontak
                        </a>
                    </div>

                    {{-- Tombol Login/Register --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm ">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm ">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
    </div>
</nav>

