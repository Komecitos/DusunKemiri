@extends('layouts.admin')

@section('title', 'Daftar Berita')

@section('content')

{{-- Tombol Tambah --}}
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-sogan">Daftar Berita Dusun</h2>
    <a href="{{ route('admin.berita.create') }}"
        class="bg-sogan hover:bg-kunyit/80 text-white px-4 py-2 rounded text-sm font-medium shadow transition">
        Tambah Berita
    </a>    
</div>

{{-- Form Pencarian --}}
<form method="GET" class="flex flex-col md:flex-row gap-3 mb-6">
    <select name="kategori" class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-kunyit focus:border-kunyit focus:outline-none">
        <option value="judul" {{ request('kategori') == 'judul' ? 'selected' : '' }}>Judul</option>
        <option value="penulis" {{ request('kategori') == 'penulis' ? 'selected' : '' }}>Penulis</option>
        <option value="tanggal" {{ request('kategori') == 'tanggal' ? 'selected' : '' }}>Tanggal</option>
    </select>

    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Masukkan kata kunci..."
        class="border border-gray-300 rounded-md px-3 py-2 w-64 text-sm pr-8 focus:ring-kunyit focus:border-kunyit focus:outline-none" />

    <button type="submit"
        class="bg-sogan text-white px-4 py-2 rounded hover:bg-kunyit transition">Cari</button>
</form>


{{-- Tabel Berita --}}
<div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
    <table class="w-full text-sm text-left">
        <thead class="bg-kunyit/10 text-sogan uppercase text-xs font-semibold">
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
                        class="text-sogan hover:underline text-sm font-medium">Edit</a>
                    <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="inline"
                        onsubmit="return confirm('Hapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-red-600 hover:underline text-sm font-medium">Hapus</button>
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