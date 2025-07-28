@extends('layouts.admin')

@section('title', 'Edit Perangkat Dusun')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-6 font-roboto border border-kunyit">
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-sogan mb-6">Edit Data Perangkat Dusun</h2>

    </div>

    @if ($errors->any())
    <div class=" bg-red-100 text-red-800 p-4 rounded border border-red-300 mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.perangkat.update', $perangkat->id) }}" method="POST" enctype="multipart/form-data"
        class="">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Nama</label>
            <input type="text" name="nama" id="nama"
                value="{{ old('nama', $perangkat->nama) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-kunyit"
                required>
        </div>

        <div>
            <label for="jabatan" class="block text-sm font-medium text-gray-600 mb-1 ml-1 mt-3">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan"
                value="{{ old('jabatan', $perangkat->jabatan) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-kunyit"
                required>
        </div>

        <div>
            <label for="nomor_hp" class="block text-sm font-medium text-gray-600 mb-1 ml-1 mt-3">No HP</label>
            <input type="text" name="nomor_hp" id="nomor_hp"
                value="{{ old('nomor_hp', $perangkat->nomor_hp) }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-kunyit"
                required>
        </div>

        <div>
            <div class="mt-3">
                <p class="block text-sm font-medium text-gray-600 mb-1 ml-1">Foto Saat Ini:</p>
                <img src="{{ asset('storage/' . $perangkat->foto) }}"
                    alt="Foto Perangkat"
                    class="mt-1 w-32 h-32 object-cover rounded shadow border border-gray-300">
            </div>

            <div class="mt-3">
                <label for="foto" class="block text-sm font-medium mb-1 ml-1">Ganti Foto</label>
                <input type="file" name="foto" id="foto"
                    class="form-input block w-full text-sm text-gray-700 border border-gray-300 rounded-md cursor-pointer focus:ring-kunyit focus:border-kunyit">
                @error('foto')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.perangkat.index') }}"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">
                Kembali
            </a>
            <button type="submit"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">
                Update
            </button>
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