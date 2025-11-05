<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Layanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1E1E1E] border border-gray-600 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

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

                    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Method 'PUT' khusus untuk update --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-white">
                            {{-- Nama Layanan --}}
                            <div>
                                <x-input-label for="name" :value="__('Nama Layanan')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $service->name)" required autofocus />
                            </div>

                            {{-- Harga --}}
                            <div>
                                <x-input-label for="price" :value="__('Harga (Rp)')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $service->price)" required />
                            </div>

                            {{-- Persentase DP --}}
                            <div>
                                <x-input-label for="dp_percentage" :value="__('Persentase DP (%)')" />
                                <x-text-input id="dp_percentage" class="block mt-1 w-full" type="number" name="dp_percentage" :value="old('dp_percentage', $service->dp_percentage)" required />
                            </div>

                            {{-- Durasi --}}
                            <div>
                                <x-input-label for="duration_minutes" :value="__('Durasi (Menit)')" />
                                <x-text-input id="duration_minutes" class="block mt-1 w-full" type="number" name="duration_minutes" :value="old('duration_minutes', $service->duration_minutes)" required />
                            </div>

                            {{-- Deskripsi --}}
                            <div class="md:col-span-2">
                                <x-input-label for="description" :value="__('Deskripsi')" />
                                <textarea name="description" id="description" rows="4" class="bg-gray-700 block mt-1 w-full border-gray-600 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $service->description) }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 justify-end mt-6">
                            <a href="{{ route('services.index') }}" class="text-sm text-red-400 transition-colors hover:text-red-500">
                                Batal
                            </a>
                            <x-primary-button>
                                {{ __('Simpan Perubahan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
