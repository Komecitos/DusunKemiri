@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Tambah Jadwal Kegiatan</h3>

    <form action="{{ route('admin.jadwal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul Kegiatan</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection 