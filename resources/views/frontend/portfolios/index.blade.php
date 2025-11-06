<x-main-layout>

    {{-- Konten Utama Halaman Portofolio --}}
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Judul Halaman (Diperbaiki) --}}
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-gray-900">Portofolio Kami</h1>
                <p class="mt-2 text-lg text-gray-600">Lihat hasil karya kami berdasarkan kategori layanan.</p>
            </div>

            {{-- Perulangan berdasarkan KATEGORI LAYANAN --}}
            @forelse ($servicesWithPortfolios as $service)
                <div class="mb-12">
                    {{-- Judul Kategori Layanan --}}
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-300">
                        {{ $service->name }}
                    </h2>

                    {{-- Grid untuk foto-foto di dalam layanan ini --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        {{-- Perulangan untuk setiap FOTO portofolio --}}
                        @foreach ($service->portfolios as $portfolio)
                            <div class="bg-white overflow-hidden shadow-lg rounded-lg transform transition duration-300 hover:scale-105">
                                {{-- Tampilkan Gambar (Diperbaiki) --}}
                                <img src="{{ $portfolio->image_path ? Storage::url($portfolio->image_path) : 'https://placehold.co/600x400/pink/white?text=Image' }}"
                                     alt="{{ $portfolio->title }}"
                                     class="w-full h-64 object-cover">

                                {{-- Tampilkan Judul Foto (Diperbaiki) --}}
                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-gray-900">{{ $portfolio->title }}</h3>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @empty
                {{-- Jika tidak ada portofolio sama sekali --}}
                <div class="text-center py-12">
                    <p class="text-gray-500">Belum ada portofolio yang diunggah.</p>
                </div>
            @endforelse

        </div>
    </div>

</x-main-layout>
