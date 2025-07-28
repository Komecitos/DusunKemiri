@extends('layouts.admin')

@section('title', 'Daftar Marker Peta')

@section('content')
<div class="">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-sogan">Daftar Marker Peta Dusun</h2>
        <a href="{{ route('admin.petadusun.create') }}"
            class="bg-sogan hover:bg-kunyit/80 text-white px-4 py-2 rounded text-sm font-medium shadow transition">
            Tambah Marker
        </a>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
        <table class="w-full text-sm text-left">
            <thead class="bg-kunyit/10 text-sogan uppercase text-xs font-semibold">
                <tr>
                    <th class="px-4 py-3 border-b border-kunyit">Nama Lokasi</th>
                    <th class="px-4 py-3 border-b border-kunyit">Latitude</th>
                    <th class="px-4 py-3 border-b border-kunyit">Longitude</th>
                    <th class="px-4 py-3 border-b border-kunyit">Keterangan</th>
                    <th class="px-4 py-3 border-b border-kunyit text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse($petadusun as $marker)
                <tr class="hover:bg-kunyit/10 transition">
                    <td class="px-4 py-3 border-b border-gray-200">{{ $marker->nama }}</td>
                    <td class="px-4 py-3 border-b border-gray-200">{{ $marker->latitude }}</td>
                    <td class="px-4 py-3 border-b border-gray-200">{{ $marker->longitude }}</td>
                    <td class="px-4 py-3 border-b border-gray-200">{{ $marker->keterangan }}</td>
                    <td class="px-4 py-3 border-b border-gray-200 text-center space-x-2">
                        <a href="{{ route('admin.petadusun.edit', $marker->id) }}"
                            class="text-sogan hover:underline text-sm font-medium">
                            Edit
                        </a>
                        <form action="{{ route('admin.petadusun.destroy', $marker->id) }}" method="POST"
                            class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus marker ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:underline text-sm font-medium">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 px-4 py-6">
                        Belum ada marker ditambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Optional: Font Roboto jika belum ada --}}
@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
@endpush

<style>
    .font-roboto {
        font-family: 'Roboto', sans-serif;
    }
</style>
@endsection