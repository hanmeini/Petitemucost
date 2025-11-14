<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Kelola Testimoni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1E1E1E] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-300">

                    {{-- Pesan Sukses (jika ada) --}}
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h3 class="text-xl font-bold text-white mb-6">Ulasan yang Masuk dari Klien</h3>

                    {{-- Tabel Daftar Testimoni --}}
                    <div class="overflow-x-auto border border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Klien</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Rating</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Komentar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Layanan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                    <th class="relative px-6 py-3">
                                        <span class="sr-only">Aksi</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#1E1E1E] divide-y divide-gray-700">
                                @forelse ($testimonials as $testimonial)
                                    <tr>
                                        {{-- Klien --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-white">{{ $testimonial->booking->client->name }}</div>
                                            <div class="text-sm text-gray-400">{{ $testimonial->booking->client->email }}</div>
                                        </td>

                                        {{-- Rating Bintang --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 7.09l6.572-.955L10 0l2.939 6.135 6.572.955-4.756 4.455 1.123 6.545z"/>
                                                    </svg>
                                                @endfor
                                                <span class="ml-1 text-white font-bold">({{ $testimonial->rating }})</span>
                                            </div>
                                        </td>

                                        {{-- Komentar --}}
                                        <td class="px-6 py-4">
                                            <p class="text-sm text-gray-300 max-w-xs break-words whitespace-pre-wrap">{{ $testimonial->comment }}</p>
                                        </td>

                                        {{-- Layanan --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $testimonial->booking->service->name }}</td>

                                        {{-- Status Unggulan --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($testimonial->is_featured)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                                    Unggulan
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-600 text-gray-100">
                                                    Tersembunyi
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Aksi (Nanti kita isi) --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center gap-4">
                                                <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')
                                                    @if($testimonial->is_featured)
                                                        <button type="submit" class="text-gray-400 hover:text-white" title="Sembunyikan">Sembunyikan</button>
                                                    @else
                                                        <button type="submit" class="text-pink-400 hover:text-pink-300" title="Jadikan Unggulan">Unggulkan</button>
                                                    @endif
                                                </form>
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin mau hapus ulasan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300 ml-4">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-10 whitespace-nowrap text-center text-sm text-gray-400">
                                            Belum ada testimoni yang masuk.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Paginasi --}}
                    <div class="mt-6">
                        {{ $testimonials->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
