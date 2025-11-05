<x-main-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-8">
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Konfirmasi Pembayaran DP</h1>

                    {{-- Baris 7 yang sudah diperbaiki --}}
                    <p class="text-gray-600 mb-6">Untuk booking layanan "<span class="font-semibold text-pink-600">{{ $booking->service->name }}</span>"</p>

                    {{-- Informasi Pembayaran --}}
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                        <h3 class="text-lg font-semibold text-blue-800">Detail Pembayaran</h3>
                        <p class="text-gray-700 mt-2">Silakan lakukan pembayaran sejumlah:</p>
                        <p class="text-3xl font-bold text-blue-900 my-2">Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}</p>
                        <p class="text-gray-700">Ke nomor rekening berikut:</p>
                        <p class="text-md font-semibold text-gray-900 mt-1">BCA: 123-456-7890 (a.n. MUA Admin)</p>
                        <p class="text-gray-700 mt-2">Setelah itu, silakan unggah bukti transfer Anda di bawah ini.</p>
                    </div>

                    {{-- Menampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form Upload --}}
                    <form action="{{ route('payment.store', $booking->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="proof_of_payment" class="block text-sm font-medium text-gray-700">Upload Bukti Transfer</label>
                            <input type="file" name="proof_of_payment" id="proof_of_payment" class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required>

                            @error('proof_of_payment')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @endif
                        </div>

                        <div class="mt-8 flex justify-end space-x-4">
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                                Batal
                            </a>
                            <button type="submit" class="px-4 py-2 bg-pink-600 text-white font-semibold rounded-lg hover:bg-pink-700">
                                Konfirmasi Pembayaran
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-main-layout>
