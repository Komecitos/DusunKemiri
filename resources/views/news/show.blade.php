@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 mr-4 ml-4 md:mr-20 md:ml-20 mb-10">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

        {{-- Bagian Berita Utama --}}
        <div class="lg:col-span-2">
            <a href="{{ route('berita.index') }}"
                class="inline-block text-sm text-kunyit hover:underline mb-4 font-medium">← Kembali ke Daftar Berita</a>

            <h2 class="text-2xl md:text-3xl font-bold text-sogan mb-2">{{ $berita->judul }}</h2>
            <p class="text-sm text-gray-500 mb-4">
                {{ $berita->penulis ?? 'Anonim' }} |
                {{ \Carbon\Carbon::parse($berita->tanggal ?? $berita->created_at)->translatedFormat('d M Y') }}
            </p>

            @if ($berita->gambar)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $berita->gambar) }}"
                    alt="gambar berita" class="rounded-xl shadow-md w-full object-cover max-h-[400px]">
                <p class="text-xs text-gray-500 mt-2 italic">{{ $berita->keterangan_gambar }}</p>
            </div>
            @endif

            <div class="text-darkText leading-relaxed space-y-4 text-justify">
                {!! $berita->isi !!}
            </div>
        </div>

        {{-- Rekomendasi Berita Lain --}}
        <aside class="lg:col-span-1">
            <h3 class="text-xl font-semibold text-kunyit mb-4">Berita Lainnya</h3>

            <div class="space-y-4">
                @foreach($berita_lain as $b)
                <a href="{{ route('berita.show', $b->slug) }}"
                    class="block bg-white border border-kunyit rounded-xl p-4 hover:shadow-md transition duration-200">
                    <h4 class="text-sm font-semibold text-sogan mb-1">{{ $b->judul }}</h4>
                    <p class="text-xs text-gray-500">
                        {{ $b->penulis ?? 'Anonim' }} •
                        {{ \Carbon\Carbon::parse($b->tanggal ?? $b->created_at)->translatedFormat('d M Y') }}
                    </p>
                </a>
                @endforeach
            </div>
        </aside>
    </div>
</div>
@endsection