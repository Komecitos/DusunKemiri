@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold">Data Warga</h2>
    <a href="{{ route('admin.warga.create') }}" class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700">
        + Tambah Warga
    </a>
</div>
@if (session('success'))
<div class="bg-green-100 text-green-800 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<form method="GET" action="{{ route('admin.warga') }}" class="mb-4 flex flex-wrap items-center gap-2">
    <select name="filter" class="border rounded px-3 py-2">
        <option value="nama" {{ request('filter') == 'nama' ? 'selected' : '' }}>Nama</option>
        <option value="nik" {{ request('filter') == 'nik' ? 'selected' : '' }}>NIK</option>
        <option value="pekerjaan" {{ request('filter') == 'pekerjaan' ? 'selected' : '' }}>Pekerjaan</option>
        <option value="dusun" {{ request('filter') == 'dusun' ? 'selected' : '' }}>Dusun</option>
    </select>

    <input type="text" name="search" value="{{ request('search') }}" placeholder="Kata kunci..."
        class="border rounded px-3 py-2 w-64" />

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
</form>

<div class="overflow-x-auto bg-white shadow rounded-lg">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">NIK</th>
                <th class="px-4 py-2">No KK</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Pekerjaan</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wargas as $warga)


            <tr class="border-b">
                <td class="px-4 py-2">{{ $warga->nama }}</td>
                <td class="px-4 py-2">{{ $warga->nik }}</td>
                <td class="px-4 py-2">{{ $warga->no_kk }}</td>
                <td class="px-4 py-2">{{ $warga->alamat }}</td>
                <td class="px-4 py-2">{{ $warga->pekerjaan }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.warga.edit', $warga->id) }}"
                        class="text-blue-600 hover:underline">Edit</a>
                </td>
                <td>
                    <form action="{{ route('admin.warga.destroy', $warga->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection