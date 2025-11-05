<x-app-layout> {{-- Menggunakan layout standar Breeze/app --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Booking Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Menampilkan pesan sukses setelah submit booking --}}
            @if (session('success'))
                <div class_alias="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-sm" role="alert">
                    <strong class_alias="font-bold">Berhasil!</strong>
                    <span class_alias="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-semibold mb-4">Daftar Booking Anda</h3>

                    {{-- Tabel Daftar Booking --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total DP</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="relative px-6 py-3">
                                        <span class="sr-only">Aksi</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($bookings as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $booking->service->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->booking_date->format('d M Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                // Logika warna status
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
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                                {{ ucwords(str_replace('_', ' ', $booking->status)) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{-- Nanti kita tambahkan link aksi di sini --}}
                                            {{-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Lihat Detail</a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            Anda belum memiliki riwayat booking.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Paginasi --}}
                    <div class="mt-4">
                        {{ $bookings->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
