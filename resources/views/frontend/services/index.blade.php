<x-main-layout>

    {{-- Konten Utama Halaman Layanan --}}
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Judul Halaman --}}
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900">Daftar Layanan Kami</h1>
                <p class="mt-2 text-lg text-gray-600">Temukan paket makeup yang paling sesuai untuk momen spesial Anda.</p>
            </div>

            {{-- Grid untuk Kartu Layanan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($services as $service)
                    {{-- Kartu Layanan --}}
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg transform transition duration-300 hover:scale-105">
                        {{-- <img class="h-56 w-full object-cover" src="https://placehold.co/600x400/pink/white?text={{ $service->name }}" alt="{{ $service->name }}"> --}}

                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $service->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4 h-20 overflow-hidden">
                                {{ Str::limit($service->description, 120) }}
                            </p>

                            <div class="flex justify-between items-center mb-4">
                                <span class="text-sm text-gray-500">
                                    <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $service->duration_minutes }} menit
                                </span>
                                <span class="text-xl font-bold text-pink-600">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </span>
                            </div>

                            <a href="{{ route('services.show', $service->slug) }}" class="block w-full text-center bg-pink-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-pink-700 transition duration-200">
                                Lihat Detail & Pesan
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- Jika tidak ada layanan --}}
                    <div class="md:col-span-2 lg:col-span-3 text-center py-12">
                        <p class="text-gray-500">Belum ada layanan yang tersedia saat ini.</p>
                    </div>
                @endforelse

            </div>

        </div>
    </div>

</x-main-layout>
