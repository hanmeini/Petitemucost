<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.events.index') }}" class="p-2 bg-white border border-gray-200 rounded-lg text-gray-500 hover:text-pink-600 hover:border-pink-200 transition-all shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
            </a>
            <h2 class="font-bold text-xl text-gray-800 leading-tight tracking-wide">
                {{ __('Tambah Event Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-100 rounded-3xl shadow-xl shadow-gray-200/50 overflow-hidden">

                <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-lg font-bold text-gray-800">Detail Event</h3>
                    <p class="mt-1 text-sm text-gray-500">Informasikan jadwal event cosplay mendatang kepada klien.</p>
                </div>

                <div class="p-8">
                    {{-- Error Validasi --}}
                    @if ($errors->any())
                        <div class="mb-8 p-4 rounded-xl bg-red-50 border border-red-100">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="p-1 bg-red-100 rounded-full text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                </div>
                                <h3 class="text-sm font-bold text-red-700">Ada yang kurang pas nih</h3>
                            </div>
                            <ul class="list-disc list-inside text-sm text-red-600 ml-2 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        {{-- Upload Gambar (Area Besar) --}}
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">Poster / Banner Event</label>
                            <div class="relative group">
                                <input type="file" name="image_path" id="image_path" accept="image/*" required
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                       onchange="previewImage(event)">

                                <div id="upload-placeholder" class="border-2 border-dashed border-gray-300 rounded-2xl p-10 flex flex-col items-center justify-center bg-gray-50 group-hover:bg-gray-100 group-hover:border-pink-300 transition-all">
                                    <div class="p-4 bg-white rounded-full shadow-sm mb-4 group-hover:scale-110 transition-transform">
                                        <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">Klik untuk upload poster</p>
                                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Maks 2MB.</p>
                                </div>

                                <div id="preview-container" class="hidden relative mt-4 rounded-2xl overflow-hidden border border-gray-200 shadow-sm">
                                    <img id="preview-img" src="#" alt="Preview" class="w-full h-auto max-h-[300px] object-cover">
                                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                                        <p class="text-white font-bold text-sm bg-black/50 px-4 py-2 rounded-full backdrop-blur-sm">Ganti Poster</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            {{-- Tanggal --}}
                            <div>
                                <label for="event_date" class="block text-sm font-bold text-gray-700 mb-2">Tanggal Event</label>
                                <input type="date" name="event_date" id="event_date" value="{{ old('event_date') }}"
                                       class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none shadow-sm"
                                       required>
                            </div>

                            {{-- Link --}}
                            <div>
                                <label for="event_url" class="block text-sm font-bold text-gray-700 mb-2">Link Info (Opsional)</label>
                                <div class="relative">
                                    <input type="url" name="event_url" id="event_url" value="{{ old('event_url') }}"
                                           class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 pl-10 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none shadow-sm"
                                           placeholder="https://instagram.com/...">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Lokasi --}}
                        <div>
                            <label for="location_address" class="block text-sm font-bold text-gray-700 mb-2">Lokasi Lengkap</label>
                            <textarea name="location_address" id="location_address" rows="3"
                                      class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-pink-500/20 focus:border-pink-500 transition-all outline-none resize-none shadow-sm"
                                      placeholder="Contoh: Hall A, Jakarta Convention Center (JCC)" required>{{ old('location_address') }}</textarea>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="pt-8 border-t border-gray-100 flex items-center justify-end gap-4">
                            <a href="{{ route('admin.events.index') }}" class="px-6 py-3 text-sm font-bold text-gray-500 hover:text-gray-800 hover:bg-gray-50 rounded-lg transition-colors">
                                Batal
                            </a>
                            <button type="submit" class="px-8 py-3 bg-pink-600 hover:bg-pink-700 text-white text-sm font-bold rounded-full shadow-lg shadow-pink-600/20 transition-all hover:-translate-y-0.5">
                                Simpan Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const placeholder = document.getElementById('upload-placeholder');
            const previewContainer = document.getElementById('preview-container');
            const previewImg = document.getElementById('preview-img');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    placeholder.classList.add('hidden');
                    previewContainer.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-admin-layout>
