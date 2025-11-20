<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight tracking-wide">
            {{ __('Kelola Testimoni') }}
        </h2>
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
                <div class="p-6 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-purple-100 text-purple-600 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">Ulasan Masuk</h3>
                            <p class="text-xs text-gray-500">Kelola testimoni dari klien Anda.</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-1/5">Klien</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-32">Rating</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-2/5">Komentar</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Layanan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="relative px-6 py-4"><span class="sr-only">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($testimonials as $testimonial)
                                <tr class="group hover:bg-pink-50/30 transition-colors duration-200">
                                    {{-- Klien --}}
                                    <td class="px-6 py-4 align-top">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 font-bold text-xs border border-gray-200">
                                                {{ substr($testimonial->booking->client->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900">{{ $testimonial->booking->client->name }}</div>
                                                <div class="text-xs text-gray-500 break-words">{{ $testimonial->booking->client->email }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Rating --}}
                                    <td class="px-6 py-4 align-top">
                                        <div class="flex items-center">
                                            <span class="text-amber-400 mr-1 text-lg">★</span>
                                            <span class="text-sm font-bold text-gray-800">{{ $testimonial->rating }}.0</span>
                                        </div>
                                    </td>

                                    {{-- Komentar --}}
                                    <td class="px-6 py-4 align-top">
                                        <div class="relative">
                                            <p class="text-sm text-gray-600 leading-relaxed pl-2">
                                                {{ $testimonial->comment }}
                                            </p>
                                        </div>
                                    </td>

                                    {{-- Layanan --}}
                                    <td class="px-6 py-4 align-top">
                                        <span class="inline-block px-2.5 py-0.5 text-xs font-bold text-gray-600 bg-gray-100 rounded-md border border-gray-200">
                                            {{ $testimonial->booking->service->name }}
                                        </span>
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4 whitespace-nowrap align-top">
                                        @if($testimonial->is_featured)
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-pink-50 text-pink-600 border border-pink-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-pink-500 animate-pulse"></span>
                                                Unggulan
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-100 text-gray-500 border border-gray-200">
                                                Tersembunyi
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium align-top">
                                        <div class="flex items-center justify-end gap-2 opacity-80 group-hover:opacity-100 transition-opacity">
                                            {{-- Tombol Toggle --}}
                                            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                        class="p-2 rounded-lg border transition-all duration-200 {{ $testimonial->is_featured ? 'bg-gray-50 text-gray-500 border-gray-200 hover:bg-gray-100 hover:text-gray-700' : 'bg-pink-50 text-pink-600 border-pink-200 hover:bg-pink-100 hover:text-pink-700' }}"
                                                        title="{{ $testimonial->is_featured ? 'Sembunyikan' : 'Jadikan Unggulan' }}">
                                                    @if($testimonial->is_featured)
                                                        {{-- Ikon Mata Dicoret (Hide) --}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                                                    @else
                                                        {{-- Ikon Bintang (Feature) --}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.98 9.921c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>
                                                    @endif
                                                </button>
                                            </form>

                                            {{-- Tombol Hapus --}}
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="p-2 bg-white border border-gray-200 text-gray-400 rounded-lg hover:bg-red-50 hover:text-red-500 hover:border-red-200 transition-all shadow-sm"
                                                        onclick="return confirm('Yakin ingin menghapus ulasan ini?')"
                                                        title="Hapus Ulasan">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4 border border-gray-100">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                                            </div>
                                            <h3 class="text-lg font-bold text-gray-900 mb-1">Belum ada ulasan</h3>
                                            <p class="text-gray-500 text-sm">Ulasan dari klien akan muncul di sini setelah mereka menyelesaikan booking.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($testimonials->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
                        {{ $testimonials->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-admin-layout>
