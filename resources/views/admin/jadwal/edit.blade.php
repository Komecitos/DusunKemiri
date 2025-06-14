@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Edit Jadwal Kegiatan</h3>

    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul Kegiatan</label>
            <input type="text" name="judul" class="form-control" value="{{ $jadwal->judul }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $jadwal->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label>Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" value="{{ $jadwal->waktu_mulai }}" required>
        </div>

        <div class="mb-3">
            <label>Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" value="{{ $jadwal->waktu_selesai }}" required>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $jadwal->lokasi }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection