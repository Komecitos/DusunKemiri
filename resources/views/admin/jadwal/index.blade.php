@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Daftar Jadwal Kegiatan</h3>

    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-success mb-3">Tambah Jadwal</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $j)
            <tr>
                <td>{{ $j->judul }}</td>
                <td>{{ $j->tanggal }} {{ $j->waktu_mulai }}</td>
                <td>{{ $j->tanggal }} {{ $j->waktu_selesai }}</td>
                <td>{{ $j->lokasi }}</td>
                <td>
                    <a href="{{ route('admin.jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus jadwal ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $jadwal->links() }}
</div>
@endsection