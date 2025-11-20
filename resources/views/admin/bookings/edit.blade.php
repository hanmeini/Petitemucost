<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.bookings.index') }}" class="p-2 bg-white border border-gray-200 rounded-lg text-gray-500 hover:text-pink-600 hover:border-pink-200 transition-all shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
            </a>
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight tracking-wide">
                    {{ __('Detail Booking') }}
                </h2>
                <p class="text-xs text-gray-500 font-mono mt-0.5">ID: #{{ $booking->id }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Kolom Kiri: Detail Booking & Klien --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- Card Informasi Booking --}}
                <div class="bg-white border border-gray-100 rounded-3xl shadow-xl shadow-gray-200/50 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50 flex items-center gap-3">
                        <div class="p-2 bg-pink-100 rounded-lg text-pink-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Informasi Layanan</h3>
                    </div>
                    <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <dt class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Layanan</dt>
                            <dd class="text-lg font-bold text-gray-900">{{ $booking->service->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Waktu Pelaksanaan</dt>
                            <dd class="text-base font-medium text-gray-800 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                {{ $booking->booking_date->format('d F Y') }}
                            </dd>
                            <dd class="text-sm text-gray-500 ml-6">Pukul {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }} WIB</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Harga</dt>
                            <dd class="text-base font-medium text-gray-800">Rp {{ number_format($booking->service->price, 0, ',', '.') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Nominal DP</dt>
                            <dd class="text-base font-bold text-pink-600">Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}</dd>
                        </div>
                        <div class="md:col-span-2">
                            <dt class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Lokasi Acara</dt>
                            <dd class="text-sm text-gray-700 bg-gray-50 p-4 rounded-xl border border-gray-100">{{ $booking->location_address }}</dd>
                        </div>
                        <div class="md:col-span-2">
                            <dt class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Catatan Klien</dt>
                            <dd class="text-sm text-gray-600 italic">{{ $booking->notes ?? 'Tidak ada catatan tambahan.' }}</dd>
                        </div>
                    </div>
                </div>

                {{-- Card Informasi Klien --}}
                <div class="bg-white border border-gray-100 rounded-3xl shadow-xl shadow-gray-200/50 overflow-hidden">
                    <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50 flex items-center gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Data Klien</h3>
                    </div>
                    <div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="flex items-center gap-4 md:col-span-1">
                            <img class="h-16 w-16 rounded-full object-cover border-2 border-gray-100"
                                 src="{{ $booking->client->avatar ? Storage::url($booking->client->avatar) : 'https://placehold.co/100x100/fce7f3/d15b88?text=' . strtoupper(substr($booking->client->name, 0, 1)) }}"
                                 alt="{{ $booking->client->name }}">
                        </div>
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <dt class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Nama Lengkap</dt>
                                <dd class="text-base font-bold text-gray-900">{{ $booking->client->name }}</dd>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <dt class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Email</dt>
                                    <dd class="text-sm text-gray-700 break-words">{{ $booking->client->email }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">WhatsApp</dt>
                                    <dd class="text-sm text-gray-700">{{ $booking->client->phone_number ?? '-' }}</dd>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Status & Aksi (Sticky) --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white border border-gray-100 rounded-3xl shadow-xl shadow-gray-200/50 overflow-hidden sticky top-24">
                    <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                        <h3 class="text-lg font-bold text-gray-800">Status & Aksi</h3>
                    </div>

                    <div class="p-6">
                        {{-- Pesan Sukses --}}
                        @if (session('success'))
                            <div class="mb-6 p-3 bg-green-50 text-green-700 rounded-xl border border-green-100 text-sm font-medium flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-8 text-center">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Status Saat Ini</p>
                            @php
                                $statusConfig = match($booking->status) {
                                    'menunggu_konfirmasi' => ['bg' => 'bg-yellow-50', 'text' => 'text-yellow-700', 'border' => 'border-yellow-200', 'icon' => '⏳'],
                                    'menunggu_pembayaran_dp' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'border' => 'border-blue-200', 'icon' => '💳'],
                                    'menunggu_verifikasi_pembayaran' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-700', 'border' => 'border-purple-200', 'icon' => '🔍'],
                                    'terkonfirmasi' => ['bg' => 'bg-green-50', 'text' => 'text-green-700', 'border' => 'border-green-200', 'icon' => '✅'],
                                    'selesai' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-600', 'border' => 'border-gray-200', 'icon' => '🏁'],
                                    'dibatalkan' => ['bg' => 'bg-red-50', 'text' => 'text-red-700', 'border' => 'border-red-200', 'icon' => '❌'],
                                    default => ['bg' => 'bg-gray-50', 'text' => 'text-gray-600', 'border' => 'border-gray-200', 'icon' => '?'],
                                };
                            @endphp
                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-bold border {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }} {{ $statusConfig['border'] }}">
                                <span>{{ $statusConfig['icon'] }}</span>
                                {{ ucwords(str_replace('_', ' ', $booking->status)) }}
                            </span>
                        </div>

                        {{-- ====================================================== --}}
                        {{-- TOMBOL AKSI KONDISIONAL --}}
                        {{-- ====================================================== --}}

                        <div class="space-y-4">
                            @if ($booking->status == 'menunggu_konfirmasi')
                                <div class="p-4 bg-yellow-50 rounded-xl border border-yellow-100 text-sm text-yellow-800 mb-4">
                                    <strong>Perhatian:</strong> Cek ketersediaan jadwal Anda sebelum mengonfirmasi.
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="action" value="confirm">
                                        <button type="submit" class="w-full py-2.5 px-4 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl shadow-md shadow-green-200 transition-all hover:-translate-y-0.5 text-sm">
                                            Terima
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="action" value="reject">
                                        <button type="submit" class="w-full py-2.5 px-4 bg-white border border-gray-200 text-gray-700 hover:bg-red-50 hover:text-red-600 hover:border-red-200 font-bold rounded-xl transition-all text-sm">
                                            Tolak
                                        </button>
                                    </form>
                                </div>

                            @elseif ($booking->status == 'menunggu_verifikasi_pembayaran')
                                <div class="p-4 bg-purple-50 rounded-xl border border-purple-100 mb-4">
                                    <p class="text-sm text-purple-900 font-medium mb-3">Bukti Pembayaran Klien:</p>
                                    @if ($booking->payment && $booking->payment->proof_of_payment)
                                        <a href="{{ Storage::url($booking->payment->proof_of_payment) }}" target="_blank" class="group relative block rounded-lg overflow-hidden border border-purple-200 mb-4">
                                            <img src="{{ Storage::url($booking->payment->proof_of_payment) }}" alt="Bukti" class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                                <span class="text-white text-xs font-bold bg-black/50 px-2 py-1 rounded">Lihat Full</span>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="action" value="verify_payment">
                                            <button type="submit" class="w-full py-2.5 px-4 bg-purple-600 hover:bg-purple-700 text-white font-bold rounded-xl shadow-md shadow-purple-200 transition-all hover:-translate-y-0.5 text-sm">
                                                Verifikasi Sah
                                            </button>
                                        </form>
                                    @else
                                        <p class="text-xs text-red-500 italic">File bukti tidak ditemukan.</p>
                                    @endif
                                </div>

                            @elseif ($booking->status == 'terkonfirmasi')
                                <div class="p-4 bg-green-50 rounded-xl border border-green-100 text-sm text-green-800 mb-4">
                                    Jadwal terkunci. Layanan siap dilaksanakan.
                                </div>
                                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="action" value="mark_completed">
                                    <button type="submit" class="w-full py-3 px-4 bg-gray-900 hover:bg-gray-800 text-white font-bold rounded-xl shadow-lg transition-all hover:-translate-y-0.5 text-sm flex items-center justify-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                        Tandai Selesai
                                    </button>
                                </form>

                            @else
                                <div class="p-4 bg-gray-50 rounded-xl border border-gray-200 text-center">
                                    <p class="text-sm text-gray-500">Tidak ada aksi tersedia.</p>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
