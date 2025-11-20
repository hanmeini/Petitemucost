<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.services.index') }}" class="p-2 bg-white border border-gray-200 rounded-lg text-gray-500 hover:text-pink-600 hover:border-pink-200 transition-all shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
            </a>
            <h2 class="font-bold text-xl text-gray-800 leading-tight tracking-wide">
                {{ __('Edit Layanan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-100 rounded-3xl shadow-xl shadow-gray-200/50 overflow-hidden">

                {{-- Header Form --}}
                <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Perbarui Informasi</h3>
                        <p class="mt-1 text-sm text-gray-500">Ubah detail layanan {{ $service->name }}</p>
                    </div>
                    {{-- Badge ID Layanan --}}
                    <span class="px-3 py-1 rounded-full bg-white text-xs font-mono text-gray-400 border border-gray-200 shadow-sm">ID: #{{ $service->id }}</span>
                </div>

                <div class="p-8">
                    {{-- Menampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-100">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="p-1 bg-red-100 rounded-full text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                </div>
                                <h3 class="text-sm font-bold text-red-700">Ada kesalahan pada input Anda</h3>
                            </div>
                            <ul class="list-disc list-inside text-sm text-red-600 ml-2 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')

                        {{-- Nama Layanan --}}
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Nama Layanan</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}"
                                   class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none shadow-sm"
                                   required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {{-- Harga --}}
                            <div>
                                <label for="price" class="block text-sm font-bold text-gray-700 mb-2">Harga (Rp)</label>
                                <div class="relative">
                                    <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}"
                                           class="w-full bg-white border border-gray-200 rounded-xl pl-12 pr-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none shadow-sm"
                                           required>
                                </div>
                            </div>

                            {{-- Persentase DP --}}
                            <div>
                                <label for="dp_percentage" class="block text-sm font-bold text-gray-700 mb-2">DP Minimal (%)</label>
                                <div class="relative">
                                    <input type="number" name="dp_percentage" id="dp_percentage" value="{{ old('dp_percentage', $service->dp_percentage) }}" min="0" max="100"
                                           class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none shadow-sm"
                                           required>
                                    <span class="absolute right-4 top-3.5 text-gray-400 font-medium text-sm">%</span>
                                </div>
                            </div>

                            {{-- Durasi --}}
                            <div>
                                <label for="duration_minutes" class="block text-sm font-bold text-gray-700 mb-2">Estimasi Durasi</label>
                                <div class="relative">
                                    <input type="number" name="duration_minutes" id="duration_minutes" value="{{ old('duration_minutes', $service->duration_minutes) }}"
                                           class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none shadow-sm"
                                           required>
                                    <span class="absolute right-4 top-3.5 text-gray-400 font-medium text-sm">Menit</span>
                                </div>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Lengkap</label>
                            <textarea name="description" id="description" rows="5"
                                      class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none resize-none shadow-sm"
                                      required>{{ old('description', $service->description) }}</textarea>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="pt-8 border-t border-gray-100 flex items-center justify-end gap-4">
                            <a href="{{ route('admin.services.index') }}" class="px-6 py-3 text-sm font-bold text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-lg transition-colors">
                                Batal
                            </a>
                            <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-full shadow-lg shadow-indigo-600/20 transition-all hover:-translate-y-0.5">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
