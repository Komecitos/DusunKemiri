@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="text-2xl font-bold mb-4">Manajemen Perangkat Dusun</h1>

    <a href="{{ route('admin.perangkat.create') }}" class="btn btn-primary mb-3">Tambah Perangkat</a>

    @if(session('success'))
    <div class="text-green-600 mb-2">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">Jabatan</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">No HP</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Alamat</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perangkat as $item)
            <tr>
                <td class="border p-2">{{ $item->jabatan }}</td>
                <td class="border p-2">{{ $item->nama }}</td>
                <td class="border p-2">{{ $item->nomor_hp }}</td>
                <td class="border p-2">{{ $item->email }}</td>
                <td class="border p-2">{{ $item->alamat }}</td>
                <td class="border p-2">
                    <a href="{{ route('admin.perangkat.edit', $item->id) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('admin.perangkat.destroy', $item->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection