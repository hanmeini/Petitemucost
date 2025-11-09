<x-main-layout>
    <div class="min-h-screen bg-gray-50 md:py-20">

        {{-- Dekorasi Latar Belakang --}}
        <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-pink-100 to-transparent opacity-50 -z-10"></div>

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative z-10">

            {{-- Tombol Kembali --}}
            <div class="mb-8 md:block hidden">
                <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-pink-600 transition-colors font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Kembali ke Detail Layanan
                </a>
            </div>

            <div class="bg-white md:rounded-[2rem] md:shadow-xl overflow-hidden border border-gray-100">
                {{-- Header Form --}}
                <div class="px-6 py-8 md:px-10 md:py-10 border-b border-gray-100 bg-gradient-to-r from-pink-50 to-white">
                    <div class="flex flex-row items-center mb-4 gap-4">
                        <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 text-gray-900 hover:text-pink-400 hover:scale-105 transition-transform border-gray-600 border p-3 rounded-full font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 tracking-wide">
                            Formulir Booking
                        </h1>
                    </div>
                    <div class="flex items-center gap-3 text-gray-600">
                        <span class="text-sm font-medium px-3 py-1 bg-white rounded-full shadow-sm border border-gray-100">
                            {{ $service->name }}
                        </span>
                        <span class="text-gray-300">•</span>
                        <span class="text-sm">
                            Durasi ± {{ $service->duration_minutes }} Menit
                        </span>
                    </div>
                </div>

                {{-- ====================================== --}}
                {{-- LANGKAH 1: PILIH TANGGAL (KALENDER) --}}
                {{-- ====================================== --}}
                @if (!$selectedDate)
                <div class="p-6 md:p-10"
                     x-data="calendar()"
                     x-init="initCalendar()">

                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-3">
                            <span class="flex items-center justify-center w-8 h-8 bg-pink-100 text-pink-600 rounded-full text-sm font-extrabold">1</span>
                            Pilih Tanggal Acara
                        </h2>
                        <p class="text-gray-500 text-sm mt-2 ml-11">Silakan pilih tanggal yang Anda inginkan di kalender bawah ini.</p>
                    </div>

                    {{-- KALENDER INTERAKTIF --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm max-w-md mx-auto">
                        {{-- Header Kalender (Bulan & Tahun) --}}
                        <div class="flex justify-between items-center mb-6">
                            <button @click="prevMonth()" type="button" class="p-2 rounded-full hover:bg-gray-100 transition-colors text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            </button>
                            <h3 class="text-lg font-bold text-gray-900" x-text="monthNames[month] + ' ' + year"></h3>
                            <button @click="nextMonth()" type="button" class="p-2 rounded-full hover:bg-gray-100 transition-colors text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>

                        {{-- Nama Hari --}}
                        <div class="grid grid-cols-7 gap-1 mb-2 text-center">
                            <template x-for="(day, index) in days" :key="index">
                                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider py-2" x-text="day"></div>
                            </template>
                        </div>

                        {{-- Grid Tanggal --}}
                        <div class="grid grid-cols-7 gap-1">
                            {{-- Tanggal Kosong di Awal Bulan --}}
                            <template x-for="blank in blankDays" :key="blank">
                                <div class="aspect-square"></div>
                            </template>

                            {{-- Tanggal-tanggal dalam Bulan Ini --}}
                            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                <div class="aspect-square">
                                    <button @click="selectDate(date)"
                                            type="button"
                                            :disabled="isPastDate(date)"
                                            class="w-full h-full flex items-center justify-center rounded-xl text-sm font-medium transition-all duration-200"
                                            :class="{
                                                'bg-pink-600 text-white shadow-md scale-105': isSelectedDate(date),
                                                'text-gray-300 cursor-not-allowed': isPastDate(date),
                                                'text-gray-700 hover:bg-pink-50 hover:text-pink-600 cursor-pointer': !isSelectedDate(date) && !isPastDate(date),
                                                'text-pink-600 font-bold': isToday(date) && !isSelectedDate(date)
                                            }"
                                            x-text="date">
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>

                    {{-- Form Tersembunyi untuk Mengirim Tanggal --}}
                    <form id="dateForm" action="{{ route('booking.create', $service->slug) }}" method="POST" class="mt-8 text-center">
                        @csrf
                        <input type="hidden" name="booking_date" x-model="formattedSelectedDate">

                        <button type="submit"
                                :disabled="!formattedSelectedDate"
                                class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-pink-600 text-white font-bold rounded-full hover:bg-pink-700 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed shadow-lg hover:shadow-pink-500/30 transform hover:-translate-y-1">
                            <span>Cek Ketersediaan Jam</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        @error('booking_date') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                    </form>

                </div>
                @endif

                {{-- ====================================== --}}
                {{-- LANGKAH 2: PILIH SLOT & ISI FORM --}}
                {{-- ====================================== --}}
                @if ($selectedDate)
                <div class="p-6 md:p-10 bg-gray-50/50">

                    {{-- Info Tanggal Terpilih --}}
                    <div class="flex items-center justify-between mb-8 bg-white p-4 rounded-2xl border border-pink-100 shadow-sm">
                        <div class="flex items-center gap-4">
                            <div class="flex flex-col items-center justify-center w-14 h-14 bg-pink-50 text-pink-600 rounded-xl border border-pink-100">
                                <span class="text-xs font-semibold uppercase">{{ $selectedDate->translatedFormat('M') }}</span>
                                <span class="text-2xl font-extrabold leading-none">{{ $selectedDate->format('d') }}</span>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tanggal Terpilih</p>
                                <h3 class="text-lg font-bold text-gray-900">{{ $selectedDate->translatedFormat('l, d F Y') }}</h3>
                                <a href="{{ route('booking.create', $service->slug) }}" class="text-sm text-gray-500 hover:text-pink-600 font-medium underline decoration-dotted">
                                    Ubah Tanggal
                                </a>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input type="hidden" name="booking_date" value="{{ $selectedDate->format('Y-m-d') }}">

                        <div class="space-y-10 w-full">
                            {{-- Bagian Pilih Slot Waktu --}}
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 flex items-center gap-3 mb-6">
                                    <span class="flex items-center justify-center w-8 h-8 bg-pink-100 text-pink-600 rounded-full text-sm font-extrabold">2</span>
                                    Pilih Waktu Mulai
                                </h2>

                                @if (isset($availableSlots) && count($availableSlots) > 0)
                                    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-3">
                                        @foreach ($availableSlots as $slotData)
                                            <label class="relative group">
                                                <input type="radio" name="booking_time" value="{{ $slotData['time'] }}" class="peer hidden" required {{ !$slotData['available'] ? 'disabled' : '' }}>
                                                <div class="px-4 py-3 text-center rounded-xl border-2 font-semibold transition-all duration-200
                                                            {{ $slotData['available']
                                                                ? 'cursor-pointer bg-white border-gray-200 text-gray-700 hover:border-pink-400 hover:bg-pink-50 peer-checked:border-pink-600 peer-checked:bg-pink-600 peer-checked:text-white peer-checked:shadow-md'
                                                                : 'cursor-not-allowed bg-gray-100 border-gray-100 text-gray-400 decoration-slice' }}">
                                                    {{ $slotData['time'] }}
                                                </div>
                                                @if(!$slotData['available'])
                                                    <span class="absolute inset-0 flex items-center justify-center text-gray-400/30 pointer-events-none">
                                                        <svg class="w-full h-full p-2" viewBox="0 0 100 100" preserveAspectRatio="none">
                                                            <line x1="0" y1="100" x2="100" y2="0" stroke="currentColor" stroke-width="1" />
                                                        </svg>
                                                    </span>
                                                @endif
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('booking_time') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                                @else
                                    <div class="text-center py-10 bg-white rounded-2xl border-2 border-dashed border-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <p class="text-gray-500 font-medium">Yah, semua slot di tanggal ini sudah penuh.</p>
                                        <p class="text-sm text-gray-400">Silakan coba pilih tanggal lain ya.</p>
                                    </div>
                                @endif
                            </div>

                            {{-- Bagian Detail Informasi --}}
                            @if (isset($availableSlots) && count($availableSlots) > 0)
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 flex items-center gap-3 mb-6">
                                    <span class="flex items-center justify-center w-8 h-8 bg-pink-100 text-pink-600 rounded-full text-sm font-extrabold">3</span>
                                    Lengkapi Detail Acara
                                </h2>
                                <div class="grid grid-cols-1 gap-6">
                                    <div>
                                        <label for="location_address" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap Lokasi Makeup</label>
                                        <textarea name="location_address" id="location_address" rows="3" class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-pink-500 focus:ring-pink-500 transition-colors" placeholder="Contoh: Jl. Merpati No. 12B, Kel. Sukamaju (Sebelah Indomaret)" required>{{ old('location_address') }}</textarea>
                                        @error('location_address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Catatan Tambahan (Opsional)</label>
                                        <textarea name="notes" id="notes" rows="2" class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-pink-500 focus:ring-pink-500 transition-colors" placeholder="Contoh: Kulit sensitif, request look natural, dll.">{{ old('notes') }}</textarea>
                                        @error('notes') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Tombol Submit Final --}}
                            <div class="pt-8 border-t w-full border-gray-200 flex md:justify-end">
                                <button type="submit" class="w-full justify-center inline-flex items-center gap-3 px-8 py-4 bg-gray-900 text-white font-bold text-lg rounded-full hover:bg-pink-600 transition-all duration-300 transform hover:-translate-y-1 shadow-xl hover:shadow-pink-500/20">
                                    <span>Ajukan Booking Sekarang</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
                @endif

            </div>
        </div>
    </div>

    {{-- Script Alpine.js untuk Kalender --}}
    <script>
        function calendar() {
            return {
                month: '',
                year: '',
                no_of_days: [],
                blankDays: [],
                days: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                monthNames: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                formattedSelectedDate: '',

                initCalendar() {
                    let today = new Date();
                    this.month = today.getMonth();
                    this.year = today.getFullYear();
                    this.getNoOfDays();
                },

                isToday(date) {
                    const today = new Date();
                    const d = new Date(this.year, this.month, date);
                    return today.toDateString() === d.toDateString();
                },

                isPastDate(date) {
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    const d = new Date(this.year, this.month, date);
                    return d < today;
                },

                selectDate(date) {
                    let selectedDate = new Date(this.year, this.month, date);
                    // Format YYYY-MM-DD manually to avoid timezone issues
                    this.formattedSelectedDate =
                        selectedDate.getFullYear() + "-" +
                        ("0" + (selectedDate.getMonth() + 1)).slice(-2) + "-" +
                        ("0" + selectedDate.getDate()).slice(-2);
                },

                isSelectedDate(date) {
                    if (!this.formattedSelectedDate) return false;
                    const d = new Date(this.year, this.month, date);
                    const selected = new Date(this.formattedSelectedDate);
                    // Bandingkan hanya tahun, bulan, dan tanggal
                    return d.getFullYear() === selected.getFullYear() &&
                           d.getMonth() === selected.getMonth() &&
                           d.getDate() === selected.getDate();
                },

                getNoOfDays() {
                    let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                    let dayOfWeek = new Date(this.year, this.month).getDay();
                    let blankdaysArray = [];
                    for (var i = 1; i <= dayOfWeek; i++) {
                        blankdaysArray.push(i);
                    }
                    let daysArray = [];
                    for (var i = 1; i <= daysInMonth; i++) {
                        daysArray.push(i);
                    }
                    this.blankDays = blankdaysArray;
                    this.no_of_days = daysArray;
                },

                nextMonth() {
                    this.month++;
                    if (this.month > 11) {
                        this.month = 0;
                        this.year++;
                    }
                    this.getNoOfDays();
                },

                prevMonth() {
                    this.month--;
                    if (this.month < 0) {
                        this.month = 11;
                        this.year--;
                    }
                    this.getNoOfDays();
                }
            }
        }
    </script>
</x-main-layout>
