<x-main-layout>
    {{-- <section class="relative min-h-screen bg-[#0381ab] overflow-hidden">
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
                    <div class="relative z-20 min-h-screen flex flex-col lg:flex-row items-center justify-center">
                        <div class="pt-24 text-white pb-12 lg:pt-0 lg:pb-0 items-start text-left md:ml-20 w-full flex-col flex justify-start md:text-left px-4 sm:px-6 lg:px-10">
                            <h1 class="text-xl lg:text-2xl mb-4 font-semibold">
                                Wujudkan Karakter Impianmu <br>
                                <span class="text-4xl lg:text-7xl font-hellohoney font-bold">Pettitemucos</span>
                            </h1>
                            <p class="text-lg lg:text-xl mb-8">
                                Spesialis makeup cosplay dan Douyin yang mengubah imajinasi menjadi kenyataan. Cepat, detail, dan siap untuk event besarmu.
                            </p>
                            <a href="{{ route('services.index') }}" class="bg-white text-gray-900 flex flex-row items-center gap-4 font-bold text-lg px-8 py-3 rounded-full hover:bg-gray-200 transition duration-300 group transform hover:scale-105 shadow-lg">
                                Lihat Jadwal & Layanan
                                <svg class="w-7 h-7 transition-transform duration-300 group-hover:translate-x-2" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect fill-opacity="0.01"/>
                                <path d="M41.9999 24H5.99992" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M30 12L42 24L30 36" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <div class="mt-4 flex flex-row items-center gap-2 animate-fade-up">
                                <div class="flex -space-x-3">
                                    <img
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                    src="https://wallpapers.com/images/high/anime-profile-picture-tebfn1alembbzoqw.webp"
                                    alt="User 1"
                                    />
                                    <img
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                    src="https://wallpapers.com/images/high/anime-profile-picture-nw1reaxqtgaf8brm.webp"
                                    alt="User 2"
                                    />
                                    <img
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                    src="https://wallpapers.com/images/high/anime-profile-picture-xfuea974qrf2k60p.webp"
                                    alt="User 3"
                                    />
                                    <img
                                    class="w-10 h-10 rounded-full border-2 border-white object-cover"
                                    src="https://wallpapers.com/images/high/levi-pfp-with-glittery-suit-y843hgzby2mx7jae.webp"
                                    alt="User 4"
                                    />
                                </div>
                                <p class="text-whitetext-sm font-normal">
                                    Dipercaya oleh <strong class="text-white font-bold">100+</strong> cosplayer
                                </p>
                            </div>
                        </div>
                        {{-- Kanan: Gambar Utama --}}
                        {{-- <div class="w-full justify-end items-end relative flex mt-10">
                            <div class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-[70%] text-[10rem] md:text-[14rem] font-black text-white/80 z-0 select-none" aria-hidden="true">
                                漢月
                            </div>
                            <img src="{{ asset('/images/herobg.png') }}" alt="Contoh Makeup Cosplay"
                                class="relative md:w-3/4 h-96 md:h-full object-cover rounded-lg">
                        </div>
                    </div>
            </section> --}}
    {{-- ================================================= --}}
    {{-- BAGIAN 1: HERO SECTION (Versi Cerah & Elegan) --}}
    {{-- ================================================= --}}
    <section class="relative min-h-screen flex items-center bg-gradient-to-br from-white via-pink-50/30 to-blue-50/50 overflow-hidden">

        <!-- Efek Latar Belakang Halus -->
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-pink-100/40 rounded-full blur-[120px] -z-10 mix-blend-multiply"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-blue-100/40 rounded-full blur-[150px] -z-10 mix-blend-multiply"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full relative z-10 py-20 lg:py-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

                {{-- KIRI: Teks & CTA --}}
                <div class="order-2 lg:order-1 text-center lg:text-left">
                    {{-- Badge Kecil --}}
                    <span class="inline-block py-1.5 px-4 rounded-full bg-pink-100 text-pink-600 text-sm font-bold tracking-widest uppercase mb-6 border border-pink-200">
                        Professional MUA Semarang
                    </span>

                    <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight text-gray-900 leading-tight mb-6">
                        Wujudkan <br class="hidden lg:block">
                        <span class="relative inline-block">
                            <span class="relative z-10">Karakter Impianmu</span>
                            {{-- Garis bawah dekoratif --}}
                            <span class="absolute bottom-2 left-0 w-full h-4 bg-pink-200/60 -z-10 skew-x-12"></span>
                        </span>
                    </h1>

                    <p class="text-lg text-gray-600 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Spesialis makeup <strong>Cosplay</strong> dan <strong>Douyin</strong> yang mengubah imajinasi menjadi kenyataan. Hasil detail, tahan lama, dan siap memukau di setiap *event* besarmu.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('services.index') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gray-900 text-white font-bold rounded-full hover:bg-pink-600 transition-all duration-300 transform hover:-translate-y-1 shadow-xl hover:shadow-pink-500/20">
                            <span>Lihat Jadwal & Layanan</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#portfolio" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-gray-900 font-bold rounded-full border-2 border-gray-200 hover:border-gray-900 transition-all duration-300">
                            Lihat Portofolio
                        </a>
                    </div>

                    {{-- Social Proof Singkat --}}
                    <div class="mt-12 flex items-center justify-center lg:justify-start gap-6 text-gray-500">
                        <div class="flex items-center gap-2">
                            <div class="flex -space-x-2">
                                {{-- Placeholder Avatar User --}}
                                <div class="w-8 h-8 rounded-full bg-pink-200 border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-blue-200 border-2 border-white"></div>
                                <div class="w-8 h-8 rounded-full bg-purple-200 border-2 border-white"></div>
                            </div>
                            <span class="text-sm font-medium"><strong class="text-gray-900">100+</strong> Klien Puas</span>
                        </div>
                        <div class="h-4 w-px bg-gray-300"></div>
                        <div class="flex items-center gap-1 text-yellow-500">
                            ★★★★★ <span class="text-sm font-medium text-gray-500 ml-1">(5.0/5.0)</span>
                        </div>
                    </div>
                </div>

            {{-- KANAN: Gambar Utama & Dekorasi --}}
            <div class="relative order-1 lg:order-2 flex justify-center lg:justify-end">
                <div class="absolute inset-0 -m-8 bg-gradient-to-tr from-pink-500/30 to-purple-600/30 rounded-[3rem] blur-3xl -z-10"></div>
                <div class="relative z-10">
                    <div class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-3/4 text-[18rem] lg:text-[25rem] font-black text-white z-0 select-none pointer-events-none" aria-hidden="true" style="font-family: 'Noto Serif SC', serif;">
                        漢月
                    </div>
                    <div class="relative z-10 w-full max-w-md mx-auto lg:mr-0">
                        <div class="absolute inset-0 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-[3rem] rotate-6 opacity-30 blur-xl -z-10 scale-105"></div>
                        <img src="{{ asset('images/herobg.png') }}"
                            alt="Model Makeup Cosplay"
                            class="w-full h-auto object-cover rounded-[2.5rem] shadow-2xl border-8 border-white relative z-10 transform hover:rotate-2 transition-transform duration-500">
                        <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl z-20 animate-bounce-slow">
                            <p class="text-sm font-bold text-gray-900">✨ Transformasi Total</p>
                            <p class="text-xs text-pink-500 font-medium">Douyin & Cosplay Style</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>


    <section class="py-24 bg-white text-gray-900 overflow-hidden relative">
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-pink-600/20 rounded-full blur-[300px] z-0"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            {{-- Kiri: Kartu-kartu Visual --}}
            <div class="relative">
                {{-- Dekorasi Garis Bergelombang (SVG) --}}
                <svg class="absolute -bottom-10 -left-10 w-48 h-auto text-gray-500/30 z-0" viewBox="0 0 200 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 30C20 10 40 10 55 30S95 50 110 30 150 10 165 30 195 50 195 30" stroke="currentColor" stroke-width="8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <div class="relative z-10 bg-gray-200/50 backdrop-blur-md border border-white/50 rounded-3xl p-8 shadow-2xl">
                    {{-- Judul Section di dalam Kartu --}}
                    <div class="absolute -top-6 left-8 bg-white px-4 py-1 rounded-full border border-pink-500 text-pink-400 text-sm font-semibold tracking-wider uppercase">
                        About Pettitemucos
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-extrabold mb-12 bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 via-pink-500 to-purple-500">
                        WHAT WE DO
                        <span class="absolute top-0 right-8 text-cyan-400 text-5xl">+</span>
                    </h2>
                    {{-- Grid Kartu Kecil --}}
                    <div class="grid grid-cols-2 gap-4 relative">
                        {{-- Garis Penghubung Melengkung (Dekorasi) --}}
                        <svg class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full pointer-events-none opacity-30" viewBox="0 0 300 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M50 50 C 150 50, 150 150, 250 150" stroke="white" stroke-width="2" stroke-dasharray="5 5"/>
                        </svg>

                        {{-- Kartu 1: Makeup Cosplay --}}
                        <div class="bg-white rounded-2xl p-4 text-center shadow-lg transform -rotate-6 hover:rotate-0 transition duration-300 z-10">
                            <img src="https://images.unsplash.com/photo-1727409059001-e7a3e40de86e?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29zcGxheWVyfGVufDB8fDB8fHww&auto=format&fit=crop&q=60&w=800" class="w-24 h-24 mx-auto mb-3 bg-pink-100 rounded-full flex items-center justify-center object-cover">
                            <h3 class="text-gray-900 font-bold text-sm">Makeup Cosplay</h3>
                        </div>

                        {{-- Kartu 2: Makeup Douyin --}}
                        <div class="bg-white rounded-2xl p-4 text-center shadow-lg transform rotate-6 hover:rotate-0 transition duration-300 mt-8 z-10">
                            <img src="https://i.pinimg.com/736x/1d/4b/28/1d4b28fb42452770df764f986827fdb4.jpg" class="w-24 h-24 mx-auto mb-3 bg-purple-100 rounded-full flex items-center justify-center object-cover">
                            <h3 class="text-gray-900 font-bold text-sm">Makeup Douyin</h3>
                        </div>

                        {{-- Kartu 3: Makeup Pesta --}}
                        <div class="bg-white rounded-2xl p-4 text-center shadow-lg transform rotate-3 hover:rotate-0 transition duration-300 z-10">
                            <img src="https://images.unsplash.com/photo-1611826585949-b0ccabd2c1a4?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fG1ha2V1cHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&q=60&w=800" class="w-24 h-24 mx-auto mb-3 bg-cyan-100 rounded-full flex items-center justify-center object-cover">
                            <h3 class="text-gray-900 font-bold text-sm">Makeup Pesta</h3>
                        </div>

                        {{-- Dekorasi Lingkaran/Ikon Tambahan --}}
                        <div class="absolute bottom-0 right-0 transform translate-x-4 translate-y-4">
                            <div class="w-12 h-12 bg-cyan-500 rounded-full flex items-center justify-center border-4 border-white">
                                <div class="w-4 h-4 bg-white rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>

                        {{-- Elemen Dekoratif Melayang --}}
                        <div class="absolute top-10 right-[-20px] w-16 h-16 border-4 border-gray-900 rounded-xl transform rotate-12 animate-pulse"></div>
                        <div class="absolute top-20 left-[-20px] w-16 h-16 border-4 border-gray-900 rounded-full transform animate-pulse"></div>
                        <svg class="absolute bottom-20 right-[-40px] w-16 h-16 rounded-full transform animate-pulse" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                        <div class="absolute bottom-20 left-[-30px] text-6xl text-gray-100 font-bold -rotate-12 z-0">~</div>
                    </div>

                    {{-- Kanan: Teks Penjelasan --}}
                    <div class="space-y-8">
                        <div class="flex items-start gap-4">
                            <span class="font-bold text-2xl mt-1 text-pink-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </span>
                            <p class="text-lg text-gray-900 leading-relaxed">
                                Kami menghidupkan karakter impianmu. Dari anime, game, hingga gaya Douyin yang viral, kami ahlinya.
                            </p>
                        </div>
                        <div class="flex items-start gap-4">
                            <span class="text-cyan-500 font-bold text-2xl mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42" />
                                </svg>
                            </span>
                            <p class="text-lg text-gray-900 leading-relaxed">
                                Setiap goresan kuas kami detail dan presisi. Kami memastikan kamu tampil sempurna dan percaya diri di setiap event.
                            </p>
                        </div>
                        <div class="flex items-start gap-4">
                            <span class="text-purple-600 font-bold text-2xl mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </span>
                            <p class="text-lg text-gray-900 leading-relaxed">
                                Lebih dari sekadar makeup, ini adalah transformasi. Kami menciptakan pengalaman yang tak terlupakan untuk momen spesialmu.
                            </p>
                        </div>

                        <div class="pt-8">
                            <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-bold px-8 py-4 rounded-full hover:shadow-lg hover:shadow-pink-500/30 transition duration-300 transform hover:-translate-y-1">
                                Mulai Transformasimu
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white text-white overflow-hidden relative">
        <div class="absolute top-1/2 right-0 -translate-y-1/2 w-[600px] h-[600px] bg-[#0381ab]/20 rounded-full blur-[120px] z-0"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-[100px] -z-10"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative order-2 lg:order-2">
                    {{-- Dekorasi di belakang grid --}}
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-to-tr from-pink-500/5 to-purple-500/5 rounded-full blur-3xl -z-10"></div>

                    <div class="grid grid-cols-2 gap-4 sm:gap-6">
                        {{-- Kolom Kiri (Naik sedikit) --}}
                        <div class="space-y-4 sm:space-y-6 -mt-8 lg:-mt-12">
                            {{-- Kartu 1: Cosplay --}}
                            <div class="group relative w-full h-64 rounded-[2rem] overflow-hidden shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                                <img src="{{ asset('images/img1.png') }}"
                                    alt="Layanan Cosplay"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 transition-opacity duration-500 group-hover:opacity-90"></div>
                                <div class="absolute inset-0 p-6 flex flex-col justify-end">
                                    <div class="mb-auto opacity-0 transform -translate-y-4 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
                                        <span class="text-3xl">🎭</span>
                                    </div>
                                    <h3 class="text-2xl font-bold text-white mb-2 tracking-wide">Cosplay</h3>
                                    <p class="text-gray-300 text-sm mb-4 line-clamp-2 group-hover:text-white transition-colors duration-300">
                                        Transformasi karakter anime & game yang akurat dengan detail sempurna.
                                    </p>
                                    <a href="/services/makeup-anime" class="inline-flex items-center font-semibold text-sm group/link">
                                        <span class="mr-2">Lihat Detail</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            {{-- Kartu 3: Wisuda --}}
                            <div class="group relative w-full h-64 rounded-[2rem] overflow-hidden shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                                <img src="{{ asset('images/img2.png') }}"
                                    alt="Layanan Cosplay"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 transition-opacity duration-500 group-hover:opacity-90"></div>
                                <div class="absolute inset-0 p-6 flex flex-col justify-end">
                                    <div class="mb-auto opacity-0 transform -translate-y-4 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
                                        <span class="text-3xl">🎭</span>
                                    </div>
                                    <h3 class="text-2xl font-bold text-white mb-2 tracking-wide">Wisuda</h3>
                                    <p class="text-gray-300 text-sm mb-4 line-clamp-2 group-hover:text-white transition-colors duration-300">
                                        Tampil elegan dan flawless di hari spesialmu
                                    </p>
                                    <a href="/services/makeup-anime" class="inline-flex items-center font-semibold text-sm group/link">
                                        <span class="mr-2">Lihat Detail</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Kolom Kanan (Turun sedikit untuk efek dinamis) --}}
                        <div class="space-y-4 sm:space-y-6 mt-4 lg:mt-6">
                            {{-- Kartu 2: Douyin --}}
                            <div class="group relative w-full h-64 rounded-[2rem] overflow-hidden shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                                <img src="{{ asset('images/img3.png') }}"
                                    alt="Layanan Cosplay"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 transition-opacity duration-500 group-hover:opacity-90"></div>
                                <div class="absolute inset-0 p-6 flex flex-col justify-end">
                                    <div class="mb-auto opacity-0 transform -translate-y-4 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
                                        <span class="text-3xl">🎭</span>
                                    </div>
                                    <h3 class="text-2xl font-bold text-white mb-2 tracking-wide">Douyin</h3>
                                    <p class="text-gray-300 text-sm mb-4 line-clamp-2 group-hover:text-white transition-colors duration-300">
                                        Teknik viral untuk tampilan mata yang dramatis.
                                    </p>
                                    <a href="/services/makeup-douyin" class="inline-flex items-center font-semibold text-sm group/link">
                                        <span class="mr-2">Lihat Detail</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            {{-- Kartu 4: Photoshoot --}}
                            <div class="group relative w-full h-64 rounded-[2rem] overflow-hidden shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                                <img src="{{ asset('images/img4.png') }}"
                                    alt="Layanan Cosplay"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 transition-opacity duration-500 group-hover:opacity-90"></div>
                                <div class="absolute inset-0 p-6 flex flex-col justify-end">
                                    <div class="mb-auto opacity-0 transform -translate-y-4 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
                                        <span class="text-3xl">🎭</span>
                                    </div>
                                    <h3 class="text-2xl font-bold text-white mb-2 tracking-wide">Photoshot</h3>
                                    <p class="text-gray-300 text-sm mb-4 line-clamp-2 group-hover:text-white transition-colors duration-300">
                                        Makeup tahan lama dan sempurna di depan kamera.
                                    </p>
                                    <a href="/services/makeup-douyin" class="inline-flex items-center font-semibold text-sm group/link">
                                        <span class="mr-2">Lihat Detail</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300 group-hover/link:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Elemen Dekoratif Bintang --}}
                    <div class="absolute top-0 right-10 text-yellow-400 text-2xl animate-pulse z-0">✦</div>
                    <div class="absolute bottom-10 left-10 text-pink-400 text-4xl animate-pulse z-0" style="animation-delay: 1s;">✦</div>

                </div>

                {{-- KANAN: Teks Penjelasan & CTA (Tetap sama, hanya sedikit penyesuaian margin jika perlu) --}}
                <div class="order-1 lg:order-1 space-y-8">
                    <div>
                        <span class="inline-block py-1 px-3 rounded-full bg-[#0381ab]/10 text-cyan-600 text-sm font-semibold tracking-wider uppercase mb-4 border border-[#0381ab]/20">
                            Our Expertise
                        </span>
                        <h2 class="text-4xl lg:text-5xl font-extrabold leading-tight text-gray-900">
                            Layanan Kami Untuk<br> Penampilan Terbaikmu
                        </h2>
                    </div>

                    <p class="text-lg text-gray-500 leading-relaxed">
                        Kami fokus pada detail dan karakter. Apapun acaranya, dari konvensi anime hingga momen sakral wisuda, Pettitemucos siap menciptakan *look* yang tidak hanya cantik, tapi juga berkarakter.
                    </p>

                    {{-- Poin-poin Keunggulan --}}
                    <ul class="space-y-5">
                        <li class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-500/20 flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <strong class="text-gray-700 block text-lg">Teknik Khusus Karakter</strong>
                                <span class="text-gray-400">Menguasai teknik *face taping*, *contouring* ekstrem, dan mata anime.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-500/20 flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <strong class="text-gray-700 block text-lg">Higienis & Profesional</strong>
                                <span class="text-gray-400">Peralatan steril dan produk kualitas premium untuk semua jenis kulit.</span>
                            </div>
                        </li>
                    </ul>

                    {{-- Tombol CTA --}}
                    <div class="pt-6">
                        <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 bg-cyan-500 text-white font-bold text-lg px-8 py-4 rounded-full border transition-all hover:shadow-lg hover:shadow-teal-300 duration-300 transform hover:-translate-y-1">
                            Jelajahi Semua Layanan
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @props(['events'])

    <section class="py-24 bg-white text-gray-900 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            {{-- Header Section --}}
            <div class="text-center mb-12">
                <h2 class="text-pink-600 font-bold tracking-wider uppercase mb-4">Jadwal Kami</h2>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">
                    Temui Kami di <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-purple-600">Event Selanjutnya</span>
                </h1>
            </div>

            @if($upcomingEvents->count() > 0)
                {{--
                    ALPINE.JS MAGIC ✨
                    Kita inisialisasi state di sini:
                    - activeIndex: indeks event yang sedang ditampilkan (mulai dari 0)
                    - upcomingEvents: data event kita ubah jadi JSON biar bisa dibaca JavaScript
                --}}
                <div x-data="{
                        activeIndex: 0,
                        upcomingEvents: {{ Js::from($upcomingEvents) }},
                        next() { this.activeIndex = (this.activeIndex + 1) % this.upcomingEvents.length },
                        prev() { this.activeIndex = (this.activeIndex - 1 + this.upcomingEvents.length) % this.upcomingEvents.length }
                    }"
                    class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-start">

                    {{-- === BAGIAN KIRI: GAMBAR BESAR (DISPLAY UTAMA) === --}}
                    <div class="lg:col-span-3 relative">
                        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-3xl shadow-2xl border border-gray-100">
                            {{-- Loop untuk membuat gambar besar, kita mainkan opacity-nya biar ada efek fade --}}
                            <template x-for="(event, index) in upcomingEvents" :key="event.id">
                                <div x-show="activeIndex === index"
                                    x-transition:enter="transition ease-out duration-500"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-300 absolute"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-105"
                                    class="absolute inset-0 w-full h-full">

                                    {{-- Gambar Utama --}}
                                    <img :src="'/storage/' + event.image_path"
                                        class="w-full h-full object-cover"
                                        alt="Event Image">

                                    {{-- Overlay Informasi --}}
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-8">
                                        <div class="bg-white/20 backdrop-blur-md border border-white/30 p-6 rounded-2xl text-white animate-fade-up">
                                            {{-- Tanggal --}}
                                            <div class="inline-flex items-center gap-2 bg-pink-600 px-3 py-1 rounded-full text-sm font-semibold mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                </svg>
                                                {{-- Kita pakai trik sedikit untuk format tanggal di JS --}}
                                                <span x-text="new Date(event.event_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })"></span>
                                            </div>
                                            {{-- Lokasi --}}
                                            <h3 class="text-2xl font-bold mb-2" x-text="event.location_address"></h3>

                                            {{-- Tombol Link (jika ada) --}}
                                            <template x-if="event.event_url">
                                                <a :href="event.event_url" target="_blank" class="mt-4 inline-flex items-center gap-2 text-pink-300 hover:text-pink-200 font-semibold transition-colors">
                                                    Lihat Detail Event
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </a>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            {{-- Tombol Navigasi Kiri/Kanan di atas gambar --}}
                            <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-3 rounded-full backdrop-blur-sm transition-all transform hover:scale-110 z-20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                            </button>
                            <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 text-white p-3 rounded-full backdrop-blur-sm transition-all transform hover:scale-110 z-20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </button>
                        </div>
                        {{-- Tombol Pesan Slot (CTA Utama di Gambar Besar) --}}
                        <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 mt-10 bg-gradient-to-r from-purple-600 to-purple-500 text-white font-bold px-8 py-4 rounded-full hover:shadow-lg hover:shadow-teal-500/30 transition duration-300 transform hover:-translate-y-1">
                            Pesan slot sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>

                    {{-- === BAGIAN KANAN: SLIDER THUMBNAIL === --}}
                    <div class="lg:col-span-2 flex flex-col justify-center h-full">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 px-1">Event Mendatang Lainnya</h3>

                        {{-- Container Slider Vertikal --}}
                        <div class="space-y-4 max-h-[500px] overflow-y-auto pr-2 custom-scrollbar">
                            <template x-for="(event, index) in upcomingEvents" :key="event.id">
                                {{-- Item Thumbnail --}}
                                <button @click="activeIndex = index"
                                        class="w-full flex items-center gap-4 p-3 rounded-2xl transition-all duration-300 text-left group"
                                        :class="activeIndex === index ? 'bg-pink-50 border-pink-200 shadow-md scale-[1.02]' : 'bg-white border-transparent hover:bg-gray-50 hover:border-gray-200'">

                                    {{-- Gambar Kecil --}}
                                    <img :src="'/storage/' + event.image_path"
                                        class="w-24 h-24 object-cover rounded-xl flex-shrink-0 shadow-sm transition-all"
                                        :class="activeIndex === index ? 'ring-2 ring-pink-500 ring-offset-2' : 'group-hover:opacity-90'">

                                    {{-- Info Singkat --}}
                                    <div>
                                        <p class="text-sm font-bold"
                                        :class="activeIndex === index ? 'text-pink-600' : 'text-gray-500'"
                                        x-text="new Date(event.event_date).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })">
                                        </p>
                                        <h4 class="text-base font-semibold text-gray-900 line-clamp-2" x-text="event.location_address"></h4>
                                    </div>
                                </button>
                            </template>
                        </div>
                    </div>

                </div>
            @else
                {{-- State Kosong Jika Belum Ada Event --}}
                <div class="text-center py-12 bg-gray-50 rounded-3xl border border-dashed border-gray-300">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada jadwal event</h3>
                    <p class="mt-1 text-sm text-gray-500">Pantau terus untuk update event cosplay selanjutnya!</p>
                </div>
            @endif

        </div>
    </section>

    @props(['portfolios'])

    <section id="portfolio" class="py-24 bg-gray-50 relative overflow-hidden">

        {{-- Dekorasi Latar Belakang (Versi Cerah) --}}
        <div class="absolute -top-[300px] left-[20%] w-[600px] h-[600px] bg-pink-200/40 rounded-full blur-[300px] z-10 pointer-events-none mix-blend-multiply"></div>
        <div class="absolute bottom-[-300px] right-[10%] w-[500px] h-[500px] bg-purple-200/40 rounded-full blur-[300px] z-10 pointer-events-none mix-blend-multiply"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            {{-- Header Section --}}
            <div class="text-center mb-16 md:mb-24">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-pink-100 shadow-sm mb-6">
                    <span class="flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-pink-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-pink-500"></span>
                    </span>
                    <span class="text-xs font-bold text-gray-600 uppercase tracking-widest">Masterpiece Gallery</span>
                </div>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 mb-6 tracking-tight">
                    Karya Terbaik <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-purple-600">Kami</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Setiap wajah adalah kanvas baru. Lihat bagaimana kami mengubah imajinasi menjadi realitas yang memukau.
                </p>
            </div>

            {{-- Grid Portofolio Elegan --}}
            @if($portfolios->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                    @foreach ($portfolios as $index => $portfolio)
                        {{-- Kartu Portofolio Minimalis --}}
                        <div class="group relative bg-white rounded-[2rem] p-3 shadow-sm hover:shadow-xl transition-all duration-500 ease-out hover:-translate-y-2"
                            style="animation-delay: {{ $index * 150 }}ms">

                            {{-- Container Gambar --}}
                            <div class="relative overflow-hidden rounded-[1.5rem] aspect-[3/4] mb-4">
                                <img src="{{ $portfolio->image_path ? Storage::url($portfolio->image_path) : 'https://placehold.co/600x800/fce7f3/d15b88?text=Portfolio' }}"
                                    alt="{{ $portfolio->title }}"
                                    class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-700 ease-out group-hover:scale-105"
                                    loading="lazy">

                                {{-- Overlay Halus saat Hover --}}
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>

                                {{-- Kategori Layanan (Badge) - Muncul di pojok atas --}}
                                @if($portfolio->service)
                                    <div class="absolute top-4 left-4">
                                        <span class="inline-block px-3 py-1 text-[10px] font-bold text-gray-900 bg-white/90 backdrop-blur-md rounded-full shadow-sm">
                                            {{ $portfolio->service->name }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Info Karya --}}
                            <div class="px-2 pb-2 text-center">
                                <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-pink-600 transition-colors">
                                    {{ $portfolio->title }}
                                </h3>
                                <div class="w-8 h-1 bg-gray-200 rounded-full mx-auto mt-3 group-hover:w-16 group-hover:bg-pink-400 transition-all duration-500"></div>
                            </div>

                        </div>
                    @endforeach
                </div>

                {{-- Tombol Lihat Semua --}}
                <div class="text-center mt-20">
                    <a href="{{ route('portfolios.index') }}" class="group inline-flex items-center gap-3 px-8 py-4 bg-gray-900 text-white font-bold rounded-full hover:bg-pink-600 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-pink-500/30">
                        <span>Jelajahi Galeri Lengkap</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

            @else
                {{-- State Kosong --}}
                <div class="flex flex-col items-center justify-center py-24 px-4 text-center bg-white border-2 border-dashed border-gray-200 rounded-[3rem]">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Galeri Masih Kosong</h3>
                    <p class="text-gray-500 max-w-md mx-auto">Kami sedang memilih foto-foto terbaik untuk ditampilkan di sini. Segera kembali lagi ya!</p>
                </div>
            @endif

        </div>
    </section>

    <section class="py-20 bg-white text-gray-900 relative overflow-hidden">
        <div class="absolute w-64 bg-white z-10 h-64 border top-0 left-0 rotate-45"></div>
        <div class="max-w-7xl z-20 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Apa Kata Klien Kami?</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($testimonials as $testimonial)
                    <div class="bg-gray-50 p-6 rounded-lg shadow-lg border border-gray-200">
                        <div class="flex items-center mb-4">
                            {{-- Rating Bintang --}}
                            <div class="flex text-yellow-400">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5 {{ $i < $testimonial->rating ? 'fill-current' : 'text-gray-300' }}" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-600 italic mb-4">"{{ $testimonial->comment }}"</p>
                        <p class="font-semibold text-gray-900">- {{ $testimonial->booking->client->name }}</p>
                    </div>
                @empty
                    <!-- Testimoni Statis 1 (Contoh) -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-lg border border-gray-200">
                        <div class="flex text-yellow-400 mb-4">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                        </div>
                        <p class="text-gray-600 italic mb-4">"Hasilnya persis seperti karakter animenya! Rapi dan cepat pengerjaannya. Keren banget!"</p>
                        <p class="font-semibold text-gray-900">- Klien Cosplay</p>
                    </div>
                    <!-- Testimoni Statis 2 (Contoh) -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-lg border border-gray-200">
                        <div class="flex text-yellow-400 mb-4">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/></svg>
                        </div>
                        <p class="text-gray-600 italic mb-4">"Makeup Douyin-nya pas banget, gak berlebihan tapi tetap *stunning*. Suka banget sama hasilnya!"</p>
                        <p class="font-semibold text-gray-900">- Klien Pesta</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</x-main-layout>
