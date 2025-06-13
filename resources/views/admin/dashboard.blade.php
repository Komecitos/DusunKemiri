@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Selamat datang, Admin</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold text-gray-700">Total Warga</h2>
        <p class="text-3xl font-bold text-green-700">{{ $jumlahWarga }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold text-gray-700">Total Berita</h2>
        <p class="text-3xl font-bold text-green-700">{{ $jumlahBerita }}</p>
    </div>
</div>
@endsection