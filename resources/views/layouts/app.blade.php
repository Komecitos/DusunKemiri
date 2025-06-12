<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dusun Kemiri')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    {{-- Navbar/Header --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex items-center justify-between">
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center space-x-2 hover:opacity-80 transition">
                <img src="{{ asset('images/logo-kemiri.png') }}" alt="Logo Dusun" class="w-8 h-8">
                <span class="font-bold text-lg text-green-700">Dusun Kemiri</span>
            </a>


            {{-- Navigation Menu --}}
            <nav class="hidden md:flex space-x-6 text-sm">
                <a href="{{ url('/') }}" class="hover:text-green-600">Home</a>
                <a href="{{ url('/berita') }}" class="hover:text-green-600">Berita</a>
                <a href="{{ url('/demografi') }}" class="hover:text-green-600">Demografi</a>
                <a href="{{ url('/kegiatan') }}" class="hover:text-green-600">Kegiatan</a>
                <a href="{{ url('/kontak') }}" class="hover:text-green-600">Kontak</a>
            </nav>
        </div>
    </header>

    {{-- Halaman Konten --}}
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-200 text-center p-4 text-sm text-gray-600">
        &copy; 2025 Dusun Kemiri
    </footer>

</body>

</html>