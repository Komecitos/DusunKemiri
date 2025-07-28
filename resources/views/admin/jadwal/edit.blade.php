@extends('layouts.admin')

@section('title', 'Edit Jadwal')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-6 font-roboto border border-sogan/30">
    <h2 class="text-2xl font-bold text-sogan mb-6">Edit Jadwal Kegiatan</h2>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
        <strong>Terjadi kesalahan:</strong>
        <ul class="list-disc list-inside mt-2 text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" class="space-y-4 text-sm">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Judul Kegiatan</label>
            <input type="text" name="judul" value="{{ old('judul', $jadwal->judul) }}"
                class="w-full border border-kunyit rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $jadwal->tanggal) }}"
                    class="w-full border border-kunyit rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $jadwal->lokasi) }}"
                    class="w-full border border-kunyit rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1">Waktu Mulai</label>
                <input type="time" name="waktu_mulai" value="{{ old('waktu_mulai', $jadwal->waktu_mulai) }}"
                    class="w-full border border-kunyit rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Waktu Selesai</label>
                <input type="time" name="waktu_selesai" value="{{ old('waktu_selesai', $jadwal->waktu_selesai) }}"
                    class="w-full border border-kunyit rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
            </div>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.jadwal.index') }}"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">Kembali</a>
            <button type="submit"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">Update</button>
        </div>
    </form>
</div>
@endsection