<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Tambah Portofolio Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1E1E1E] overflow-hidden shadow-sm sm:rounded-lg">
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

                    <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Pilih Layanan --}}
                            <div class="md:col-span-2">
                                <label for="service_id" class="block text-sm font-medium text-white">Pilih Layanan</label>
                                <select name="service_id" id="service_id" class="mt-1 block w-full rounded-md border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-[#1E1E1E] text-white" required>
                                    <option value="">-- Pilih Layanan --</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Judul Portofolio --}}
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-white">Judul Portofolio</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="bg-[#1E1E1E] text-white mt-1 block w-full rounded-md border-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            </div>

                            {{-- Upload Gambar --}}
                            <div class="md:col-span-2">
                                <label for="image" class="block text-sm font-medium text-white">Gambar Portofolio</label>
                                <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                                <p class="mt-1 text-xs text-gray-500">Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB.</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 gap-4">
                            <a href="{{ route('admin.portfolios.index') }}" class="text-sm text-white hover:text-red-200">
                                Batal
                            </a>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Simpan Portofolio
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
