<nav id="main-navbar" class="bg-transparent transition-colors duration-300 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div id="text" class="flex justify-between items-center h-16 text-white">
                    {{-- Logo atau Nama Website --}}
                    <div class="flex-shrink-0">
                        <a href="/" class="text-xl font-bold ">Pettitemucos</a>
                    </div>

                    {{-- Menu Navigasi (Desktop) --}}
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 border-pink-700 text-sm font-medium ">
                            Beranda
                        </a>
                        <a href="services" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium  hover:border-gray-300">
                            Layanan
                        </a>
                        <a href="portfolio" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium  hover:border-gray-300 ">
                            Portofolio
                        </a>
                        <a href="contact" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium  hover:border-gray-300 ">
                            Kontak
                        </a>
                    </div>

                    {{-- Tombol Login/Register --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm  underline">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
    </div>
</nav>

<script>
    document.addEventListener('scroll', function() {
        const navbar = document.getElementById('main-navbar');
        const textnav = document.getElementById('text');
        if (window.scrollY > 100) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-white');
            textnav.classList.remove('text-white');
            textnav.classList.add('text-gray-900');
        } else {
            navbar.classList.remove('bg-white');
            navbar.classList.add('bg-transparent');
            textnav.classList.remove('text-gray-900');
            textnav.classList.add('text-white');
        }
    });
</script>

