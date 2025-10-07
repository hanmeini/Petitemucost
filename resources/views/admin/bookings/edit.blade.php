<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Flash Messages --}}
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Tombol Kembali --}}
                    <div class="mb-6">
                        <a href="{{ route('bookings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            ← Kembali ke Daftar Booking
                        </a>
                    </div>

                    {{-- Informasi Booking --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {{-- Informasi Klien --}}
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Klien</h3>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->client->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->client->email }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Telepon</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->client->phone ?? 'Tidak tersedia' }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Informasi Layanan --}}
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Layanan</h3>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nama Layanan</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->service->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Harga</label>
                                    <p class="mt-1 text-sm text-gray-900">Rp {{ number_format($booking->service->price, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">DP Amount</label>
                                    <p class="mt-1 text-sm text-gray-900">Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Durasi</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ $booking->service->duration_minutes }} menit</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Informasi Jadwal --}}
                    <div class="mt-8 bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Jadwal</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Booking</label>
                                <p class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Waktu Booking</label>
                                <p class="mt-1 text-sm text-gray-900">{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Lokasi</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $booking->location_address }}</p>
                            </div>
                            @if($booking->notes)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Catatan</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $booking->notes }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Status dan Aksi --}}
                    <div class="mt-8 bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Status & Aksi</h3>

                        {{-- Status Saat Ini --}}
                        <div class="mb-6">
                            @php
                                $statusColors = [
                                    'menunggu konfirmasi' => 'bg-yellow-100 text-yellow-800',
                                    'menunggu pembayaran dp' => 'bg-blue-100 text-blue-800',
                                    'terkonfirmasi' => 'bg-green-100 text-green-800',
                                    'selesai' => 'bg-gray-100 text-gray-800',
                                    'dibatalkan' => 'bg-red-100 text-red-800'
                                ];
                                $statusLabels = [
                                    'menunggu konfirmasi' => 'Menunggu Konfirmasi',
                                    'menunggu pembayaran dp' => 'Menunggu Pembayaran DP',
                                    'terkonfirmasi' => 'Terkonfirmasi',
                                    'selesai' => 'Selesai',
                                    'dibatalkan' => 'Dibatalkan'
                                ];
                            @endphp
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status Saat Ini</label>
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $statusColors[$booking->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $statusLabels[$booking->status] ?? ucfirst($booking->status) }}
                            </span>
                        </div>

                        {{-- Bukti Pembayaran (jika ada) --}}
                        @if($booking->payment && $booking->payment->proof_of_payment)
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bukti Pembayaran</label>
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $booking->payment->proof_of_payment) }}"
                                     alt="Bukti Pembayaran"
                                     class="h-64 w-auto object-contain border border-gray-300 rounded-lg">
                            </div>
                        </div>
                        @endif

                        {{-- Tombol Aksi Berdasarkan Status --}}
                        <div class="space-y-4">
                            @if($booking->status === 'menunggu konfirmasi')
                                <div class="flex space-x-4">
                                    <form action="{{ route('bookings.update', $booking) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="confirm">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            ✓ Konfirmasi Booking
                                        </button>
                                    </form>
                                    <form action="{{ route('bookings.update', $booking) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="reject">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm('Apakah Anda yakin ingin menolak booking ini?')">
                                            ✗ Tolak Booking
                                        </button>
                                    </form>
                                </div>
                            @elseif($booking->status === 'menunggu pembayaran dp' && $booking->payment && $booking->payment->proof_of_payment)
                                <form action="{{ route('bookings.update', $booking) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="verify_payment">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        ✓ Verifikasi Pembayaran
                                    </button>
                                </form>
                            @elseif($booking->status === 'terkonfirmasi')
                                <form action="{{ route('bookings.update', $booking) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="mark_completed">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        ✓ Tandai Selesai
                                    </button>
                                </form>
                            @else
                                <p class="text-sm text-gray-500">Tidak ada aksi yang tersedia untuk status ini.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
