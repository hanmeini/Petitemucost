<x-main-layout>

    {{-- Bagian ini akan mengisi slot utama di dalam main-layout --}}
    <div class="text-white -mt-16">
        {{-- Hero Section --}}
        <div
            class="relative min-h-screen flex items-center"
            style="background: url('{{ asset('build/assets/images/jase-bloor-oCZHIa1D4EU-unsplash.jpg') }}') center center / cover no-repeat;"
        >
            {{-- Overlay agar teks tetap jelas --}}
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-white/20"></div>
            <div class="relative w-full h-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Kiri: Penjelasan & Tombol CTA --}}
                <div class="text-center items-center lg:text-left p-8 lg:p-20 pt-10 z-10 text-white">
                    <h1 class="text-3xl font-extrabold tracking-tight leading-tight mb-4">
                        Wujudkan Karakter Impianmu dengan <br> <span class="text-6xl">Pettitemucos</span>
                    </h1>
                    <p class="text-lg lg:text-xl text-gray-200 mb-8">
                        Spesialis makeup cosplay dan Douyin yang mengubah imajinasi menjadi kenyataan. Cepat, detail, dan siap untuk event besarmu.
                    </p>
                    <a href="#" class="inline-block bg-pink-600 text-white font-bold text-lg px-8 py-3 rounded-lg hover:bg-pink-700 transition duration-300 transform hover:scale-105 mb-8">
                        Lihat Jadwal & Layanan
                    </a>
                    {{-- Stats Section --}}
                    <div class="grid grid-cols-3 gap-6 mt-8 text-center">
                        <div class="bg-black/40 rounded-xl p-6 text-white flex flex-col items-center">
                            <span class="text-3xl font-extrabold mb-2">100+</span>
                            <span class="text-sm">Pelanggan Puas</span>
                        </div>
                        <div class="bg-black/40 rounded-xl p-6 text-white flex flex-col items-center">
                            <span class="text-3xl font-extrabold  mb-2">100+</span>
                            <span class="text-sm">Model Makeup</span>
                        </div>
                        <div class="bg-black/40 rounded-xl p-6 text-white flex flex-col items-center">
                            <span class="text-3xl font-extrabold  mb-2">20+</span>
                            <span class="text-sm">Model Cosplay</span>
                        </div>
                    </div>
                </div>

                {{-- Kanan: Gambar Utama --}}
                <div class="hidden lg:flex w-full h-screen justify-end items-center relative z-10">
                    <div class="absolute inset-0 bg-purple-500 rounded-full blur-3xl opacity-30"></div>
                    <img src="{{ asset('build/assets/images/herobg.png') }}" alt="Contoh Makeup Cosplay" class="relative w-3/4 h-full object-cover rounded-lg shadow-2xl">
                </div>
            </div>
        </div>

        {{-- Portofolio Singkat --}}
        <div class="py-24 bg-gray-900/50">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-2">Karya Terbaru Kami</h2>
                <p class="text-center text-gray-400 mb-12">Beberapa hasil makeup yang paling disukai oleh klien kami.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    {{-- Card 1 --}}
                    <div class="bg-gray-800 rounded-lg overflow-hidden transform hover:-translate-y-2 transition duration-300 shadow-lg">
                        <img src="https://placehold.co/400x500/1a1a1a/ffffff?text=Portofolio+1" alt="Portofolio 1" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold">Makeup Douyin Elegan</h3>
                        </div>
                    </div>
                    {{-- Card 2 --}}
                    <div class="bg-gray-800 rounded-lg overflow-hidden transform hover:-translate-y-2 transition duration-300 shadow-lg">
                        <img src="https://placehold.co/400x500/1a1a1a/ffffff?text=Portofolio+2" alt="Portofolio 2" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold">Cosplay Karakter Game</h3>
                        </div>
                    </div>
                    {{-- Card 3 --}}
                    <div class="bg-gray-800 rounded-lg overflow-hidden transform hover:-translate-y-2 transition duration-300 shadow-lg">
                        <img src="https://placehold.co/400x500/1a1a1a/ffffff?text=Portofolio+3" alt="Portofolio 3" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold">Makeup Pesta Glamor</h3>
                        </div>
                    </div>
                    {{-- Card 4 --}}
                    <div class="bg-gray-800 rounded-lg overflow-hidden transform hover:-translate-y-2 transition duration-300 shadow-lg">
                        <img src="https://placehold.co/400x500/1a1a1a/ffffff?text=Portofolio+4" alt="Portofolio 4" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold">Special Effect Makeup</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-main-layout>

