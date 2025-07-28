@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-6 font-roboto border border-kunyit">
    <h2 class="text-3xl font-bold text-sogan mb-6">Edit Berita Dusun</h2>
    <a href="{{ route('admin.berita.index') }}" class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-4 py-2 rounded shadow transition">Kembali</a>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1 ml-1">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" class="input" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1 ml-1">Isi</label>
            <textarea id="editor" name="isi" rows="8" class="input">{{ old('isi', $berita->isi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1 ml-1">Penulis</label>
            <input type="text" name="penulis" value="{{ old('penulis', $berita->penulis) }}" class="input">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1 ml-1">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $berita->tanggal) }}" class="input">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1 ml-1">Gambar Baru</label>
            <input type="file" name="gambar" class="input">
            @if ($berita->gambar)
            <div class="mt-2">
                <small class="text-gray-600">Gambar saat ini:</small><br>
                <img src="{{ asset('storage/' . $berita->gambar) }}" class="rounded-md mt-1 border border-kunyit max-w-xs" alt="gambar">
            </div>
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1 ml-1">Keterangan Gambar</label>
            <input type="text" name="keterangan_gambar" value="{{ old('keterangan_gambar', $berita->keterangan_gambar) }}" class="input">
        </div>

        <div class="md:col-span-2 flex justify-end mt-6 ">
            <button type="submit" class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">Update</button>
        </div>
    </form>
</div>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>

{{-- Custom Tailwind Utility --}}
<style>
    .input {
        @apply w-full border border-kunyit rounded-md px-3 py-2 text-sogan focus:outline-none focus:ring-2 focus:ring-kunyit bg-white;
    }
</style>

{{-- Font Roboto --}}
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
@endsection