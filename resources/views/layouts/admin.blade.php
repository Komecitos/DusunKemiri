<!DOCTYPE html>
<html lang="id"
    x-data="{
        darkMode: false,
        toggleDark() {
            this.darkMode = !this.darkMode;
        }
    }"
    class="h-full">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Dusun Kemiri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <style>
        @stack('styles')
    </style>
</head>

@stack('scripts')

<body class="bg-kunyit/10 text-darkText font-sans min-h-screen">
    <div class="min-h-screen flex">

        {{-- Sidebar --}}
        <aside class="w-[220px] bg-white fixed h-full overflow-y-auto z-10 p-5 border-r border-borderSoft shadow-md space-y-4">
            <h1 class="text-2xl font-bold text-sogan">Dusun Kemiri</h1>

            <nav class="mt-6 space-y-2 text-sm font-medium">
                <x-admin-nav-item route="admin.dashboard" label="Dashboard" />
                <x-admin-nav-item route="admin.warga" label="Data Warga" />
                <x-admin-nav-item route="admin.berita.index" label="Berita" />
                <x-admin-nav-item route="admin.jadwal.index" label="Jadwal" />
                <x-admin-nav-item route="admin.petadusun.index" label="Peta" />
                <x-admin-nav-item route="admin.profil.index" label="Profil Dusun" />
                <x-admin-nav-item route="admin.perangkat.index" label="Perangkat" />
                <x-admin-nav-item route="admin.carousel.index" label="Carousel" />

            </nav>

            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?')" class="mt-auto">
                @csrf
                <button type="submit"
                    class="w-full text-left text-red-600 hover:text-red-700 font-semibold">
                    Logout
                </button>
            </form>
        </aside>


        {{-- Main Content --}}
        <main class="flex-1 p-5 ml-[220px]">
            @yield('content')
        </main>
    </div>
</body>

</html>