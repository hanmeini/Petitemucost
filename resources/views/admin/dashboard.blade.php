<x-admin-layout>
    {{-- Header Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Grid untuk Kartu Ringkasan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                <!-- Kartu 1: Booking Baru -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                    <div class="flex flex-row items-center justify-between pb-2">
                        <h3 class="text-sm font-medium">Booking Baru</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-4 w-4 text-gray-500">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <line x1="19" x2="19" y1="8" y2="14"></line>
                            <line x1="22" x2="16" y1="11" y2="11"></line>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">{{ $newBookingsCount }}</div>
                        <p class="text-xs text-gray-500">Permintaan perlu dikonfirmasi</p>
                    </div>
                </div>

                <!-- Kartu 2: Menunggu Pembayaran -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                    <div class="flex flex-row items-center justify-between pb-2">
                        <h3 class="text-sm font-medium">Menunggu Pembayaran</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-4 w-4 text-gray-500">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">{{ $pendingPaymentsCount }}</div>
                        <p class="text-xs text-gray-500">Menunggu bukti transfer atau verifikasi</p>
                    </div>
                </div>

                <!-- Kartu 3: Jadwal Terkonfirmasi -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                    <div class="flex flex-row items-center justify-between pb-2">
                        <h3 class="text-sm font-medium">Jadwal Terkonfirmasi (Bulan Ini)</h3>
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-gray-500">
                            <path d="M8 2v4"></path>
                            <path d="M16 2v4"></path>
                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                            <path d="M3 10h18"></path>
                            <path d="m9 16 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">{{ $confirmedBookingsCount }}</div>
                        <p class="text-xs text-gray-500">Total jadwal yang sudah DP bulan ini</p>
                    </div>
                </div>

                <!-- Kartu 4: Total Pendapatan DP -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
                    <div class="flex flex-row items-center justify-between pb-2">
                        <h3 class="text-sm font-medium">Pendapatan DP (Bulan Ini)</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-4 w-4 text-gray-500">
                            <line x1="12" x2="12" y1="2" y2="22"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-bold">Rp {{ number_format($totalRevenueMonth, 0, ',', '.') }}</div>
                        <p class="text-xs text-gray-500">Estimasi pendapatan dari DP terverifikasi</p>
                    </div>
                </div>
            </div>

            {{-- --- BAGIAN GRAFIK PENDAPATAN --- --}}
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Pendapatan DP (7 Hari Terakhir)</h3>
                <div class="">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>

            {{-- Kolom Utama untuk Booking Terbaru --}}
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="p-6">
                    <h3 class="text-lg font-medium">Booking Terbaru</h3>
                    <p class="text-sm text-gray-500 mb-4">
                        Berikut adalah 5 booking terakhir yang masuk ke sistem.
                    </p>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Klien</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Booking</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($recentBookings as $booking)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $booking->client->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $booking->service->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($booking->booking_date)->translatedFormat('d F Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        {{-- Logika warna untuk status --}}
                                        @php
                                            $statusColor = match($booking->status) {
                                                'menunggu_konfirmasi' => 'bg-yellow-100 text-yellow-800',
                                                'menunggu_pembayaran_dp' => 'bg-blue-100 text-blue-800',
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
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                        Belum ada data booking.
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
        {{-- Script untuk Menggambar Grafik --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('revenueChart');

            // Pastikan elemen canvas ditemukan sebelum membuat chart
            if (ctx) {
                const chartLabels = @json($chartLabels);
                const chartData = @json($chartData);

                new Chart(ctx, {
                    type: 'bar', // Tipe grafik: bar, line, pie, dll.
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            label: 'Pendapatan DP',
                            data: chartData,
                            backgroundColor: 'rgba(236, 72, 153, 0.2)', // Warna pink dengan transparansi
                            borderColor: 'rgba(236, 72, 153, 1)',     // Warna pink solid
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    // Format angka di sumbu Y menjadi format Rupiah
                                    callback: function(value, index, values) {
                                        return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false // Sembunyikan legenda
                            }
                        }
                    }
                });
            }
        });
    </script>
    @endpush
</x-admin-layout>

