@extends('layouts.app')

@section('content')
<div class="container py-4">
    <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary mb-3">← Kembali ke Daftar Berita</a>

    <h2>{{ $berita->judul }}</h2>
    <p class="text-muted">
        {{ $berita->penulis ?? 'Anonim' }} | {{ \Carbon\Carbon::parse($berita->tanggal ?? $berita->created_at)->translatedFormat('d M Y') }}
    </p>

    @if ($berita->gambar)
    <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid mb-2" alt="gambar berita">
    <p class="text-muted"><small>{{ $berita->keterangan_gambar }}</small></p>
    @endif

    <div class="mt-3">
        {!! nl2br(e($berita->isi)) !!}
    </div>
</div>
@endsection