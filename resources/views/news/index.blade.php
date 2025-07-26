@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-2xl md:text-3xl font-bold text-sogan text-center mb-0">
        Berita <span class="text-orange-700">Dusun Kemiri</span>
    </h2>

    <!-- Form Pencarian -->
    <div class="max-w-4xl mx-auto px-4 py-6">
        <form method="GET" action="{{ route('berita.index') }}" class="flex flex-col md:flex-row md:items-center gap-2">
            <input type="text" name="cari" value="{{ request('cari') }}"
                placeholder="Cari berita..."
                class="flex-grow border border-kunyit rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-kunyit focus:border-transparent text-sm text-sogan placeholder-gray-400" />

            <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                class="border border-kunyit rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-kunyit focus:border-transparent text-sogan" />

            <button type="submit"
                class="bg-orange-700 text-white px-4 py-2 rounded-md text-sm hover:bg-orange-800 transition">
                Cari
            </button>

            @if(request()->has('cari') || request()->has('tanggal'))
            <a href="{{ route('berita.index') }}"
                class="text-orange-700 border border-orange-700 px-4 py-2 rounded-md text-sm hover:bg-orange-100 transition text-center">
                Hapus Filter
            </a>
            @endif
        </form>
    </div>

    <!-- Daftar Berita -->
    @if ($berita->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($berita as $b)
        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition duration-300 overflow-hidden flex flex-col border border-kunyit">
            @if ($b->gambar)
            <img src="{{ asset('storage/' . $b->gambar) }}" alt="Gambar Berita"
                class="w-full h-48 object-cover">
            @endif
            <div class="p-5 flex flex-col flex-grow">
                <h3 class="text-lg font-semibold text-sogan mb-2">{{ $b->judul }}</h3>
                <p class="text-xs text-gray-500 mb-1">
                    {{ $b->penulis ?? 'Anonim' }} •
                    {{ \Carbon\Carbon::parse($b->tanggal ?? $b->created_at)->translatedFormat('d M Y') }}
                </p>
                <div class="text-sm text-gray-600 mb-4 flex-grow">
                    {!! Str::limit($b->isi, 200) !!}
                </div>
                <a href="{{ route('berita.show', $b->slug) }}"
                    class="inline-block mt-auto text-sm bg-kunyit text-sogan px-4 py-2 rounded hover:bg-opacity-90 transition duration-200 font-medium text-center">
                    Baca Selengkapnya
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8 flex justify-center">
        {{ $berita->links('pagination::tailwind') }}
    </div>
    @else
    <div class="text-center bg-[#FAF5EF] text-sogan py-6 px-4 rounded-lg shadow-sm">
        Belum ada berita yang tersedia.
    </div>
    @endif
</div>
@endsection