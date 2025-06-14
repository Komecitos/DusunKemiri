<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dusun Kemiri')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')

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
                <a class="nav-link" href="{{ route('berita.index') }}">Berita</a>
                <a href="{{ url('/demografi') }}" class="hover:text-green-600">Demografi</a>
                <a href="{{ url('/jadwal') }}" class="hover:text-green-600">Kegiatan</a>
                <a href="{{ route('peta.index') }}" class="hover:text-green-600">Peta Dusun</a>
                <a href="{{ url('/kontak') }}" class="hover:text-green-600">Kontak</a>
            </nav>

            {{-- Login Admin --}}
            <div class="text-sm">
                @if(!session('admin_logged_in'))
                <a href="{{ url('/login-admin') }}" class="text-green-700 hover:text-green-900" target="_blank">Login Admin</a>
                @else
                <a href="{{ url('/admin') }}" class="text-green-700 font-semibold hover:text-green-900">Dashboard</a>
                @endif
            </div>
        </div>
    </header>

    {{-- Halaman Konten --}}
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <!-- @yield('content') -->
    @stack('scripts')

    {{-- Footer --}}
    <footer class="bg-gray-200 text-center p-4 text-sm text-gray-600">
        &copy; 2025 Dusun Kemiri
    </footer>

</body>

</html>