@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">📢 Daftar Berita Dusun</h3>

    {{-- Tombol tambah berita --}}
    <div class="mb-3">
        <a href="{{ route('admin.berita.create') }}" class="btn btn-success">+ Tambah Berita</a>
    </div>

    {{-- Form pencarian --}}
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-6">
            <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Cari berdasarkan judul...">
        </div>
        <div class="col-md-auto">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    {{-- Tabel berita --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($berita as $b)
                <tr>
                    <td >{{ $b->judul }}</td>
                    <td>{{ $b->penulis ?? '-' }}</td>
                    <td>{{ $b->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.berita.edit', $b->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada berita ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $berita->withQueryString()->links() }}
    </div>
</div>
@endsection