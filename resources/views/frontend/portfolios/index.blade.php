<x-main-layout>

    {{-- Inisialisasi Alpine.js untuk Lightbox --}}
    <div class="bg-gray-50 min-h-screen py-12 md:py-24 relative overflow-hidden"
         x-data="{ lightboxOpen: false, activeImage: '', activeTitle: '', activeCategory: '' }">

        {{-- Dekorasi Latar Belakang Halus --}}
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-pink-200/40 rounded-full blur-[120px] -z-10 opacity-60 pointer-events-none mix-blend-multiply"></div>
        <div class="absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-purple-200/40 rounded-full blur-[150px] -z-10 opacity-60 pointer-events-none mix-blend-multiply"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            {{-- Header Halaman --}}
            <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-pink-100 shadow-sm mb-8">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-pink-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-pink-500"></span>
                    </span>
                    <span class="text-xs md:text-sm font-bold text-gray-600 uppercase tracking-widest">Galeri Kami</span>
                </div>

                <div class="flex flex-wrap justify-center gap-3">
                    {{-- Tombol 'Semua' --}}
                    <a href="{{ route('portfolios.index') }}"
                       class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 border
                              {{ !request('category')
                                  ? 'bg-pink-600 text-white border-pink-600 shadow-md'
                                  : 'bg-white text-gray-600 border-gray-200 hover:border-pink-300 hover:text-pink-600' }}">
                        Semua
                    </a>

                    {{-- Loop Tombol Layanan --}}
                    @foreach ($allServices as $serviceItem)
                        <a href="{{ route('portfolios.index', ['category' => $serviceItem->slug]) }}"
                           class="px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 border
                                  {{ request('category') == $serviceItem->slug
                                      ? 'bg-pink-600 text-white border-pink-600 shadow-md'
                                      : 'bg-white text-gray-600 border-gray-200 hover:border-pink-300 hover:text-pink-600' }}">
                            {{ $serviceItem->name }}
                        </a>
                    @endforeach
                </div>
                {{-- ========================================= --}}

            </div>

            {{-- Konten Galeri --}}
            <div class="space-y-16 md:space-y-24">
                @forelse ($servicesWithPortfolios as $service)
                    <div class="last:mb-0 animate-fade-up">

                        {{-- Header Kategori Layanan (Hanya muncul jika menampilkan SEMUA, atau bisa tetap dimunculkan agar jelas) --}}
                        <div class="flex items-center gap-4 mb-8 md:mb-10">
                            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-pink-200 to-transparent"></div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 px-6 py-2 bg-white rounded-full shadow-sm border border-pink-100">
                                {{ $service->name }}
                            </h2>
                            <div class="h-px flex-1 bg-gradient-to-r from-transparent via-pink-200 to-transparent"></div>
                        </div>

                        {{-- Grid Foto Portofolio --}}
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                            @foreach ($service->portfolios as $index => $portfolio)
                                <div class="group relative rounded-2xl md:rounded-[2rem] overflow-hidden aspect-[3/4] bg-white shadow-sm hover:shadow-xl transition-all duration-500 cursor-pointer hover:-translate-y-2"
                                     @click="lightboxOpen = true; activeImage = '{{ $portfolio->image_path ? Storage::url($portfolio->image_path) : 'https://placehold.co/600x800/fce7f3/d15b88?text=Portfolio' }}'; activeTitle = '{{ $portfolio->title }}'; activeCategory = '{{ $service->name }}'">

                                    <img src="{{ $portfolio->image_path ? Storage::url($portfolio->image_path) : 'https://placehold.co/600x800/fce7f3/d15b88?text=Image' }}"
                                         alt="{{ $portfolio->title }}"
                                         class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-700 ease-out group-hover:scale-110"
                                         loading="lazy">

                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-4 md:p-6">
                                        <h3 class="text-white font-bold text-lg md:text-xl line-clamp-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                            {{ $portfolio->title }}
                                        </h3>
                                    </div>

                                    <div class="absolute top-4 right-4 w-8 h-8 md:w-10 md:h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    {{-- State Kosong jika filter tidak menemukan hasil --}}
                    <div class="col-span-full py-24 text-center">
                        <div class="inline-block p-8 bg-white rounded-full shadow-sm mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Portofolio</h3>
                        <p class="text-gray-500 max-w-md mx-auto">Tidak ada foto ditemukan untuk kategori ini saat ini.</p>
                        <a href="{{ route('portfolios.index') }}" class="mt-6 inline-block px-6 py-2 bg-pink-100 text-pink-700 font-semibold rounded-full hover:bg-pink-200 transition-colors">
                            Lihat Semua Kategori
                        </a>
                    </div>
                @endforelse
            </div>

        </div>

        {{-- LIGHTBOX MODAL (Sama seperti sebelumnya, tidak perlu diubah) --}}
        <div x-show="lightboxOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-black/95 backdrop-blur-md"
             @keydown.escape.window="lightboxOpen = false"
             style="display: none;">

            <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white/70 hover:text-white transition-colors z-[1000] p-2 bg-white/10 rounded-full hover:bg-white/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="relative max-w-7xl w-full h-full flex flex-col items-center justify-center" @click.away="lightboxOpen = false">
                <img :src="activeImage" :alt="activeTitle" class="max-h-[85vh] max-w-full object-contain rounded-lg shadow-2xl">
                <div class="mt-6 text-center">
                    <h3 class="text-xl md:text-2xl font-bold text-white" x-text="activeTitle"></h3>
                    <span class="inline-block mt-2 px-4 py-1 bg-pink-600/80 text-white text-sm rounded-full backdrop-blur-md" x-text="activeCategory"></span>
                </div>
            </div>
        </div>

    </div>

</x-main-layout>
