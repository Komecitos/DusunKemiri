@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-bold mb-4 text-sogan">Manajemen Carousel</h2>

<a href="{{ route('admin.carousel.create') }}" class="bg-kunyit text-white px-4 py-2 rounded">Tambah Slide</a>

<table class="mt-4 w-full table-auto border">
    <thead>
        <tr class="bg-gray-100">
            <th class="p-2">Gambar</th>
            <th class="p-2">Judul</th>
            <th class="p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($carousels as $item)
        <tr class="border-t">
            <td class="p-2"><img src="{{ asset('storage/' . $item->image) }}" class="h-16"></td>
            <td class="p-2">{{ $item->title }}</td>
            <td class="p-2 space-x-2">
                <a href="{{ route('admin.carousel.edit', $item) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('admin.carousel.destroy', $item) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus slide?')" class="text-red-600">Hapus</button>
                </form>
            </td>
            <td>
                <form action="{{ route('admin.carousels.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus slide ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                        Hapus
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection