<x-main-layout>
    <div class="text-white -mt-16">
        {{-- Hero Section --}}
    <section class="relative min-h-screen bg-[#0381ab] overflow-hidden">
        <img src="build/assets/images/clouds.png" class="absolute bottom-[-150px] left-[-150px] w-[500px] h-[500px] opacity-20 z-10">
        <img src="build/assets/images/clouds.png" class="absolute top-[-150px] right-[-150px] w-[500px] h-[500px] opacity-30 z-10">
        <img src="build/assets/images/clouds.png" class="absolute left-1/2 top-1/2 w-[500px] h-[500px] opacity-10 z-10">
            <div class="absolute inset-0 z-0" aria-hidden="true">
                @for ($i = 0; $i < 20; $i++)
                    @php
                        $size = rand(10, 40);
                        $duration = rand(5, 15);
                        $delay = rand(0, 10);
                        $top = rand(0, 100);
                        $left = rand(0, 100);
                    @endphp
                    <div class="bubble absolute bg-white rounded-full opacity-5"
                         style="
                            width: {{ $size }}px;
                            height: {{ $size }}px;
                            top: {{ $top }}%;
                            left: {{ $left }}%;
                            animation-duration: {{ $duration }}s;
                            animation-delay: {{ $delay }}s;
                         ">
                    </div>
                @endfor
            </div>
        <div class="relative z-20 min-h-screen grid grid-cols-1 lg:grid-cols-2 items-center justify-center">
            <div class="pt-24 pb-12 lg:pt-0 lg:pb-0 items-start ml-20 w-full flex-col flex justify-start text-center md:text-left px-4 sm:px-6 lg:px-10">
                <h1 class="text-4xl lg:text-5xl font-extrabold mb-4">
                    Wujudkan Karakter Impianmu <br>
                    <span class="text-6xl lg:text-7xl">Pettitemucos</span>
                </h1>
                <p class="text-lg lg:text-xl mb-8">
                    Spesialis makeup cosplay dan Douyin yang mengubah imajinasi menjadi kenyataan. Cepat, detail, dan siap untuk event besarmu.
                </p>
                <a href="{{ route('services.index') }}" class="inline-block bg-white text-white font-bold text-lg px-8 py-3 rounded-full hover:bg-sky-200/70 transition duration-300 transform hover:scale-105 shadow-lg shadow-500/30">
                    Lihat Jadwal & Layanan
                </a>
            </div>

            {{-- Kanan: Gambar Utama --}}
            <div class=" w-full h-screen justify-end items-center relative flex">
                <div class="absolute mt-10 top-1/2 left-1/2 -translate-y-1/2 -translate-x-[70%] text-[14rem] font-black text-white/80 z-0 select-none" aria-hidden="true">
                    漢月
                </div>
                <img src="{{ asset('build/assets/images/herobg.png') }}" alt="Contoh Makeup Cosplay"
                    class="relative w-3/4 h-full object-cover rounded-lg">
            </div>

        </div>
    </section>
        {{-- Portofolio Singkat --}}
        <div class="py-24 bg-white">
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

