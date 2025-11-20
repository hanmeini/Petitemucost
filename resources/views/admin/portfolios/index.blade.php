<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight tracking-wide">
                {{ __('Kelola Portofolio') }}
            </h2>
            {{-- Tombol Tambah --}}
            <a href="{{ route('admin.portfolios.create') }}"
               class="inline-flex items-center px-5 py-2.5 bg-pink-600 hover:bg-pink-700 text-white text-sm font-bold rounded-full transition-all duration-200 shadow-lg shadow-pink-500/30 hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Tambah Foto Baru
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition
                     class="mb-8 p-4 rounded-xl bg-green-50 border border-green-200 flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="p-1 bg-green-100 rounded-full text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                        </div>
                        <p class="text-sm font-bold text-green-700">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-green-500 hover:text-green-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </button>
                </div>
            @endif

            {{-- Grid Portofolio --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($portfolios as $portfolio)
                    <div class="group bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col">

                        {{-- Gambar --}}
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                            <img src="{{ asset('storage/' . $portfolio->image_path) }}"
                                 alt="{{ $portfolio->title }}"
                                 class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105"
                                 loading="lazy">

                            {{-- Overlay saat Hover --}}
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                        </div>

                        {{-- Info --}}
                        <div class="p-5 flex flex-col flex-grow">
                            {{-- Kategori Layanan --}}
                            <div class="mb-2">
                                <span class="inline-block px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-pink-600 bg-pink-50 rounded-full border border-pink-100">
                                    {{ $portfolio->service->name }}
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 mb-1 line-clamp-1 group-hover:text-pink-600 transition-colors">
                                {{ $portfolio->title }}
                            </h3>

                            {{-- Tombol Hapus --}}
                            <div class="mt-auto pt-4 flex justify-end border-t border-gray-50">
                                <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="flex items-center gap-1.5 text-xs font-bold text-gray-400 hover:text-red-500 transition-colors px-2 py-1 rounded hover:bg-red-50"
                                            onclick="return confirm('Yakin ingin menghapus foto ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-24 text-center bg-white border border-dashed border-gray-200 rounded-3xl">
                        <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1">Belum ada foto</h3>
                        <p class="text-gray-500 text-sm mb-6">Mulai pamerkan hasil karya terbaik Anda.</p>
                        <a href="{{ route('admin.portfolios.create') }}" class="text-pink-600 hover:text-pink-700 font-bold text-sm hover:underline">
                            + Upload Foto Pertama
                        </a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-admin-layout>
