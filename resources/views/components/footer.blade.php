<footer class="bg-white border-t border-gray-200 pt-16 pb-8 relative overflow-hidden">

    {{-- Dekorasi Latar Belakang Halus --}}
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-pink-50/50 rounded-full blur-[120px] -z-10 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8 mb-16">

            {{-- KOLOM 1: Brand & Sosmed (Lebih lebar: 4 kolom) --}}
            <div class="lg:col-span-4 space-y-6">
                <a href="/" class="flex items-center gap-2">
                    {{-- Ganti dengan logo asli jika ada --}}
                    <div class="w-10 h-10 bg-gradient-to-tr from-pink-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-md">
                        P
                    </div>
                    <span class="text-2xl font-extrabold text-gray-900 font-hellohoney tracking-wide">Pettitemucos</span>
                </a>
                <p class="text-gray-600 leading-relaxed pr-4">
                    Menghidupkan karakter impianmu lewat seni makeup yang detail dan profesional. Spesialis Cosplay & Douyin Makeup di Semarang.
                </p>
                {{-- Social Media Icons --}}
                <div class="flex items-center gap-4">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-500 hover:bg-pink-500 hover:text-white transition-all duration-300 hover:-translate-y-1" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-500 hover:bg-pink-500 hover:text-white transition-all duration-300 hover:-translate-y-1" aria-label="TikTok">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-500 hover:bg-green-500 hover:text-white transition-all duration-300 hover:-translate-y-1" aria-label="WhatsApp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    </a>
                </div>
            </div>

            {{-- KOLOM 2: Quick Links (2 kolom) --}}
            <div class="lg:col-span-2">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-6">Menu</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-pink-600 transition-colors">Beranda</a></li>
                    <li><a href="{{ route('services.index') }}" class="text-gray-600 hover:text-pink-600 transition-colors">Layanan</a></li>
                    <li><a href="{{ route('portfolios.index') }}" class="text-gray-600 hover:text-pink-600 transition-colors">Portofolio</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-pink-600 transition-colors">Tentang Kami</a></li>
                </ul>
            </div>

            {{-- KOLOM 3: Layanan (3 kolom) --}}
            <div class="lg:col-span-3">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-6">Layanan Populer</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="text-gray-600 hover:text-pink-600 transition-colors flex items-center gap-2"><span class="text-pink-400">•</span> Makeup Cosplay</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-pink-600 transition-colors flex items-center gap-2"><span class="text-pink-400">•</span> Makeup Douyin</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-pink-600 transition-colors flex items-center gap-2"><span class="text-pink-400">•</span> Makeup Wisuda</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-pink-600 transition-colors flex items-center gap-2"><span class="text-pink-400">•</span> Photoshoot Session</a></li>
                </ul>
            </div>

            {{-- KOLOM 4: Kontak (3 kolom) --}}
            <div class="lg:col-span-3">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-6">Hubungi Kami</h3>
                <ul class="space-y-4 text-gray-600">
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        <span>Semarang, Jawa Tengah<br>(Tersedia untuk luar kota)</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        <a href="mailto:hello@pettitemucos.com" class="hover:text-pink-600 transition-colors">hello@pettitemucos.com</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        <a href="https://wa.me/6281234567890" class="hover:text-pink-600 transition-colors">+62 812 3456 7890</a>
                    </li>
                </ul>
            </div>

        </div>

        {{-- Copyright Bar --}}
        <div class="pt-8 mt-8 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-gray-500 text-center md:text-left">
                &copy; {{ date('Y') }} <span class="font-semibold text-pink-600">Pettitemucos</span>. Dibuat dengan ❤️ untuk UKK.
            </p>
            <div class="flex gap-6 text-sm text-gray-500">
                <a href="#" class="hover:text-pink-600 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-pink-600 transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
