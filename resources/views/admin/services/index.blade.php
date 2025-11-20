<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-gray-800 leading-tight tracking-wide">
                {{ __('Kelola Layanan') }}
            </h2>
            {{-- Tombol Tambah --}}
            <a href="{{ route('admin.services.create') }}"
               class="inline-flex items-center px-4 py-2 bg-pink-600 hover:bg-pink-700 text-white text-sm font-bold rounded-full transition-all duration-200 shadow-lg shadow-pink-500/30 hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Tambah Layanan
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition
                     class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 flex items-center justify-between shadow-sm">
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

            <div class="bg-white border border-gray-100 rounded-3xl shadow-xl shadow-gray-200/50 overflow-hidden">
                {{-- Tabel --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th scope="col" class="px-6 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Layanan</th>
                                <th scope="col" class="px-6 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Harga & Durasi</th>
                                <th scope="col" class="px-6 py-5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Ketentuan DP</th>
                                <th scope="col" class="relative px-6 py-5"><span class="sr-only">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($services as $service)
                                <tr class="group hover:bg-pink-50/30 transition-colors duration-200">
                                    {{-- Kolom Nama --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12 bg-pink-100 rounded-2xl flex items-center justify-center text-xl border border-pink-200 shadow-sm group-hover:scale-110 transition-transform duration-300">
                                                <span>💄</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-bold text-gray-900 group-hover:text-pink-600 transition-colors">{{ $service->name }}</div>
                                                <div class="text-xs text-gray-500 mt-0.5 max-w-xs truncate">{{ $service->description }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Kolom Harga --}}
                                    <td class="px-6 py-4 whitespace-nowrap align-middle">
                                        <div class="text-sm font-extrabold text-gray-900">Rp {{ number_format($service->price, 0, ',', '.') }}</div>
                                        <div class="text-xs text-gray-500 flex items-center gap-1 mt-1 font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ $service->duration_minutes }} menit
                                        </div>
                                    </td>

                                    {{-- Kolom DP --}}
                                    <td class="px-6 py-4 whitespace-nowrap align-middle">
                                        <div class="flex flex-col items-start gap-1">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-600 border border-blue-100">
                                                DP {{ $service->dp_percentage }}%
                                            </span>
                                            <span class="text-xs text-gray-500 font-mono">
                                                Min. Rp {{ number_format($service->price * ($service->dp_percentage / 100), 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Kolom Aksi --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end gap-2 opacity-80 group-hover:opacity-100 transition-opacity">
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('admin.services.edit', $service->id) }}"
                                               class="p-2 bg-white border border-gray-200 text-gray-500 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-200 transition-all shadow-sm"
                                               title="Edit Layanan">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                            </a>

                                            {{-- Tombol Hapus --}}
                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="p-2 bg-white border border-gray-200 text-gray-500 rounded-lg hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition-all shadow-sm"
                                                        onclick="return confirm('Yakin ingin menghapus layanan {{ $service->name }}? Data terkait mungkin akan hilang.')"
                                                        title="Hapus Layanan">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            </div>
                                            <h3 class="text-lg font-bold text-gray-900 mb-1">Belum ada layanan</h3>
                                            <p class="text-gray-500 text-sm mb-6">Mulai tambahkan layanan makeup pertama Anda.</p>
                                            <a href="{{ route('admin.services.create') }}" class="text-pink-600 hover:text-pink-700 font-bold text-sm">
                                                + Tambah Layanan Sekarang
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Link Paginasi --}}
                @if($services->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100">
                        {{ $services->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
