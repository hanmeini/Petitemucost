<x-main-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-8 border-b border-gray-200">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Formulir Booking</h2>
                    <p class="text-gray-600">Layanan: <span class="font-semibold text-pink-600">{{ $service->name }}</span></p>
                </div>

                {{-- ====================================== --}}
                {{-- LANGKAH 1: PILIH TANGGAL --}}
                {{-- ====================================== --}}
                <div class="p-8">
                    <form action="{{ route('booking.create', $service->slug) }}" method="POST">
                        @csrf
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Langkah 1: Cek Ketersediaan Jadwal</h3>

                        {{-- Tanggal Booking --}}
                        <div>
                            <label for="booking_date" class="block text-sm font-medium text-gray-700">Pilih Tanggal Acara</label>
                            <div class="flex items-center mt-1">
                                <input type="date" name="booking_date" id="booking_date"
                                       min="{{ date('Y-m-d') }}"
                                       value="{{ $selectedDate ? $selectedDate->format('Y-m-d') : old('booking_date') }}"
                                       class="block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500" required>
                                <button type="submit" class="ml-4 px-6 py-2 bg-pink-600 text-white font-semibold rounded-lg hover:bg-pink-700 transition duration-300">
                                    Cek Jam
                                </button>
                            </div>
                            @error('booking_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>


                {{-- ====================================== --}}
                {{-- LANGKAH 2: PILIH SLOT & ISI FORM --}}
                {{-- ====================================== --}}

                @if ($selectedDate)
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <input type="hidden" name="booking_date" value="{{ $selectedDate->format('Y-m-d') }}">

                    <div class="p-8 border-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Langkah 2: Pilih Slot Jam Tersedia</h3>
                        <p class="text-sm text-gray-600 mb-4">Slot tersedia untuk tanggal: <span class="font-bold">{{ $selectedDate->translatedFormat('d F Y') }}</span>. Durasi layanan ini sekitar {{ $service->duration_minutes }} menit.</p>

                        {{-- Menampilkan pesan error khusus jika slot sudah terisi --}}
                        @if (session('error'))
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (isset($availableSlots) && count($availableSlots) > 0)
                            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3">

                                {{-- --- INI PERUBAHAN LOGIKANYA --- --}}
                                @foreach ($availableSlots as $slotData)
                                    <div>
                                        <input type="radio"
                                               name="booking_time"
                                               id="slot-{{ $slotData['time'] }}"
                                               value="{{ $slotData['time'] }}"
                                               class="hidden peer"
                                               required
                                               {{-- Tambahkan atribut 'disabled' jika slot tidak tersedia --}}
                                               {{ !$slotData['available'] ? 'disabled' : '' }}>

                                        <label for="slot-{{ $slotData['time'] }}"
                                               class="block text-center p-3 border rounded-lg
                                                      {{-- Terapkan style berbeda jika slot tidak tersedia --}}
                                                      {{ $slotData['available']
                                                          ? 'border-gray-300 cursor-pointer hover:bg-pink-50 hover:border-pink-500 peer-checked:bg-pink-600 peer-checked:text-white peer-checked:border-pink-600'
                                                          : 'border-gray-200 bg-gray-100 text-gray-400 line-through cursor-not-allowed' }}">
                                            <span class="font-medium">{{ $slotData['time'] }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('booking_time') <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror

                            {{-- Form Detail Alamat & Catatan --}}
                            <div class="mt-8 space-y-6">
                                <div>
                                    <label for="location_address" class="block text-sm font-medium text-gray-700">Alamat Lengkap Lokasi Makeup</label>
                                    <textarea name="location_address" id="location_address" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500" required>{{ old('location_address') }}</textarea>
                                    @error('location_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="notes" class="block text-sm font-medium text-gray-700">Catatan Tambahan (Opsional)</label>
                                    <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500" placeholder="Contoh: Tipe kulit saya berminyak, request makeup tema bold, dll.">{{ old('notes') }}</textarea>
                                    @error('notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Tombol Submit --}}
                            <div class="pt-8 border-t border-gray-200 mt-8 text-right">
                                <button type="submit" class="w-full md:w-auto text-center bg-pink-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-pink-700 transition duration-300 text-lg">
                                    Ajukan Booking Sekarang
                                </button>
                            </div>

                        @else
                            {{-- Jika tidak ada slot tersedia --}}
                            <div class="text-center py-8">
                                <p class="text-lg text-gray-500">Maaf, tidak ada slot yang tersedia untuk tanggal ini.</p>
                                <p class="text-sm text-gray-400">Silakan coba pilih tanggal lain.</p>
                            </div>
                        @endif
                    </div>
                </form>
                @endif

            </div>
        </div>
    </div>
</x-main-layout>
