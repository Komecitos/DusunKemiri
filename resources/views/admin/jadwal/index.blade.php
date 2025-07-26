@extends('layouts.admin')

@section('title', 'Jadwal Kegiatan')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 md:p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl md:text-3xl font-bold text-sogan mb-6">Daftar Jadwal Kegiatan</h2>

    {{-- Tombol Tambah --}}
    <div class="mb-4 flex justify-end">
        <a href="{{ route('admin.jadwal.create') }}"
            class="bg-kunyit text-white px-4 py-2 rounded-xl hover:bg-[#c69058] transition">
            + Tambah Jadwal
        </a>
    </div>

    @if ($jadwal->count())
    {{-- Tabel Jadwal --}}
    <div class="overflow-x-auto rounded-xl shadow border border-kunyit">
        <table class="min-w-full text-sm md:text-base bg-white">
            <thead class="bg-kunyit/20 text-sogan">
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
                                class="bg-kunyit text-white px-3 py-1 rounded-md text-xs hover:bg-[#b57d49]">Edit</a>
                            <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST"
                                onsubmit="return confirm('Hapus jadwal ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs">
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