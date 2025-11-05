<x-main-layout>

    {{-- Konten Utama Halaman Detail Layanan --}}
    <div class_alias="py-12 bg-white">
        <div class_alias="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">

                {{-- Bagian Atas: Detail & Tombol Booking --}}
                <div class="p-8 md:flex md:gap-8">
                    {{-- Gambar Utama (Ambil dari foto portofolio pertama jika ada) --}}
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ $service->portfolios->first() ? Storage::url($service->portfolios->first()->image_path) : 'https://placehold.co/600x400/pink/white?text=Service' }}"
                             alt="{{ $service->name }}"
                             class="w-full h-80 object-cover rounded-lg shadow-md">
                    </div>

                    {{-- Detail Teks --}}
                    <div class="md:w-1/2">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $service->name }}</h1>
                        <p class="text-gray-600 text-base mb-4">{{ $service->description }}</p>

                        <div class="mb-4">
                            <span class="text-sm text-gray-500">
                                <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Estimasi Durasi: <strong>{{ $service->duration_minutes }} menit</strong>
                            </span>
                        </div>

                        <div class="mb-6">
                            <span class="text-3xl font-bold text-pink-600">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </span>
                            <span class="text-sm text-gray-500">/sesi</span>
                        </div>

                        {{-- Tombol Call to Action --}}
                        <a href="{{ route('booking.create', $service->slug) }}" class="w-full text-center bg-pink-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-pink-700 transition duration-300 text-lg">
                            Pesan Jadwal Sekarang
                        </a>
                        <p class="text-xs text-gray-500 mt-2 text-center">Anda akan diarahkan untuk memilih tanggal.</p>
                    </div>
                </div>

                {{-- Bagian Bawah: Galeri Portofolio --}}
                <div class="p-8 border-t border-gray-200 bg-gray-50">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-6">Galeri Portofolio</h3>
                    @if ($service->portfolios->count() > 0)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach ($service->portfolios as $portfolio)
                                <div class="relative group">
                                    <img src="{{ Storage::url($portfolio->image_path) }}"
                                         alt="{{ $portfolio->title }}"
                                         class="w-full h-48 object-cover rounded-lg shadow-md">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition duration-300 flex items-center justify-center rounded-lg">
                                        <p class="text-white opacity-0 group-hover:opacity-100 transition duration-300">{{ $portfolio->title }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center">Belum ada portofolio untuk layanan ini.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

</x-main-layout>
