@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>{{ $kegiatan->judul }}</h3>
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}</p>
    @if($kegiatan->waktu_mulai)
    <p><strong>Waktu:</strong> {{ $kegiatan->waktu_mulai }} - {{ $kegiatan->waktu_selesai }}</p>
    @endif
    @if($kegiatan->lokasi)
    <p><strong>Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
    @endif
    <div>
        {!! nl2br(e($kegiatan->deskripsi)) !!}
    </div>
</div>
@endsection