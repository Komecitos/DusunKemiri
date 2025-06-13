@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Berita Dusun</h2>

    @if ($berita->count())
    <div class="row">
        @foreach ($berita as $b)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if ($b->gambar)
                <img src="{{ asset('storage/' . $b->gambar) }}" class="card-img-top" alt="Gambar Berita" style="object-fit: cover; height: 200px;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $b->judul }}</h5>
                    <p class="card-text text-muted small mb-2">
                        {{ $b->penulis ?? 'Anonim' }} |
                        {{ \Carbon\Carbon::parse($b->tanggal ?? $b->created_at)->translatedFormat('d M Y') }}
                    </p>
                    <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($b->isi), 100) }}</p>
                    <a href="{{ route('berita.show', $b->slug) }}" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $berita->links() }}
    </div>
    @else
    <div class="alert alert-info text-center">
        Belum ada berita yang tersedia.
    </div>
    @endif
</div>
@endsection