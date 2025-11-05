<x-main-layout>

    {{-- Konten Utama Halaman Dashboard Klien --}}
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold text-gray-900 mb-6">Riwayat Booking Saya</h1>

            {{-- Pesan Sukses (setelah berhasil booking) --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg shadow">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg shadow">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Daftar Booking --}}
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="divide-y divide-gray-200">

                    @forelse ($bookings as $booking)
                        <div class="p-6 flex flex-col md:flex-row justify-between items-start md:items-center">
                            {{-- Detail Booking --}}
                            <div class="flex-1 mb-4 md:mb-0">
                                <div class="flex items-center mb-2">
                                    <h3 class="text-xl font-semibold text-gray-900">{{ $booking->service->name }}</h3>
                                    {{-- Label Status --}}
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
                                    <span class="ml-3 px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                        {{ ucwords(str_replace('_', ' ', $booking->status)) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600">
                                    Jadwal: <strong>{{ $booking->booking_date->format('d F Y') }}</strong> jam <strong>{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}</strong>
                                </p>
                                <p class="text-sm text-gray-600">
                                    Lokasi: {{ $booking->location_address }}
                                </p>
                                <p class="text-sm text-gray-600 mt-1">
                                    Total DP: <strong class="text-gray-900">Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}</strong>
                                </p>
                            </div>

                            {{-- Tombol Aksi Klien (Diperbarui) --}}
                            <div class="flex-shrink-0">
                                {{-- Jika status 'menunggu_pembayaran_dp', tampilkan tombol Upload --}}
                                @if ($booking->status == 'menunggu_pembayaran_dp')
                                    <a href="{{ route('payment.create', $booking->id) }}" class="inline-block bg-pink-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-pink-700 transition duration-200">
                                        Upload Bukti DP
                                    </a>
                                {{-- Jika status 'menunggu_verifikasi_pembayaran', tampilkan info --}}
                                @elseif ($booking->status == 'menunggu_verifikasi_pembayaran')
                                    <p class="text-sm font-medium text-blue-600">Menunggu Verifikasi Admin</p>
                                    {{-- Tampilkan link untuk melihat bukti yang sudah di-upload --}}
                                    @if($booking->payment && $booking->payment->proof_of_payment)
                                        <a href="{{ Storage::url($booking->payment->proof_of_payment) }}" target="_blank" class="text-xs text-gray-500 underline">Lihat Bukti</a>
                                    @endif
                                {{-- Jika status 'terkonfirmasi', tampilkan info --}}
                                @elseif ($booking->status == 'terkonfirmasi')
                                    <p class="text-sm font-medium text-green-600">Booking Terkonfirmasi</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center">
                            <p class="text-gray-500">Anda belum memiliki riwayat booking.</p>
                            <a href="{{ route('services.index') }}" class="mt-4 inline-block bg-pink-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-pink-700 transition duration-200">
                                Mulai Booking Sekarang
                            </a>
                        </div>
                    @endforelse
                </div>

                {{-- Link Paginasi --}}
                <div class="p-6 bg-gray-50 border-t border-gray-200">
                    {{ $bookings->links() }}
                </div>
            </div>

        </div>
    </div>
</x-main-layout>
