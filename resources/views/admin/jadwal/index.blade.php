@extends('layouts.admin')

@section('title', 'Jadwal Kegiatan')

@section('content')
<div class="">

    {{-- Tombol Tambah --}}
    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-sogan">Jadwal Kegiatan Dusun</h2>
        <a href="{{ route('admin.jadwal.create') }}"
            class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-4 py-2 rounded text-sm font-medium shadow transition">
            Tambah Jadwal
        </a>
    </div>

    @if ($jadwal->count())
    {{-- Tabel Jadwal --}}
    <div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
        <table class="w-full text-sm text-left">
            <thead class="bg-kunyit/10 text-sogan uppercase text-xs font-semibold">
                <tr>
                    <th class="px-4 py-3 border-b border-kunyit">Judul</th>
                    <th class="px-4 py-3 border-b border-kunyit">Waktu Mulai</th>
                    <th class="px-4 py-3 border-b border-kunyit">Waktu Selesai</th>
                    <th class="px-4 py-3 border-b border-kunyit">Lokasi</th>
                    <th class="px-4 py-3 border-b border-kunyit text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach ($jadwal as $j)
                <tr class="hover:bg-kunyit/10 transition">
                    <td class="px-4 py-3 border-b border-gray-200">{{ $j->judul }}</td>
                    <td class="px-4 py-3 border-b border-gray-200">
                        {{ \Carbon\Carbon::parse($j->tanggal . ' ' . $j->waktu_mulai)->format('d M Y H:i') }}
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200">
                        {{ \Carbon\Carbon::parse($j->tanggal . ' ' . $j->waktu_selesai)->format('d M Y H:i') }}
                    </td>
                    <td class="px-4 py-3 border-b border-gray-200">{{ $j->lokasi }}</td>
                    <td class="px-4 py-3 border-b border-gray-200 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.jadwal.edit', $j->id) }}"
                                class="text-sogan hover:underline text-sm font-medium">Edit</a>
                            <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST"
                                onsubmit="return confirm('Hapus jadwal ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:underline text-sm font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $jadwal->links('pagination::tailwind') }}
    </div>
    @else
    <div class="text-center py-6 bg-kunyit/10 border border-kunyit rounded-xl text-sogan font-medium">
        Belum ada jadwal kegiatan.
    </div>
    @endif
</div>
@endsection