<x-main-layout>

    <div class="bg-gray-50 min-h-screen py-12 md:py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-pink-100 shadow-sm mb-8">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-pink-500"></span>
                </span>
                <span class="text-xs md:text-sm font-bold text-gray-600 uppercase tracking-widest">Galeri Kami</span>
            </div>

            {{-- Header Halaman --}}
            <div class="">
                <h1 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-6">
                    Katalog Layanan <span class="text-pink-600">Kami</span>
                </h1>
            </div>

            {{-- Grid Layanan --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 xl:gap-10">

                @forelse ($services as $service)
                    {{-- Kartu Layanan --}}
                    <div class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 flex flex-col">

                        {{-- Bagian Gambar (Thumbnail) --}}
                        <div class="relative h-72 overflow-hidden">
                            {{-- Gambar Utama (Placeholder jika belum ada foto portofolio) --}}
                            <img src="{{ $service->portfolios->first() ? Storage::url($service->portfolios->first()->image_path) : 'https://placehold.co/600x800/fce7f3/d15b88?text=' . urlencode($service->name) }}"
                                 alt="{{ $service->name }}"
                                 class="w-full h-full object-cover transform transition-transform duration-700 ease-out group-hover:scale-110"
                                 loading="lazy">

                            {{-- Overlay Gradient Halus --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-60"></div>

                            {{-- Badge Kategori/Harga di atas Gambar --}}
                            <div class="absolute bottom-4 left-4 right-4 flex items-end justify-between text-white">
                                <div>
                                    <h3 class="text-xl font-bold leading-tight mb-1">{{ $service->name }}</h3>
                                    <div class="flex items-center gap-2 text-sm opacity-90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <span>± {{ $service->duration_minutes }} Menit</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bagian Detail Informasi --}}
                        <div class="p-6 flex flex-col flex-grow">
                            {{-- Deskripsi Singkat --}}
                            <p class="text-gray-600 text-sm line-clamp-2 mb-6 flex-grow">
                                {{ $service->description }}
                            </p>

                            {{-- Info Harga & DP --}}
                            <div class="flex items-center justify-between p-4 bg-pink-50/50 rounded-2xl mb-6">
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Mulai Dari</p>
                                    <p class="text-2xl font-extrabold text-gray-900">Rp {{ number_format($service->price / 1000, 0) }}k</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Min. DP</p>
                                    <p class="text-lg font-bold text-pink-600">{{ $service->dp_percentage }}%</p>
                                </div>
                            </div>

                            {{-- Tombol Aksi --}}
                            <a href="{{ route('services.show', $service->slug) }}"
                               class="block w-full text-center py-3.5 bg-gray-900 text-white font-bold rounded-xl hover:bg-pink-600 transition-colors duration-300">
                                Lihat Detail & Booking
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- State Kosong --}}
                    <div class="col-span-full py-20 text-center">
                        <div class="inline-block p-6 bg-white rounded-full shadow-sm mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Layanan</h3>
                        <p class="text-gray-500">Kami sedang menyiapkan layanan terbaik untukmu.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

</x-main-layout>
