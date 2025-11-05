<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Manajemen Jadwal Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1E1E1E] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">

                    {{-- Flash Messages --}}
                    @if (session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="mb-4 flex flex-wrap gap-2">
                        @php
                            $statuses = [
                                '' => 'Semua',
                                'menunggu_konfirmasi' => 'Booking Baru',
                                'menunggu_pembayaran_dp' => 'Menunggu DP',
                                'menunggu_verifikasi_pembayaran' => 'Verifikasi DP',
                                'terkonfirmasi' => 'Terkonfirmasi',
                                'selesai' => 'Selesai',
                                'dibatalkan' => 'Dibatalkan',
                            ];
                        @endphp

                        @foreach ($statuses as $statusKey => $statusValue)
                            <a href="{{ route('admin.bookings.index', ['status' => $statusKey]) }}"
                               class="px-3 py-1 text-sm font-medium rounded-md
                                      {{ $currentStatus == $statusKey ? 'bg-pink-600 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600' }}">
                                {{ $statusValue }}
                            </a>
                        @endforeach
                    </div>

                    {{-- Tabel untuk Menampilkan Booking --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-[#1E1E1E] text-white">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Klien</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Layanan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Booking</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Total Harga</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Aksi</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#1E1E1E] divide-y divide-gray-500">
                                @forelse ($bookings as $booking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-white">{{ $booking->client->name }}</div>
                                            <div class="text-sm text-white">{{ $booking->client->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-white">{{ $booking->service->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-white">{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</div>
                                            <div class="text-sm text-white">{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @php
                                                $statusColors = [
                                                    'menunggu konfirmasi' => 'bg-yellow-200 text-yellow-800',
                                                    'menunggu pembayaran dp' => 'bg-blue-200 text-blue-800',
                                                    'terkonfirmasi' => 'bg-green-200 text-green-800',
                                                    'selesai' => 'bg-gray-200 text-gray-800',
                                                    'dibatalkan' => 'bg-red-200 text-red-800'
                                                ];
                                                $statusLabels = [
                                                    'menunggu konfirmasi' => 'Menunggu Konfirmasi',
                                                    'menunggu pembayaran dp' => 'Menunggu Pembayaran DP',
                                                    'terkonfirmasi' => 'Terkonfirmasi',
                                                    'selesai' => 'Selesai',
                                                    'dibatalkan' => 'Dibatalkan'
                                                ];
                                            @endphp
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $statusColors[$booking->status] ?? 'bg-gray-100 text-gray-800' }}">
                                                {{ $statusLabels[$booking->status] ?? ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-white">Rp {{ number_format($booking->service->price, 0, ',', '.') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="text-white hover:text-blue-300">
                                                Detail & Aksi
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                            Belum ada booking.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
