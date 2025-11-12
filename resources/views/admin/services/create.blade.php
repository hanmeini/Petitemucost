<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Tambah Layanan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1E1E1E] text-white border border-gray-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Menampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Whoops!</strong>
                            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-white">
                            {{-- Nama Layanan --}}
                            <div class="md:col-span-2">
                                <label for="name" class="block text-sm font-medium">Nama Layanan</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full bg-[#1E1E1E] rounded-md border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            {{-- Harga --}}
                            <div>
                                <label for="price" class="block text-sm font-medium">Harga (Rp)</label>
                                <input type="number" name="price" id="price" value="{{ old('price') }}" class="mt-1 block w-full rounded-md bg-[#1E1E1E] border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            {{-- Persentase DP --}}
                            <div>
                                <label for="dp_percentage" class="block text-sm font-medium">Persentase DP (%)</label>
                                <input type="number" name="dp_percentage" id="dp_percentage" value="{{ old('dp_percentage') }}" min="0" max="100" class="mt-1 block w-full rounded-md bg-[#1E1E1E] border-gray-600shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <p class="mt-1 text-xs text-gray-500">Contoh: 50 (untuk 50%)</p>
                            </div>

                             {{-- Durasi --}}
                            <div>
                                <label for="duration_minutes" class="block text-sm font-medium">Durasi (Menit)</label>
                                <input type="number" name="duration_minutes" id="duration_minutes" value="{{ old('duration_minutes') }}" class="mt-1 block w-full rounded-md bg-[#1E1E1E] border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-medium">Deskripsi</label>
                                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md bg-[#1E1E1E] border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 gap-4">
                            <a href="{{ route('admin.services.index') }}" class="text-sm hover:text-gray-200">
                                Batal
                            </a>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Simpan Layanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
