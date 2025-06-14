<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Dusun Kemiri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex">

        {{-- Sidebar --}}
        <aside class="bg-white w-64 hidden md:block shadow-lg">
            <div class="p-4 font-bold text-green-700 text-xl border-b">Admin Panel</div>
            <nav class="px-4 py-6 space-y-2 text-sm">
                <x-admin-nav-item route="admin.dashboard" label="Dashboard" />
                <a href="{{ route('admin.warga') }}" class="block py-2 px-3 rounded hover:bg-green-100">
                    Kelola Warga
                </a>
                <x-admin-nav-item route="admin.berita.index" label="Kelola Berita" />
                <!-- <x-admin-nav-item route="admin.jadwal.index" label="Kelola Jadwal" /> -->
                <a href="{{ route('admin.jadwal.index') }}" class="block py-2 px-3 rounded hover:bg-green-100">
                    Kelola Jadwal
                </a>


                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?')">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left text-red-600 hover:text-red-800 mt-4">Logout</button>
                </form>
            </nav>
        </aside>

        {{-- Mobile Navbar --}}
        <div class="md:hidden fixed top-0 left-0 right-0 bg-white shadow z-50">
            <div class="flex items-center justify-between p-4">
                <span class="font-bold text-green-700 text-lg">Admin Panel</span>
                <button @click="open = !open" x-data="{ open: false }" @click="open = !open">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div x-show="open" class="px-4 pb-4 space-y-2 text-sm">
                <x-admin-nav-item route="admin.dashboard" label="Dashboard" />
                <x-admin-nav-item route="admin.warga" label="Kelola Warga" />
                <x-admin-nav-item route="admin.berita" label="Kelola Berita" />
                <x-admin-nav-item route="admin.jadwal.index" label="Kelola Jadwal" />
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="text-red-600 hover:text-red-800 block w-full text-left mt-2">Logout</button>
                </form>
            </div>
        </div>

        {{-- Main Content --}}
        <main class="flex-1 p-6 mt-16 md:mt-0">
            @yield('content')
        </main>
    </div>
</body>

</html>