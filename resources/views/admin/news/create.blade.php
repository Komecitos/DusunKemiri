@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-6 font-roboto border border-sogan/30">
    <h2 class="text-2xl font-bold text-sogan mb-6">Tambah Berita Dusun</h2>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
        <strong>Terjadi kesalahan!</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold text-sogan mb-1">Judul</label>
            <input type="text" name="judul" class="input" value="{{ old('judul') }}" required>
        </div>

        <div>
            <label class="block font-semibold text-sogan mb-1">Isi Berita</label>
            <textarea name="isi" id="isi-editor" rows="10" class="input">{{ old('isi') }}</textarea>
        </div>

        <div>
            <label class="block font-semibold text-sogan mb-1">Penulis</label>
            <input type="text" name="penulis" class="input" value="{{ old('penulis') }}">
        </div>

        <div>
            <label class="block font-semibold text-sogan mb-1">Tanggal</label>
            <input type="date" name="tanggal" class="input" value="{{ old('tanggal') }}">
        </div>

        <div>
            <label class="block font-semibold text-sogan mb-1">Gambar</label>
            <input type="file" name="gambar" class="input">
        </div>

        <div>
            <label class="block font-semibold text-sogan mb-1">Keterangan Gambar</label>
            <input type="text" name="keterangan_gambar" class="input" value="{{ old('keterangan_gambar') }}">
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.berita.index') }}" class="bg-sogan/20 text-sogan px-4 py-2 rounded hover:bg-sogan/30 transition">← Kembali</a>
            <button type="submit" class="bg-kunyit text-white hover:bg-kunyit/90 font-semibold px-6 py-2 rounded transition">Simpan</button>
        </div>
    </form>
</div>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi-editor');
</script>

{{-- Custom Styling --}}
<style>
    .input {
        @apply rounded-xl px-3 py-2 w-full border border-sogan/30 focus:outline-none focus:ring-2 focus:ring-kunyit;
        background-color: #fffaf3;
    }

    .font-roboto {
        font-family: 'Roboto', sans-serif;
    }
</style>

{{-- Font --}}
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
@endsection