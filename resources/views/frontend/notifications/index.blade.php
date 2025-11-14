<x-main-layout>
    <div class="bg-gray-50 min-h-screen py-12 md:py-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <h1 class="text-xl md:text-4xl font-extrabold text-gray-900 mb-8">
                Kotak Masuk Notifikasi
            </h1>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="divide-y divide-gray-100">

                    @forelse ($notifications as $notification)
                        {{-- Tampilan setiap notifikasi --}}
                        <a href="{{ $notification->url ?? '#' }}"
                           class="block p-6 hover:bg-gray-50 transition-colors duration-200
                                  {{-- Kasih background beda dikit kalau belum dibaca --}}
                                  {{ !$notification->read_at ? 'bg-pink-50/50' : 'bg-white' }}">

                            <div class="flex items-start gap-4">
                                {{-- Ikon --}}
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                    </svg>
                                </div>
                                {{-- Pesan & Waktu --}}
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-800">
                                        {{ $notification->message }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $notification->created_at->diffForHumans() }} {{-- Cth: "5 menit yang lalu" --}}
                                    </p>
                                </div>
                                {{-- Tanda Belum Dibaca --}}
                                @if(!$notification->read_at)
                                <div class="flex-shrink-0">
                                    <span class="w-3 h-3 bg-pink-500 rounded-full" title="Belum dibaca"></span>
                                </div>
                                @endif
                            </div>
                        </a>
                    @empty
                        {{-- Tampilan kalau tidak ada notifikasi --}}
                        <div class="p-12 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-900">Tidak Ada Notifikasi</h3>
                            <p class="text-gray-500 mt-1 text-sm">Semua pembaruan Anda akan muncul di sini.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Paginasi --}}
                <div class="p-6 bg-gray-50 border-t border-gray-100">
                    {{ $notifications->links() }}
                </div>
            </div>

        </div>
    </div>
</x-main-layout>
