@extends('layouts.admin')

@section('title', 'Daftar Berita')

@section('content')
<h1 class="text-2xl md:text-3xl font-extrabold text-sogan mb-6">Daftar Berita Dusun</h1>

{{-- Tombol Tambah --}}
<div class="mb-4">
    <a href="{{ route('admin.berita.create') }}"
        class="bg-kunyit text-white px-4 py-2 rounded-xl shadow hover:bg-[#c69058] transition">
        + Tambah Berita
    </a>
</div>

{{-- Form Pencarian --}}
<form method="GET" class="flex flex-col md:flex-row gap-3 mb-6">
    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Cari berdasarkan judul..."
        class="w-full md:w-1/2 border border-kunyit text-sogan px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-kunyit focus:border-kunyit" />
    <button type="submit"
        class="bg-sogan text-white px-4 py-2 rounded-xl hover:bg-[#4a3329] transition">Cari</button>
</form>

{{-- Tabel Berita --}}
<div class="overflow-x-auto rounded-xl shadow">
    <table class="min-w-full text-sm md:text-base bg-white border border-kunyit rounded-xl overflow-hidden">
        <thead class="bg-kunyit/20 text-sogan text-left">
            <tr>
                <th class="px-4 py-3 border-b border-kunyit">Judul</th>
                <th class="px-4 py-3 border-b border-kunyit">Penulis</th>
                <th class="px-4 py-3 border-b border-kunyit">Tanggal</th>
                <th class="px-4 py-3 border-b border-kunyit text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($berita as $b)
            <tr class="hover:bg-kunyit/10 transition-colors duration-200 text-gray-800">
                <td class="px-4 py-3 border-b border-gray-200">{{ $b->judul }}</td>
                <td class="px-4 py-3 border-b border-gray-200">{{ $b->penulis ?? '-' }}</td>
                <td class="px-4 py-3 border-b border-gray-200">{{ $b->created_at->format('d M Y') }}</td>
                <td class="px-4 py-3 border-b border-gray-200 text-center space-x-1">
                    <a href="{{ route('admin.berita.edit', $b->id) }}"
                        class="bg-kunyit text-white px-3 py-1 rounded-md hover:bg-[#b57d49] text-sm">Edit</a>
                    <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="inline"
                        onsubmit="return confirm('Hapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr class="bg-[#fcf5ed]">
                <td colspan="4" class="text-center text-gray-500 py-4">Belum ada berita ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="mt-6">
    {{ $berita->withQueryString()->links('pagination::tailwind') }}
</div>
@endsection