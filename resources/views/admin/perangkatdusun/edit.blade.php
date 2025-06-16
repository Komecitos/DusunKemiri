@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Edit Data Perangkat Dusun</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.perangkat.update', $perangkat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $perangkat->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ old('jabatan', $perangkat->jabatan) }}" required>
        </div>

        <div class="mb-3">
            <label for="nomor_hp" class="form-label">No HP</label>
            <input type="text" name="nomor_hp" class="form-control" id="nomor_hp" value="{{ old('nomor_hp', $perangkat->nomor_hp) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.perangkat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection