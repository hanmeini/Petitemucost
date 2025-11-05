<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Kelola Layanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1E1E1E] border border-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Tombol untuk Tambah Layanan Baru --}}
                    <div class="mb-4">
                        <a href="/admin/services/create" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Tambah Layanan Baru +
                        </a>
                    </div>

                    {{-- Tabel untuk Menampilkan Layanan --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-600 text-white">
                            <thead class="bg-[#1E1E1E]">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Nama Layanan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Harga</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-mediumuppercase tracking-wider">DP</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Aksi</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#1E1E1E] divide-y divide-gray-600 text-white">
                                {{-- Data akan ditampilkan di sini nanti --}}
                                @forelse ($services as $service)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium">{{ $service->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm ">Rp {{ number_format($service->price, 0, ',', '.') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm ">Rp {{ number_format($service->dp_amount, 0, ',', '.') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.services.edit', $service->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            Belum ada layanan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     {{-- Link Paginasi --}}
                    <div class="mt-4">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
