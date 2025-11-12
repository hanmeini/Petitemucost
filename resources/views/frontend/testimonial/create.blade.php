<x-main-layout>
        <div class="py-12 bg-gray-50">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl rounded-2xl border border-gray-100">
                    <div class="p-8 md:p-12">
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Beri Ulasan</h1>
                        <p class="text-gray-600 mb-8">
                            Bagaimana pengalamanmu dengan layanan <strong>{{ $booking->service->name }}</strong> pada tanggal {{ $booking->booking_date->format('d F Y') }}?
                        </p>
    
                        <form action="{{ route('testimonial.store', $booking->id) }}" method="POST"
                              x-data="{ rating: 0, hoverRating: 0 }">
                            @csrf
    
                            {{-- Rating Bintang Interaktif --}}
                            <div class="mb-6">
                                <label class="block text-lg font-semibold text-gray-800 mb-3">Rating Anda</label>
                                <div class="flex items-center space-x-1" @mouseleave="hoverRating = 0">
                                    <template x-for="star in 5" :key="star">
                                        <button @click.prevent="rating = star" 
                                                @mouseover="hoverRating = star"
                                                type="button" 
                                                class="text-4xl transition-colors duration-150"
                                                :class="(hoverRating >= star || rating >= star) ? 'text-yellow-400' : 'text-gray-300 hover:text-yellow-200'">
                                            ★
                                        </button>
                                    </template>
                                </div>
                                <input type="hidden" name="rating" x-model="rating">
                                @error('rating')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
    
                            {{-- Komentar --}}
                            <div class="mb-8">
                                <label for="comment" class="block text-lg font-semibold text-gray-800 mb-3">Ulasan Anda</label>
                                <textarea name="comment" id="comment" rows="5" 
                                          class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-pink-500 focus:ring-pink-500 transition-colors"
                                          placeholder="Ceritakan pengalamanmu di sini..." 
                                          required>{{ old('comment') }}</textarea>
                                @error('comment')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
    
                            {{-- Tombol Submit --}}
                            <div class="flex justify-end space-x-4">
                                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium">
                                    Nanti Saja
                                </a>
                                <button type="submit" class="px-8 py-3 bg-pink-600 text-white font-semibold rounded-lg hover:bg-pink-700 transition-all duration-300 transform hover:-translate-y-1 shadow-md hover:shadow-lg">
                                    Kirim Ulasan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-main-layout>