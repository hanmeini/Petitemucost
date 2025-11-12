<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="w-full h-screen grid grid-cols-1 lg:grid-cols-2">

            {{-- ====================================== --}}
            {{-- === BAGIAN KIRI (BACKGROUND ANIMASI) === --}}
            {{-- ====================================== --}}
            <div class="hidden lg:block relative h-screen overflow-hidden">

                {{-- Kontainer untuk kolom-kolom gambar --}}
                <div class="absolute inset-0 flex -z-10">

                    {{-- Fungsi looping ini PENTING! --}}
                    {{-- Kita perlu menduplikasi gambar di setiap kolom agar scroll-nya terlihat 'infinite' --}}
                    @php
                        $imagesCol1 = [
                            'img1.png',
                            'img2.png',
                            'img3.png',
                            'img4.png',
                        ];
                        $imagesCol2 = [
                            'img5.png',
                            'img6.png',
                            'img7.png',
                            'img8.png',
                        ];
                        $imagesCol3 = [
                            'img9.png',
                            'img10.png',
                            'img11.png',
                            'img12.png',
                        ];
                    @endphp

                    {{-- Kolom 1 (Scroll Lambat) --}}
                    <div class="flex flex-col w-1/3 animate-scroll-slow">
                        @foreach (array_merge($imagesCol1, $imagesCol1) as $img) {{-- Duplikasi array --}}
                            <img src="{{ asset('images/cosplay/' . $img) }}" alt="Foto Cosplay" class="w-full h-auto object-cover">
                        @endforeach
                    </div>

                    {{-- Kolom 2 (Scroll Cepat - Arah Berbeda) --}}
                    <div class="flex flex-col w-1/3 animate-scroll-fast">
                        @foreach (array_merge($imagesCol2, $imagesCol2) as $img) {{-- Duplikasi array --}}
                            <img src="{{ asset('images/cosplay/' . $img) }}" alt="Foto Cosplay" class="w-full h-auto object-cover">
                        @endforeach
                    </div>

                    {{-- Kolom 3 (Scroll Lambat) --}}
                    <div class="flex flex-col w-1/3 animate-scroll-slow">
                        @foreach (array_merge($imagesCol3, $imagesCol3) as $img) {{-- Duplikasi array --}}
                            <img src="{{ asset('images/cosplay/' . $img) }}" alt="Foto Cosplay" class="w-full h-auto object-cover">
                        @endforeach
                    </div>

                </div>

                {{-- Overlay & Teks (Sama seperti kode Kakak) --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/50 to-black/30 flex flex-col justify-end p-12 text-white">
                    <div class="mb-10">
                        <h1 class="text-5xl font-extrabold mb-4 font-hellohoney tracking-wide">Pettitemucos</h1>
                        <p class="text-xl font-medium mt-2 leading-relaxed">
                            Wujudkan karakter impian Anda melalui sentuhan makeup profesional kami.
                        </p>
                    </div>
                </div>
            </div>


            {{-- ====================================== --}}
            {{-- === BAGIAN KANAN (FORM LOGIN/REGISTER) === --}}
            {{-- ====================================== --}}
            <div class="relative h-screen flex flex-col justify-center items-center p-6
                        lg:bg-white">
                <div class="absolute inset-0 flex -z-10 overflow-hidden lg:hidden">
                    @php
                        $imagesCol1 = [ 'img1.png', 'img2.png', 'img3.png', 'img4.png', ];
                        $imagesCol2 = [ 'img5.png', 'img6.png', 'img7.png', 'img9.png','img10.png' ];
                        $imagesCol3 = [ 'img9.png', 'img10.png', 'img11.png', 'img12.png', ];
                    @endphp

                    {{-- Kolom 1 (Mobile) --}}
                    <div class="flex flex-col w-1/3">
                        @foreach (array_merge($imagesCol1, $imagesCol1) as $img)
                            <img src="{{ asset('images/cosplay/' . $img) }}" alt="Foto Cosplay 1" class="w-full h-auto object-cover">
                        @endforeach
                    </div>

                    {{-- Kolom 2 (Mobile) - INI DIA TRIK-NYA! --}}
                    <div class="flex flex-col w-1/3 -mt-20">
                        @foreach (array_merge($imagesCol2, $imagesCol2) as $img)
                            <img src="{{ asset('images/cosplay/' . $img) }}" alt="Foto Cosplay 2" class="w-full h-auto object-cover">
                        @endforeach
                    </div>

                    {{-- Kolom 3 (Mobile) --}}
                    <div class="flex flex-col w-1/3">
                        @foreach (array_merge($imagesCol3, $imagesCol3) as $img)
                            <img src="{{ asset('images/cosplay/' . $img) }}" alt="Foto Cosplay 3" class="w-full h-auto object-cover">
                        @endforeach
                    </div>
                </div>
                <div class="absolute inset-0 bg-black/50 lg:hidden"></div>
                <div class="relative z-10 w-full max-w-sm
                            bg-white rounded-lg shadow-2xl p-8
                            lg:bg-white lg:shadow-none lg:rounded-none lg:p-8">

                    {{-- Logo & Judul Form --}}
                    <a href="{{ route('home') }}" class="flex items-center justify-center flex-col mb-4">
                        <img src="{{ asset('images/logo.png')}}" alt="logo Pettitemucos" class="w-24 h-24 mb-5">
                        <span class="md:text-3xl font-bold">
                            Pettitemucos
                        </span>
                    </a>
                    <h2 class="text-xl font-bold text-center text-gray-900 mb-6">
                        Selamat Datang Kembali!
                    </h2>

                    {{-- Form Login atau Register akan muncul di sini --}}
                    {{ $slot }}

                    <div class="flex items-center justify-center mt-4">
                        <a href="{{ route('google.redirect') }}"
                        class="inline-flex items-center justify-center w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                            <svg class="w-5 h-5 mr-3" xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" viewBox="0 0 48 48" width="48px" height="48px">
                                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/>
                                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.223,0-9.64-3.657-11.28-8.581H6.306C9.656,35.663,16.318,40,24,40z"/>
                                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571l6.19,5.238C39.756,36.318,44,30.606,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                            </svg>
                            Masuk dengan Google
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
