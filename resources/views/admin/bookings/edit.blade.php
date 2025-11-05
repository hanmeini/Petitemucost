<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Detail Booking') }} #{{ $booking->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Kolom Kiri: Detail Booking & Klien --}}
            <div class="lg:col-span-2">
                <div class="bg-[#1E1E1E] overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-700">
                        <h3 class="text-lg font-semibold mb-4 text-white">Informasi Booking</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-400">Layanan</dt>
                                <dd class="mt-1 text-sm text-white">{{ $booking->service->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-400">Tanggal & Waktu</dt>
                                <dd class="mt-1 text-sm text-white">{{ $booking->booking_date->format('d F Y') }} jam {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-400">Harga Layanan</dt>
                                <dd class="mt-1 text-sm text-white">Rp {{ number_format($booking->service->price, 0, ',', '.') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-400">Jumlah DP</dt>
                                <dd class="mt-1 text-sm text-white">Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}</dd>
                            </div>
                            <div class="md:col-span-2">
                                <dt class="text-sm font-medium text-gray-400">Lokasi Acara</dt>
                                <dd class="mt-1 text-sm text-white">{{ $booking->location_address }}</dd>
                            </div>
                            <div class="md:col-span-2">
                                <dt class="text-sm font-medium text-gray-400">Catatan Klien</dt>
                                <dd class="mt-1 text-sm text-white">{{ $booking->notes ?? '-' }}</dd>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-b border-gray-700">
                        <h3 class="text-lg font-semibold mb-4 text-white">Informasi Klien</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-400">Nama Klien</dt>
                                <dd class="mt-1 text-sm text-white">{{ $booking->client->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-400">Email</dt>
                                <dd class="mt-1 text-sm text-white">{{ $booking->client->email }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-400">Nomor Telepon</dt>
                                <dd class="mt-1 text-sm text-white">{{ $booking->client->phone_number ?? '-' }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Status & Aksi --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-[#1E1E1E] overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4 text-white">Status & Aksi</h3>

                        {{-- Pesan Sukses --}}
                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-md">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-4">
                            <dt class="text-sm font-medium text-gray-400">Status Saat Ini</dt>
                            @php
                                $statusColor = match($booking->status) {
                                    'menunggu_konfirmasi' => 'bg-yellow-100 text-yellow-800',
                                    'menunggu_pembayaran_dp' => 'bg-blue-100 text-blue-800',
                                    'menunggu_verifikasi_pembayaran' => 'bg-blue-100 text-blue-800',
                                    'terkonfirmasi' => 'bg-green-100 text-green-800',
                                    'selesai' => 'bg-gray-100 text-gray-800',
                                    'dibatalkan' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-800',
                                };
                            @endphp
                            <dd class="mt-1">
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $statusColor }}">
                                    {{ ucwords(str_replace('_', ' ', $booking->status)) }}
                                </span>
                            </dd>
                        </div>

                        {{-- ====================================================== --}}
                        {{-- BAGIAN INI YANG ANDA CARI: TOMBOL AKSI KONDISIONAL --}}
                        {{-- ====================================================== --}}

                        {{-- Aksi jika status 'Menunggu Konfirmasi' --}}
                        @if ($booking->status == 'menunggu_konfirmasi')
                            <p class="text-sm text-gray-300 mb-4">Klien ini menunggu konfirmasi ketersediaan jadwal dari Anda.</p>
                            <div class="flex space-x-3">
                                {{-- Form Konfirmasi --}}
                                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="confirm">
                                    <button type="submit" class="w-full text-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">
                                        Konfirmasi Booking
                                    </button>
                                </form>
                                {{-- Form Tolak --}}
                                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="reject">
                                    <button type="submit" class="w-full text-center px-4 py-2 border border-gray-600 rounded-md shadow-sm text-sm font-medium text-white bg-gray-700 hover:bg-gray-600">
                                        Tolak
                                    </button>
                                </form>
                            </div>

                        {{-- Aksi jika status 'Menunggu Verifikasi Pembayaran' --}}
                        @elseif ($booking->status == 'menunggu_verifikasi_pembayaran')
                            <p class="text-sm text-gray-300 mb-4">Klien telah mengunggah bukti pembayaran DP. Silakan periksa dan verifikasi.</p>
                            @if ($booking->payment && $booking->payment->proof_of_payment)
                                <div class="mb-4">
                                    <a href="{{ Storage::url($booking->payment->proof_of_payment) }}" target="_blank" class="text-sm text-indigo-400 hover:text-indigo-300 underline">
                                        Lihat Bukti Pembayaran
                                    </a>
                                    <img src="{{ Storage::url($booking->payment->proof_of_payment) }}" alt="Bukti Pembayaran" class="mt-2 rounded-md border border-gray-600 max-h-60 w-auto">
                                </div>
                                {{-- Form Verifikasi --}}
                                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="verify_payment">
                                    <button type="submit" class="w-full text-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700">
                                        Verifikasi Pembayaran
                                    </button>
                                </form>
                            @else
                                <p class="text-sm text-red-400">Klien belum mengunggah bukti pembayaran.</p>
                            @endif

                        {{-- Aksi jika status 'Terkonfirmasi' --}}
                        @elseif ($booking->status == 'terkonfirmasi')
                            <p class="text-sm text-gray-300 mb-4">Booking ini sudah terkonfirmasi. Setelah layanan selesai, tandai booking ini.</p>
                            {{-- Form Tandai Selesai --}}
                            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="action" value="mark_completed">
                                <button type="submit" class="w-full text-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                                    Tandai Selesai
                                </button>
                            </form>

                        {{-- Tidak ada aksi untuk status lain --}}
                        @else
                            <p class="text-sm text-gray-300">Tidak ada aksi yang tersedia untuk status ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
