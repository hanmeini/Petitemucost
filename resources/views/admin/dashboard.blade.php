<x-admin-layout>
    <x-slot name="header">
        {{-- Judul Header dengan warna gelap --}}
        <h2 class="font-bold text-xl text-gray-800 leading-tight tracking-wide">
            {{ __('Executive Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Grid Kartu Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                {{-- Kartu 1: Total Booking --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg hover:border-pink-100 transition duration-300">
                    {{-- Dekorasi Background Halus --}}
                    <div class="absolute right-0 top-0 w-24 h-24 bg-gray-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-pink-50"></div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-2">
                            <div class="p-3 bg-gray-50 text-gray-400 rounded-xl group-hover:bg-pink-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                            </div>
                            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Total Booking</p>
                        </div>
                        <h4 class="text-3xl font-extrabold text-gray-800 mt-2">{{ $totalBooking }} <span class="text-sm font-medium text-gray-400">Pesanan</span></h4>
                    </div>
                </div>

                {{-- Kartu 2: Terkonfirmasi --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg hover:border-green-100 transition duration-300">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-gray-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-green-50"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-2">
                            <div class="p-3 bg-gray-50 text-gray-400 rounded-xl group-hover:bg-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Terkonfirmasi</p>
                        </div>
                        <h4 class="text-3xl font-extrabold text-gray-800 mt-2">{{ $confirmedCount }} <span class="text-sm font-medium text-gray-400">Jadwal</span></h4>
                    </div>
                </div>

                {{-- Kartu 3: Total Klien --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg hover:border-blue-100 transition duration-300">
                    <div class="absolute right-0 top-0 w-24 h-24 bg-gray-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-blue-50"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-2">
                            <div class="p-3 bg-gray-50 text-gray-400 rounded-xl group-hover:bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            </div>
                            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Total Klien</p>
                        </div>
                        <h4 class="text-3xl font-extrabold text-gray-800 mt-2">{{ $clientCount }} <span class="text-sm font-medium text-gray-400">Orang</span></h4>
                    </div>
                </div>

                {{-- Kartu 4: Total Pendapatan (Special Gradient) --}}
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-lg hover:border-blue-100 transition duration-300">
                    <div class="absolute right-0 top-0 w-32 h-32 bg-white/10 rounded-bl-full -mr-6 -mt-6 transition group-hover:scale-110 duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-2">
                            <div class="p-3 bg-white/20 text-amber-400 rounded-xl backdrop-blur-sm">
                                <svg class="w-6 h-6" fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 76.991 76.992" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="2"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <g> <path d="M46.387,75.839h-5.812c-0.639,0-1.24-0.248-1.692-0.697c-0.458-0.463-0.707-1.063-0.707-1.701l0.016-51.524 c0-0.64,0.25-1.243,0.703-1.696c0.456-0.454,1.058-0.702,1.696-0.702l5.604,0.008c1.32,0.005,2.394,1.079,2.396,2.394v0.048 c2.803-2.202,6.19-3.28,10.262-3.28c10.512,0,18.14,8.825,18.14,20.983c0,15.145-9.986,22.042-19.265,22.042 c-3.352,0-6.428-0.868-8.94-2.491v14.219C48.786,74.763,47.71,75.839,46.387,75.839z M41.176,72.839h4.61V56.038 c0-0.615,0.375-1.167,0.946-1.396c0.572-0.227,1.225-0.082,1.646,0.367c2.247,2.387,5.566,3.702,9.349,3.702 c7.834,0,16.265-5.959,16.265-19.042c0-10.42-6.367-17.983-15.14-17.983c-4.492,0-7.957,1.571-10.588,4.803 c-0.398,0.492-1.063,0.68-1.664,0.467c-0.597-0.211-0.998-0.775-1-1.409l-0.008-3.023l-4.4-0.006L41.176,72.839z M57.816,54.72 c-6.789,0-12.313-6.51-12.313-14.51s5.524-14.509,12.313-14.509c6.791,0,12.316,6.509,12.316,14.509S64.607,54.72,57.816,54.72z M57.816,28.702c-5.135,0-9.313,5.163-9.313,11.509s4.179,11.51,9.313,11.51c5.138,0,9.316-5.164,9.316-11.51 S62.954,28.702,57.816,28.702z"></path> </g> </g> <g> <g> <path d="M34.844,56.259H28.25c-1.124,0-2.137-0.709-2.52-1.768l-7.107-19.626h-6.889v18.713c0,1.478-1.202,2.681-2.68,2.681 H2.681C1.203,56.259,0,55.056,0,53.579V3.873c0-1.475,1.199-2.677,2.673-2.681l12.233-0.04c7.523,0,12.485,1.457,16.095,4.722 c3.068,2.707,4.765,6.748,4.765,11.365c0,6.011-1.837,10.229-6.297,14.32l7.885,21.082c0.305,0.825,0.19,1.744-0.305,2.461 C36.543,55.829,35.72,56.259,34.844,56.259z M28.474,53.259h5.909l-8.084-21.615c-0.221-0.59-0.049-1.254,0.429-1.665 c4.402-3.772,6.039-7.226,6.039-12.741c0-3.744-1.336-6.986-3.764-9.128c-3.031-2.742-7.373-3.959-14.091-3.959L3.001,4.19 v49.069h5.733V33.366c0-0.829,0.671-1.5,1.5-1.5h9.441c0.631,0,1.195,0.396,1.41,0.989L28.474,53.259z M15.575,27.669h-5.341 c-0.829,0-1.5-0.671-1.5-1.5V9.927c0-0.828,0.67-1.499,1.498-1.5l5.117-0.006c0.004-0.001,0.012,0,0.019,0 c9.64,0.107,11.664,5.253,11.664,9.552C27.031,23.772,22.427,27.669,15.575,27.669z M11.734,24.669h3.841 c5.216,0,8.456-2.566,8.456-6.697c0-2.77-0.9-6.462-8.688-6.552l-3.609,0.004V24.669z"></path> </g> </g> </g> </g> </g></svg>
                            </div>
                            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Pendapatan DP</p>
                        </div>
                        <h4 class="text-2xl font-bold mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>

            {{-- Grid Grafik --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

                {{-- Grafik Pendapatan (Area Besar) --}}
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 lg:col-span-2">
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="text-lg font-bold text-gray-800">
                            Tren Pendapatan
                        </h3>

                        {{-- TOMBOL FILTER (Clean Look) --}}
                        <div class="flex bg-gray-100/80 rounded-xl p-1.5">
                            <a href="{{ route('admin.dashboard', ['range' => '7']) }}"
                               class="px-4 py-1.5 text-xs font-semibold rounded-lg transition-all duration-200
                                      {{ $range == '7' ? 'bg-white text-pink-600 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
                                7 Hari
                            </a>
                            <a href="{{ route('admin.dashboard', ['range' => '30']) }}"
                               class="px-4 py-1.5 text-xs font-semibold rounded-lg transition-all duration-200
                                      {{ $range == '30' ? 'bg-white text-pink-600 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
                                1 Bulan
                            </a>
                            <a href="{{ route('admin.dashboard', ['range' => '90']) }}"
                               class="px-4 py-1.5 text-xs font-semibold rounded-lg transition-all duration-200
                                      {{ $range == '90' ? 'bg-white text-pink-600 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
                                3 Bulan
                            </a>
                        </div>
                    </div>
                    <div class="relative h-80 w-full">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                {{-- Grafik Status (Donut) --}}
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col">
                    <h3 class="text-lg font-bold text-gray-800 mb-6 text-center">
                        Komposisi Pesanan
                    </h3>
                    <div class="relative h-64 w-full flex justify-center items-center flex-grow">
                        <canvas id="statusChart"></canvas>

                        {{-- Angka Tengah Donut --}}
                        <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                            <span class="text-4xl font-extrabold text-gray-800" id="totalOrders">{{ $totalBooking }}</span>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide mt-1">Total Order</span>
                        </div>
                    </div>

                    {{-- Legenda Custom --}}
                    <div class="mt-8 grid grid-cols-2 gap-y-3 gap-x-2 text-xs font-medium text-gray-500">
                        <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-amber-400 mr-2"></span> Pending</div>
                        <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-2"></span> Terkonfirmasi</div>
                        <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-rose-500 mr-2"></span> Dibatalkan</div>
                        <div class="flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-blue-500 mr-2"></span> Selesai</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Script Chart.js --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- 1. REVENUE CHART ---
            const ctxRevenue = document.getElementById('revenueChart');
            if (ctxRevenue) {
                const gradient = ctxRevenue.getContext('2d').createLinearGradient(0, 0, 0, 400);
                // Ganti warna gradient jadi Pink lembut
                gradient.addColorStop(0, 'rgba(236, 72, 153, 0.2)'); // Pink-500 opacity
                gradient.addColorStop(1, 'rgba(236, 72, 153, 0.0)');

                new Chart(ctxRevenue, {
                    type: 'line',
                    data: {
                        labels: @json($chartLabels),
                        datasets: [{
                            label: 'Pendapatan',
                            data: @json($chartPendapatanValues),
                            backgroundColor: gradient,
                            borderColor: '#ec4899', // Pink-500 (Warna Garis Utama)
                            borderWidth: 3,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#ec4899',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#fff',
                                titleColor: '#1f2937',
                                bodyColor: '#4b5563',
                                borderColor: '#f3f4f6',
                                borderWidth: 1,
                                padding: 12,
                                cornerRadius: 8,
                                callbacks: {
                                    label: function(context) {
                                        return 'Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { color: '#f3f4f6', borderDash: [5, 5] },
                                ticks: {
                                    color: '#9ca3af',
                                    font: { size: 11 },
                                    callback: function(value) {
                                        if (value >= 1000000) return (value/1000000) + 'jt';
                                        if (value >= 1000) return (value/1000) + 'rb';
                                        return value;
                                    }
                                }
                            },
                            x: {
                                grid: { display: false },
                                ticks: { color: '#9ca3af', font: { size: 11 } }
                            }
                        }
                    }
                });
            }

            // --- 2. STATUS CHART ---
            const ctxStatus = document.getElementById('statusChart');
            if (ctxStatus) {
                new Chart(ctxStatus, {
                    type: 'doughnut',
                    data: {
                        labels: @json($labelStatus),
                        datasets: [{
                            data: @json($dataStatus),
                            backgroundColor: [
                                '#fbbf24', // Pending (Amber)
                                '#10b981', // Active (Emerald)
                                '#f43f5e', // Rejected (Rose)
                                '#3b82f6'  // Finished (Blue)
                            ],
                            borderWidth: 0,
                            hoverOffset: 5
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '80%', // Donut lebih tipis (Modern)
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#fff',
                                bodyColor: '#1f2937',
                                borderColor: '#f3f4f6',
                                borderWidth: 1
                            }
                        }
                    }
                });
            }
        });
    </script>
    @endpush
</x-admin-layout>
