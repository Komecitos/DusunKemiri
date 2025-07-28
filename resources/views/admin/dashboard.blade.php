@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-sogan mb-6">Selamat Datang, Admin</h1>

{{-- Statistik Kartu --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">
    @php
    $stats = [
    ['label' => 'Total Warga', 'value' => $jumlahWarga],
    ['label' => 'Total Berita', 'value' => $jumlahBerita],
    ['label' => 'Jumlah Jadwal', 'value' => $jumlahJadwal ?? '0'],
    ['label' => 'Jumlah Perangkat', 'value' => $jumlahPerangkat ?? '0'],
    ];
    @endphp

    @foreach ($stats as $stat)
    <div class="bg-white border-l-4 border-kunyit rounded-xl shadow-md p-6">
        <h2 class="text-sm text-gray-500 font-semibold mb-1">{{ $stat['label'] }}</h2>
        <p class="text-3xl font-bold text-darkText">{{ $stat['value'] }}</p>
    </div>
    @endforeach
</div>

{{-- Navigasi Cepat --}}
<h2 class="text-xl font-semibold text-sogan mb-4">Navigasi Cepat</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @php
    $menu = [
    ['route' => 'admin.warga', 'label' => 'Kelola Warga', 'desc' => 'Lihat dan edit data seluruh warga dusun.'],
    ['route' => 'admin.berita.index', 'label' => 'Kelola Berita', 'desc' => 'Tambahkan berita dan informasi terbaru.'],
    ['route' => 'admin.jadwal.index', 'label' => 'Jadwal Kegiatan', 'desc' => 'Kelola dan tampilkan acara dusun.'],
    ['route' => 'admin.petadusun.index', 'label' => 'Kelola Peta', 'desc' => 'Tambah lokasi penting di peta dusun.'],
    ['route' => 'admin.perangkat.index', 'label' => 'Perangkat Dusun', 'desc' => 'Kelola struktur perangkat pemerintahan dusun.'],
    ['route' => 'admin.profil.index', 'label' => 'Profil Dusun', 'desc' => 'Atur informasi umum tentang dusun.'],
    ['route' => 'admin.carousel.index', 'label' => 'Carousel', 'desc' => 'Atur tampilan banner di halaman beranda'],
    ];
    @endphp

    @foreach ($menu as $item)
    <a href="{{ route($item['route']) }}"
        class="bg-white border-2 border-gray-200 rounded-xl shadow-md p-6 hover:bg-kunyit/30 transition shadow-sm hover:shadow-md rounded-xl p-5 block">
        <h3 class="text-lg font-semibold text-sogan">{{ $item['label'] }}</h3>
        <p class="text-sm text-gray-600">{{ $item['desc'] }}</p>
    </a>
    @endforeach
</div>
@endsection