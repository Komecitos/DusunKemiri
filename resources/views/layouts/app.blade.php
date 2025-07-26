<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dusun Kemiri')</title>
    <link rel="icon" href="{{ asset(path: 'images/icons/apple-tab.png') }}" type="image/x-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Roboto&display=swap" rel="stylesheet">


    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/a95221cf59.js" crossorigin="anonymous"></script>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- AlpineJS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', 'Roboto', sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 text-sogan">

    {{-- Navbar --}}
    <header class="bg-white shadow sticky top-0 z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-3">
                <!-- <img src="{{ asset('images/headbar/logo01.jpeg') }}" alt="Logo Dusun" class="w-10 h-10 rounded-full border border-kunyit shadow"> -->
                <span class="text-xl font-bold text-sogan font-serif tracking-widest">Dusun Kemiri</span>
            </a>

            {{-- Nav Desktop --}}
            <nav class="hidden md:flex space-x-16 text-sm font-bold mr-10 ">
                <a href="{{ url('/') }}" class="text-sogan hover:text-kunyit transition ">Beranda</a>
                <a href="{{ url('/profil') }}" class="text-sogan hover:text-kunyit transition">Profil</a>
                <a href="{{ url('/berita') }}" class="text-sogan hover:text-kunyit transition">Berita</a>
                <a href="{{ url('/demografi') }}" class="text-sogan hover:text-kunyit transition">Demografi</a>
                <a href="{{ url('/jadwal') }}" class="text-sogan hover:text-kunyit transition">Kegiatan</a>
                <a href="{{ url('/peta-dusun') }}" class="text-sogan hover:text-kunyit transition">Peta Dusun</a>
            </nav>

            {{-- Login Desktop --}}
            <div class="hidden md:block text-sm">
                <a href="{{ url('/login-admin') }}" class="text-sogan hover:text-kunyit font-semibold transition duration-150">Login Admin</a>
            </div>

            {{-- Hamburger Mobile --}}
            <button @click="open = !open" class="md:hidden text-sogan focus:outline-none">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Nav Mobile --}}
        <nav x-show="open" x-transition class="md:hidden bg-white shadow-sm px-4 pb-4 space-y-2 text-sm font-bold">
            <a href="{{ url('/') }}" class="block px-4 py-2 rounded-md text-sogan hover:bg-orange-100">Home</a>
            <a href="{{ url('/profil') }}" class="block px-4 py-2 rounded-md text-sogan hover:bg-orange-100">Profil</a>
            <a href="{{ url('/berita') }}" class="block px-4 py-2 rounded-md text-sogan hover:bg-orange-100">Berita</a>
            <a href="{{ url('/demografi') }}" class="block px-4 py-2 rounded-md text-sogan hover:bg-orange-100">Demografi</a>
            <a href="{{ url('/jadwal') }}" class="block px-4 py-2 rounded-md text-sogan hover:bg-orange-100">Kegiatan</a>
            <a href="{{ url('/peta-dusun') }}" class="block px-4 py-2 rounded-md text-sogan hover:bg-orange-100">Peta Dusun</a>
            <a href="{{ url('/login-admin') }}" class="block px-4 py-2 rounded-md text-kunyit hover:bg-orange-100">Login Admin</a>
        </nav>
    </header>

    {{-- Main --}}
    <main class="{{ Route::currentRouteName() === 'home' ? 'pb-10' : 'px-4 py-6 md:px-12' }}">
        @yield('content')
    </main>


    {{-- Footer --}}
    <footer class="bg-sogan text-white py-10 px-4 md:px-16 mt-10">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-center md:justify-between items-start gap-10">
            <div class="flex items-start gap-4">
                <!-- <img src="{{ asset('images/headbar/logo01.jpeg') }}" alt="Logo" class="w-20 h-auto border border-white rounded-md shadow"> -->
                <div>
                    <h2 class="text-xl font-bold mb-2">Dusun Kemiri</h2>
                    <p>Kalurahan Keliagung, Kecamatan Sentolo,</p>
                    <p>Kabupaten Kulon Progo</p>
                    <p>Daerah Istimewa Yogyakarta</p>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-bold mb-4">Hubungi Kami</h2>
                <div class="flex items-center gap-3 mb-2">
                    <i class="fas fa-phone text-xl"></i>
                    <span>+62 xxx xxxx xxxx</span>
                </div>
                <div class="flex items-center gap-3 mb-2">
                    <i class="fas fa-envelope text-xl"></i>
                    <span>emaildusun@example.com</span>
                </div>
                <div class="flex gap-4 mt-4 text-2xl">
                    <a href="#"><i class="fab fa-instagram hover:text-kunyit"></i></a>
                    <a href="#"><i class="fab fa-facebook hover:text-kunyit"></i></a>
                    <a href="#"><i class="fab fa-x-twitter hover:text-kunyit"></i></a>
                    <a href="#"><i class="fab fa-youtube hover:text-kunyit"></i></a>
                    <a href="#"><i class="fab fa-tiktok hover:text-kunyit"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center text-sm mt-6">
            &copy; 2025 Website Resmi Dusun Kemiri<br>
            Dikembangkan sebagai Proker Individu KKN 70 oleh Mahasiswa Universitas Sanata Dharma.
        </div>
    </footer>

    @stack('scripts')
</body>

</html>