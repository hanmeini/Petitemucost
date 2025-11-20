<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight tracking-wide">
            {{ __('Manajemen Jadwal Booking') }}
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
                <div class="p-6 border-b border-gray-100 bg-gray-50/30 flex flex-col sm:flex-row justify-between items-center gap-4">

                    {{-- Judul Kecil --}}
                    <div class="flex items-center gap-2 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" /></svg>
                        <span class="text-sm font-bold uppercase tracking-wider">Filter Status</span>
                    </div>

                    {{-- Tombol Filter Status --}}
                    <div class="flex flex-wrap gap-2">
                        @php
                            $statuses = [
                                '' => 'Semua',
                                'menunggu_konfirmasi' => 'Baru',
                                'menunggu_pembayaran_dp' => 'Tunggu DP',
                                'menunggu_verifikasi_pembayaran' => 'Verifikasi',
                                'terkonfirmasi' => 'Aktif',
                                'selesai' => 'Selesai',
                                'dibatalkan' => 'Batal',
                            ];
                        @endphp

                        @foreach ($statuses as $statusKey => $statusValue)
                            <a href="{{ route('admin.bookings.index', ['status' => $statusKey]) }}"
                               class="px-3 py-1.5 text-xs font-bold rounded-lg transition-all duration-200 border
                                      {{ $currentStatus == $statusKey
                                          ? 'bg-pink-600 text-white border-pink-600 shadow-md shadow-pink-200'
                                          : 'bg-white text-gray-500 border-gray-200 hover:border-pink-300 hover:text-pink-600' }}">
                                {{ $statusValue }}
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- Tabel Daftar Booking --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-1/4">Klien</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-1/4">Layanan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Jadwal</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="relative px-6 py-4">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($bookings as $booking)
                                <tr class="group hover:bg-pink-50/30 transition-colors duration-200">
                                    {{-- Klien --}}
                                    <td class="px-6 py-4 align-top">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 font-bold text-xs border border-gray-200">
                                                {{ substr($booking->client->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900 group-hover:text-pink-600 transition-colors">{{ $booking->client->name }}</div>
                                                <div class="text-xs text-gray-500 break-words">{{ $booking->client->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Layanan --}}
                                    <td class="px-6 py-4 align-top">
                                        <div class="text-sm font-medium text-gray-700 group-hover:text-gray-900">{{ $booking->service->name }}</div>
                                        <div class="text-xs text-gray-400 mt-0.5">DP: Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}</div>
                                    </td>
                                    {{-- Jadwal --}}
                                    <td class="px-6 py-4 whitespace-nowrap align-top">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-gray-800">{{ $booking->booking_date->format('d M Y') }}</span>
                                            <span class="text-xs text-gray-500 flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                {{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }} WIB
                                            </span>
                                        </div>
                                    </td>
                                    {{-- Status --}}
                                    <td class="px-6 py-4 whitespace-nowrap align-top">
                                        @php
                                            $statusClasses = match($booking->status) {
                                                'menunggu_konfirmasi' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                                'menunggu_pembayaran_dp' => 'bg-blue-50 text-blue-700 border-blue-200',
                                                'menunggu_verifikasi_pembayaran' => 'bg-purple-50 text-purple-700 border-purple-200',
                                                'terkonfirmasi' => 'bg-green-50 text-green-700 border-green-200',
                                                'selesai' => 'bg-gray-100 text-gray-600 border-gray-200',
                                                'dibatalkan' => 'bg-red-50 text-red-700 border-red-200',
                                                default => 'bg-gray-50 text-gray-600 border-gray-200',
                                            };
                                        @endphp
                                        <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-bold border {{ $statusClasses }}">
                                            {{ ucwords(str_replace('_', ' ', $booking->status)) }}
                                        </span>
                                    </td>
                                    {{-- Aksi --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium align-middle">
                                        <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                                           class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-gray-200 rounded-lg text-gray-600 text-xs font-bold hover:text-pink-600 hover:border-pink-200 hover:bg-pink-50 transition-all shadow-sm">
                                            <span>Detail</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4 border border-gray-100">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            </div>
                                            <h3 class="text-lg font-bold text-gray-800 mb-1">Tidak ada booking</h3>
                                            <p class="text-gray-500 text-sm">Belum ada data booking yang sesuai dengan filter ini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Paginasi --}}
                @if($bookings->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100">
                        {{ $bookings->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-admin-layout>
