@extends('layouts.admin')

@section('title', 'Tambah Perangkat Dusun')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-6 font-roboto border border-kunyit">
    <div class="text-3xl font-medium text-sogan mb-6">
        <h2 class="text-2xl font-bold text-sogan">Tambah Perangkat Dusun</h2>
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

    <form action="{{ route('admin.perangkat.store') }}" method="POST" enctype="multipart/form-data"
        class="">
        @csrf

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Nama</label>
            <input type="text" name="nama" id="nama"
                class="w-full border border-gray-300 bg-white text-gray-800 p-3 rounded focus:outline-none focus:ring-1 focus:ring-kunyit"
                required>
        </div>

        <div>
            <label for="jabatan" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan"
                class="w-full border border-gray-300 bg-white text-gray-800 p-3 rounded focus:outline-none focus:ring-1 focus:ring-kunyit"
                required>
        </div>

        <div>
            <label for="nomor_hp" class="block text-sm font-medium text-gray-600 mb-1 ml-1">No HP</label>
            <input type="text" name="nomor_hp" id="nomor_hp"
                class="w-full border border-gray-300 bg-white text-gray-800 p-3 rounded focus:outline-none focus:ring-1 focus:ring-kunyit"
                required>
        </div>

        <div>
            <label for="foto" class="block text-sm font-medium text-gray-600 mb-1 ml-1">Foto (opsional)</label>
            <input type="file" name="foto" id="foto"
                class="w-full border border-gray-300 bg-white text-gray-800 p-3 rounded focus:outline-none focus:ring-1 focus:ring-kunyit">
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.perangkat.index') }}"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">
                Kembali
            </a>
            <button type="submit"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">
                Simpan 
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