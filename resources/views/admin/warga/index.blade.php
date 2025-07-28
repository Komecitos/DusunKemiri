@extends('layouts.admin')

@php
$currentSort = request('sort', 'nama');
$currentDir = request('direction', 'asc');
$newDir = $currentDir === 'asc' ? 'desc' : 'asc';
@endphp

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-sogan">Data Warga Dusun</h2>
    <a href="{{ route('admin.warga.create') }}"
        class="bg-sogan hover:bg-kunyit/80 text-white px-4 py-2 rounded text-sm font-medium shadow transition">
        Tambah Warga
    </a>
</div>

@if (session('success'))
<div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 mb-4 rounded-md shadow-sm">
    {{ session('success') }}
</div>
@endif

<form method="GET" action="{{ route('admin.warga') }}" class="mb-6 flex flex-wrap items-center gap-2">
    <select name="filter"
        class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-1 focus:ring-kunyit focus:outline-none">
        <option value="nama" {{ request('filter') == 'nama' ? 'selected' : '' }}>Nama</option>
        <option value="nik" {{ request('filter') == 'nik' ? 'selected' : '' }}>NIK</option>
        <option value="pekerjaan" {{ request('filter') == 'pekerjaan' ? 'selected' : '' }}>Pekerjaan</option>
        <option value="rt" {{ request('filter') == 'rt' ? 'selected' : '' }}>RT</option>
        <option value="rw" {{ request('filter') == 'rw' ? 'selected' : '' }}>RW</option>
        <option value="agama" {{ request('filter') == 'agama' ? 'selected' : '' }}>Agama</option>
        <option value="pendidikan_terakhir" {{ request('filter') == 'pendidikan_terakhir' ? 'selected' : '' }}>Pendidikan</option>
        <option value="golongan_darah" {{ request('filter') == 'golongan_darah' ? 'selected' : '' }}>Golongan darah</option>

    </select>

    <div class="relative">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Kata kunci..."
            class="border border-gray-300 rounded-md px-3 py-2 w-64 text-sm pr-8 focus:ring-kunyit focus:border-kunyit focus:outline-none"
            autocomplete="off" />
        @if(request('search'))
        <a href="{{ route('admin.warga') }}"
            class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 text-lg hover:text-red-500">×</a>
        @endif
    </div>

    <button type="submit"
        class="bg-sogan hover:bg-kunyit/80 text-white px-4 py-2 rounded-lg text-sm font-medium shadow transition">
        Cari
    </button>
</form>

<div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
    <table class="w-full text-sm text-left">
        <thead class="bg-kunyit/10 text-sogan uppercase text-xs font-semibold">
            <tr>
                @foreach ([
                'nama' => 'Nama',
                'jenis_kelamin' => 'Jenis Kelamin',
                'pekerjaan' => 'Pekerjaan',
                'pendidikan_terakhir' => 'Pendidikan',
                'agama' => 'Agama',
                'golongan_darah' => 'Gol. Darah',
                'status_perkawinan' => 'Status',
                'kategori_penduduk' => 'Kategori',
                'rt' => 'RT',
                'rw' => 'RW'
                ] as $key => $label)
                <th class="px-4 py-3 whitespace-nowrap">
                    <a href="{{ route('admin.warga', ['sort' => $key, 'direction' => $currentSort === $key ? $newDir : 'asc'] + request()->except(['sort', 'direction', 'page'])) }}"
                        class="hover:underline">
                        {{ $label }} {!! $currentSort === $key ? ($currentDir === 'asc' ? '↑' : '↓') : '' !!}
                    </a>
                </th>
                @endforeach
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-darkText">
            @forelse ($wargas as $warga)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-3">{{ $warga->nama }}</td>
                <td class="px-4 py-3">{{ $warga->jenis_kelamin }}</td>
                <td class="px-4 py-3">{{ $warga->pekerjaan }}</td>
                <td class="px-4 py-3">{{ $warga->pendidikan_terakhir }}</td>
                <td class="px-4 py-3">{{ $warga->agama }}</td>
                <td class="px-4 py-3">{{ $warga->golongan_darah }}</td>
                <td class="px-4 py-3">{{ $warga->status_perkawinan }}</td>
                <td class="px-4 py-3">{{ $warga->kategori_penduduk }}</td>
                <td class="px-4 py-3">{{ $warga->rt }}</td>
                <td class="px-4 py-3">{{ $warga->rw }}</td>

                <td class="px-4 py-3 text-center space-x-2 whitespace-nowrap">
                    <a href="{{ route('admin.warga.show', $warga->id) }}"
                        class="text-sogan hover:underline text-sm font-medium">Lihat</a>
                    <a href="{{ route('admin.warga.edit', $warga->id) }}"
                        class="text-sogan hover:underline text-sm font-medium">Edit</a>
                    <form action="{{ route('admin.warga.destroy', $warga->id) }}" method="POST" class="inline"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-600 hover:underline text-sm font-medium">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center px-4 py-6 text-gray-500">Belum ada data warga.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $wargas->withQueryString()->links() }}
</div>
@endsection