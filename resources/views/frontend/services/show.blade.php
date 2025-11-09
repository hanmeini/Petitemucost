<x-main-layout>

    <div class="bg-gray-50 min-h-screen md:py-10 relative overflow-hidden">
        {{-- Dekorasi Latar Belakang Halus --}}
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-pink-100/40 rounded-full blur-[150px] -z-10 pointer-events-none mix-blend-multiply"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-purple-100/40 rounded-full blur-[150px] -z-10 pointer-events-none mix-blend-multiply"></div>

        <div class="w-full md:max-w-7xl mx-auto md:px-8 relative z-10">

            {{-- Tombol Kembali Desktop --}}
            <div class="mb-8 md:block hidden">
                <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-pink-600 transition-colors font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Kembali ke Daftar Layanan
                </a>
            </div>

            <div class="bg-white md:rounded-[3rem] shadow-xl overflow-hidden border border-gray-100">
                <div class="grid grid-cols-1 lg:grid-cols-2">
                    {{-- KOLOM KIRI: Gambar Utama (Slideshow jika ada banyak foto, atau foto pertama) --}}
                    <div class="relative h-[400px] lg:h-auto min-h-[300px] overflow-hidden">
                        <div class="mb-8 md:hidden blcok absolute top-4 left-4 z-50">
                            <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-white hover:text-pink-400 hover:scale-105 transition-transform border-white border p-3 rounded-full font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                         @if($service->portfolios->count() > 0)
                            <img src="{{ Storage::url($service->portfolios->first()->image_path) }}"
                                 alt="{{ $service->name }}"
                                 class="absolute inset-0 w-full h-full object-cover">
                        @else
                            {{-- Placeholder jika belum ada foto --}}
                            <img src="https://placehold.co/800x1000/fce7f3/d15b88?text={{ urlencode($service->name) }}"
                                 alt="{{ $service->name }}"
                                 class="absolute inset-0 w-full h-full object-cover">
                        @endif

                        {{-- Overlay Gradient agar teks di atas gambar terbaca (jika ada) --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/40 via-transparent to-transparent"></div>
                    </div>

                    {{-- KOLOM KANAN: Detail Informasi --}}
                    <div class="p-8 lg:p-8 flex flex-col justify-center bg-white relative">
                        {{-- Dekorasi Bintang --}}
                        <div class="absolute top-10 right-10 text-yellow-400 text-3xl animate-pulse">✦</div>

                        <h1 class="text-xl font-bold text-gray-900 mb-6 tracking-wide leading-tight">
                            {{ $service->name }}
                        </h1>

                        {{-- Harga & Durasi --}}
                        <div class="flex flex-wrap items-center gap-6 mb-8">
                            <div class="px-5 py-3 bg-pink-50 rounded-2xl border border-pink-100">
                                <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold mb-1">Harga Mulai</p>
                                <p class="text-xl font-extrabold text-pink-600">Rp {{ number_format($service->price / 1000, 0) }}k</p>
                            </div>
                            <div class="px-5 py-3 bg-gray-50 rounded-2xl border border-gray-100">
                                <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold mb-1">Estimasi Durasi</p>
                                <p class="text-xl font-bold text-gray-900 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" /></svg>
                                    ± {{ $service->duration_minutes }} Menit
                                </p>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="prose prose-lg text-gray-600 mb-10">
                            <h3 class="text-lg font-bold text-gray-900 mb-3">Tentang Layanan Ini</h3>
                            <p class="leading-relaxed">
                                {{ $service->description }}
                            </p>
                            {{-- Bisa ditambahkan detail lain jika ada di database, misal: apa saja yang didapat --}}
                        </div>

                        {{-- Info DP --}}
                        <div class="flex items-start gap-3 p-4 bg-blue-50 rounded-xl border border-blue-100 mb-8 text-sm text-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Untuk mengamankan jadwalmu, diperlukan pembayaran <strong>Uang Muka (DP) sebesar {{ $service->dp_percentage }}%</strong> dari total harga layanan.
                            </p>
                        </div>

                        {{-- Tombol Booking --}}
                        <a href="{{ route('booking.create', $service->slug) }}"
                           class="group w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-gray-900 text-white font-bold text-lg rounded-xl hover:bg-pink-600 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-pink-500/30">
                            <span>Pesan Jadwal Sekarang</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <p class="text-center text-sm text-gray-500 mt-4">
                            Slot terbatas! Booking jauh-jauh hari sangat disarankan.
                        </p>

                    </div>
                </div>

                {{-- SECTION GALERI PORTOFOLIO TERKAIT --}}
                @if($service->portfolios->count() > 0)
                <div class="p-8 lg:p-16 bg-gray-50 border-t border-gray-100">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900">Galeri Hasil Makeup</h2>
                        <p class="text-gray-600 mt-2">Lihat contoh nyata dari layanan ini pada klien kami sebelumnya.</p>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                        @foreach ($service->portfolios as $index => $portfolio)
                            <div class="group relative rounded-2xl overflow-hidden aspect-square bg-gray-200 cursor-pointer"
                                 x-data="{}"
                                 x-on:click="$dispatch('open-lightbox', { index: {{ $index }} })">
                                <img src="{{ Storage::url($portfolio->image_path) }}"
                                     alt="{{ $portfolio->title ?? $service->name }}"
                                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                     loading="lazy">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>



</x-main-layout>
