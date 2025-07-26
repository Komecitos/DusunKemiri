@extends('layouts.admin')

@section('title', 'Daftar Marker Peta')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6 font-roboto">
    <h2 class="text-2xl font-bold text-sogan mb-6">Daftar Marker Peta Dusun</h2>

    {{-- Tombol Tambah --}}
    <div class="mb-4">
        <a href="{{ route('admin.petadusun.create') }}"
            class="bg-kunyit hover:bg-[#c69058] text-white px-4 py-2 rounded-xl shadow transition text-sm font-semibold">
            + Tambah Marker
        </a>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto rounded-xl shadow border border-kunyit bg-white">
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-kunyit/20 text-sogan font-semibold">
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
                            class="inline-block bg-kunyit hover:bg-[#b57d49] text-white px-3 py-1 rounded text-xs font-semibold">
                            Edit
                        </a>
                        <form action="{{ route('admin.petadusun.destroy', $marker->id) }}" method="POST"
                            class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus marker ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs font-semibold">
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