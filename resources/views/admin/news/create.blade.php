@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">📰 Tambah Berita Dusun</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan!</strong>
        <ul class="mb-0 mt-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi</label>
            <textarea name="isi" class="form-control" rows="6" required>{{ old('isi') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" value="{{ old('penulis') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan Gambar</label>
            <input type="text" name="keterangan_gambar" class="form-control" value="{{ old('keterangan_gambar') }}">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">← Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection