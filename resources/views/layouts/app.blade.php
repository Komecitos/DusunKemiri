<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dusun Kemiri')</title>

    {{-- Google Fonts - Modern Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- AlpineJS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Custom Style --}}
    <style>
        body {
            font-family: 'Inter', 'Roboto', 'Segoe UI', 'Helvetica Neue', sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- Navbar --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">

            {{-- Logo dan Judul --}}
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <img src="{{ asset('images/headbar/logo01.jpeg') }}" alt="Logo Dusun" class="w-9 h-9 object-contain rounded-full shadow-md border border-orange-200">
                <span class="text-xl font-bold text-orange-600 tracking-wide">Dusun Kemiri</span>
            </a>

            {{-- Navigasi Utama --}}
            <nav class="hidden md:flex space-x-3 text-sm font-medium">
                <a href="{{ url('/') }}" class="@if(Request::is('/')) bg-orange-200 text-orange-800 @else text-black-700 hover:bg-orange-100 @endif px-4 py-2 rounded-md transition duration-200">Home</a>

                <a href="{{ url('/profil') }}" class="@if(Request::is('profil')) bg-orange-200 text-orange-800 @else text-black-700 hover:bg-orange-100 @endif px-4 py-2 rounded-md transition duration-200">Profil</a>

                <a href="{{ url('/berita') }}" class="@if(Request::is('berita*')) bg-orange-200 text-orange-800 @else text-black-700 hover:bg-orange-100 @endif px-4 py-2 rounded-md transition duration-200">Berita</a>

                <a href="{{ url('/demografi') }}" class="@if(Request::is('demografi')) bg-orange-200 text-orange-800 @else text-black-700 hover:bg-orange-100 @endif px-4 py-2 rounded-md transition duration-200">Demografi</a>

                <a href="{{ url('/jadwal') }}" class="@if(Request::is('jadwal')) bg-orange-200 text-orange-800 @else text-black-700 hover:bg-orange-100 @endif px-4 py-2 rounded-md transition duration-200">Kegiatan</a>

                <a href="{{ url('/peta-dusun') }}" class="@if(Request::is('peta-dusun')) bg-orange-200 text-orange-800 @else text-black-700 hover:bg-orange-100 @endif px-4 py-2 rounded-md transition duration-200">Peta Dusun</a>
            </nav>

            {{-- Login Admin --}}
            <div class="text-sm">
                <a href="{{ url('/login-admin') }}" class="text-orange-600 hover:text-orange-800 font-medium transition duration-150">Login Admin</a>
            </div>
        </div>
    </header>


    {{-- Konten --}}
    <main class="container mx-auto px-4 py-8 min-h-[60vh]">
        @yield('content')
    </main>

    {{-- Scripts --}}
    @stack('scripts')

    {{-- Footer --}}
    <footer class="bg-gray-100 text-center py-5 text-sm text-gray-500 border-t mt-10">
        &copy; {{ now()->year }} Dusun Kemiri. All rights reserved.
    </footer>

</body>

</html>