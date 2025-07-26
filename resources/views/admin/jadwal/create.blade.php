@extends('layouts.admin')

@section('title', 'Tambah Jadwal')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow font-roboto">
    <h2 class="text-2xl font-bold text-sogan mb-6">Tambah Jadwal Kegiatan</h2>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-xl">
        <strong>Terjadi kesalahan:</strong>
        <ul class="list-disc list-inside mt-2 text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.jadwal.store') }}" method="POST" class="space-y-4 text-sm">
        @csrf

        <div>
            <label class="block font-semibold mb-1 text-sogan">Judul Kegiatan</label>
            <input type="text" name="judul" value="{{ old('judul') }}"
                class="w-full border border-kunyit rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1 text-sogan">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                    class="w-full border border-kunyit rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-sogan">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                    class="w-full border border-kunyit rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1 text-sogan">Waktu Mulai</label>
                <input type="time" name="waktu_mulai" value="{{ old('waktu_mulai') }}"
                    class="w-full border border-kunyit rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
            </div>

            <div>
                <label class="block font-semibold mb-1 text-sogan">Waktu Selesai</label>
                <input type="time" name="waktu_selesai" value="{{ old('waktu_selesai') }}"
                    class="w-full border border-kunyit rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit" required>
            </div>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('admin.jadwal.index') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition">← Kembali</a>
            <button type="submit"
                class="px-6 py-2 bg-kunyit hover:bg-kunyitTua text-white font-semibold rounded-xl transition">Simpan</button>
        </div>
    </form>
</div>
@endsection