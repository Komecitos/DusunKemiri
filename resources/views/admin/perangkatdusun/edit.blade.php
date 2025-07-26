@extends('layouts.admin')

@section('title', 'Edit Perangkat Dusun')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6 font-roboto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-sogan">Edit Data Perangkat Dusun</h2>
        <a href="{{ route('admin.perangkat.index') }}"
            class="text-sm bg-gray-200 text-gray-700 hover:bg-gray-300 px-3 py-1 rounded shadow">
            ← Kembali
        </a>
    </div>

    @if ($errors->any())
    <div class="bg-red-100 text-red-800 p-4 rounded border border-red-300 mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.perangkat.update', $perangkat->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 bg-white p-6 rounded-xl shadow border border-kunyit">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block text-sm font-semibold text-sogan mb-1">Nama</label>
            <input type="text" name="nama" id="nama"
                value="{{ old('nama', $perangkat->nama) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-kunyit"
                required>
        </div>

        <div>
            <label for="jabatan" class="block text-sm font-semibold text-sogan mb-1">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan"
                value="{{ old('jabatan', $perangkat->jabatan) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-kunyit"
                required>
        </div>

        <div>
            <label for="nomor_hp" class="block text-sm font-semibold text-sogan mb-1">No HP</label>
            <input type="text" name="nomor_hp" id="nomor_hp"
                value="{{ old('nomor_hp', $perangkat->nomor_hp) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-kunyit"
                required>
        </div>

        <div>
            <label for="foto" class="block text-sm font-semibold text-sogan mb-1">Foto (opsional)</label>
            <input type="file" name="foto" id="foto"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none">

            @if ($perangkat->foto)
            <div class="mt-3">
                <p class="text-sm text-gray-600">Foto saat ini:</p>
                <img src="{{ asset('storage/' . $perangkat->foto) }}"
                    alt="Foto Perangkat"
                    class="mt-1 w-32 h-32 object-cover rounded shadow border border-gray-300">
            </div>
            @endif
        </div>

        <div class="flex justify-between pt-4">
            <button type="submit"
                class="bg-kunyit hover:bg-[#c69058] text-white font-semibold py-2 px-6 rounded-xl shadow">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.perangkat.index') }}"
                class="bg-gray-100 text-gray-700 hover:bg-gray-200 py-2 px-6 rounded-xl shadow">
                Batal
            </a>
        </div>
    </form>
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