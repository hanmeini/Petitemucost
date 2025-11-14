<x-main-layout>

    <div class="bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-xl md:text-4xl font-extrabold text-gray-900 mb-2">
                    Riwayat Booking Saya
                </h1>
                <p class="text-lg text-gray-500">
                    Sesi booking Anda terorganisir di sini.
                </p>
            </div>

            {{-- Pesan Sukses (setelah berhasil booking) --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-xl shadow-sm border border-green-200">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-xl shadow-sm border border-red-200">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Navigasi Tab (Sesuai Desain) --}}
            <nav class="flex space-x-2 border-b border-gray-200 mb-8">
                <a href="{{ route('dashboard', ['tab' => 'all']) }}"
                   class="py-3 px-1 text-base font-semibold transition-colors duration-200
                          {{ $activeTab == 'all'
                             ? 'border-b-2 border-pink-600 text-pink-600'
                             : 'border-b-2 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                    Semua
                </a>
                <a href="{{ route('dashboard', ['tab' => 'upcoming']) }}"
                   class="py-3 px-1 text-base font-semibold transition-colors duration-200
                          {{ $activeTab == 'upcoming'
                             ? 'border-b-2 border-pink-600 text-pink-600'
                             : 'border-b-2 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                    Terkonfirmasi
                </a>
                <a href="{{ route('dashboard', ['tab' => 'pending']) }}"
                   class="py-3 px-1 text-base font-semibold transition-colors duration-200
                          {{ $activeTab == 'pending'
                             ? 'border-b-2 border-pink-600 text-pink-600'
                             : 'border-b-2 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                    Menunggu Konfirmasi
                </a>
                <a href="{{ route('dashboard', ['tab' => 'history']) }}"
                   class="py-3 px-1 text-base font-semibold transition-colors duration-200
                          {{ $activeTab == 'history'
                             ? 'border-b-2 border-pink-600 text-pink-600'
                             : 'border-b-2 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                    Selesai
                </a>
            </nav>

            {{-- Daftar Kartu Booking --}}
            <div class="space-y-6">
                @forelse ($bookings as $booking)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 transition-all duration-300 hover:shadow-md">
                        <div class="flex flex-col sm:flex-row justify-between">
                            {{-- Info Kiri --}}
                            <div class="flex-1 mb-4 sm:mb-0">
                                <p class="text-sm text-gray-500 mb-1">Session with</p>
                                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $booking->service->name }}</h3>

                                <div class="flex items-center gap-4 text-sm text-gray-600 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
                                    <span>{{ $booking->booking_date->format('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-center gap-4 text-sm text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" /></svg>
                                    <span>{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }} (Durasi: ±{{ $booking->service->duration_minutes }} Mnt)</span>
                                </div>
                            </div>

                            {{-- Info Kanan (Status & Aksi) --}}
                            <div class="flex-shrink-0 flex flex-col items-start sm:items-end justify-between">
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
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }} mb-4">
                                    {{ ucwords(str_replace('_', ' ', $booking->status)) }}
                                </span>

                                {{-- Tombol Aksi Klien --}}
                                <div class="flex-shrink-0">
                                    @if ($booking->status == 'menunggu_pembayaran_dp')
                                        <a href="{{ route('payment.create', $booking->id) }}" class="inline-flex items-center gap-1.5 font-bold text-pink-600 hover:text-pink-700 transition-colors">
                                            <span>Upload Bukti DP</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                        </a>
                                    @elseif ($booking->status == 'menunggu_verifikasi_pembayaran')
                                        <a href="{{ $booking->payment ? Storage::url($booking->payment->proof_of_payment) : '#' }}" target="_blank" class="font-medium text-blue-600 hover:text-blue-700 transition-colors text-sm underline decoration-dotted">
                                            Lihat Bukti
                                        </a>
                                    @elseif ($booking->status == 'terkonfirmasi')
                                        <p class="text-sm font-medium text-green-600">Booking Terkonfirmasi</p>

                                    {{-- INI LOGIKA BARUNYA --}}
                                    @elseif ($booking->status == 'selesai')
                                        @if ($booking->testimonial)
                                            <p class="text-sm font-medium text-green-600 flex items-center gap-1.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                                Sudah Diulas
                                            </p>
                                        @else
                                            <a href="{{ route('testimonial.create', $booking->id) }}" class="inline-flex items-center gap-1.5 font-bold text-pink-600 hover:text-pink-700 transition-colors">
                                                <span>Beri Ulasan</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                            </a>
                                        @endif

                                    @else
                                        <span class="text-sm text-gray-400">Tidak ada aksi</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-12 text-center bg-white rounded-2xl shadow-sm border border-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900">Belum ada booking di sini</h3>
                        <p class="text-gray-500 mt-1 text-sm">Coba cek tab lain atau mulai booking layanan baru!</p>
                        <a href="{{ route('services.index') }}" class="mt-6 inline-block bg-pink-600 text-white font-semibold py-2 px-5 rounded-lg hover:bg-pink-700 transition duration-200 text-sm">
                            Booking Layanan Sekarang
                        </a>
                    </div>
                @endforelse

                {{-- Link Paginasi --}}
                <div class="mt-10">
                    {{ $bookings->links() }}
                </div>
            </div>

        </div>
    </div>
</x-main-layout>
