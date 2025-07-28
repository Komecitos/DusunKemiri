@extends('layouts.admin')

@section('title', 'Manajemen Perangkat Dusun')

@section('content')
<div class="">

    @if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 rounded p-3 mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold text-sogan">Manajemen Perangkat Dusun</h1>

        <a href=" {{ route('admin.perangkat.create') }}"
            class="bg-sogan text-white hover:bg-kunyit/80 hover:text-sogan  px-4 py-2 rounded text-sm font-medium shadow transition">
            Tambah Perangkat
        </a>
    </div>

    <div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
        <table class="w-full text-sm text-left">
            <thead class="bg-kunyit/10 text-sogan uppercase text-xs font-semibold">
                <tr>
                    <th class="px-4 py-3 text-left">Jabatan</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">No HP</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Alamat</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($perangkats as $item)
                <tr class="border-b border-gray-200 hover:bg-orange-50">
                    <td class="px-4 py-2">{{ $item->jabatan }}</td>
                    <td class="px-4 py-2">{{ $item->nama }}</td>
                    <td class="px-4 py-2">{{ $item->nomor_hp }}</td>
                    <td class="px-4 py-2">{{ $item->email }}</td>
                    <td class="px-4 py-2">{{ $item->alamat }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.perangkat.edit', $item->id) }}"
                            class="text-sogan hover:underline text-sm font-medium">Edit</a>
                        <form action="{{ route('admin.perangkat.destroy', $item->id) }}"
                            method="POST"
                            class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline text-sm font-medium">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center px-4 py-6 text-gray-500">
                        Belum ada data perangkat dusun.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
@endpush

<style>
    .font-roboto {
        font-family: 'Roboto', sans-serif;
    }
</style>
@endsection