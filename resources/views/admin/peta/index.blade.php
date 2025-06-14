@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar Marker Peta</h2>
    <a href="{{ route('admin.petadusun.create') }}" class="btn btn-success mb-3">+ Tambah Marker</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Lokasi</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($petadusun as $marker)
            <tr>
                <td>{{ $marker->nama }}</td>
                <td>{{ $marker->latitude }}</td>
                <td>{{ $marker->longitude }}</td>
                <td>{{ $marker->keterangan }}</td>
                <td>
                    <a href="{{ route('admin.petadusun.edit', $marker->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.petadusun.destroy', $marker->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus marker ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection