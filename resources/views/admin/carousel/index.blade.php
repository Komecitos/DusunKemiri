@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-sogan">Manajemen Carousel</h2>
    <a href="{{ route('admin.carousel.create') }}"
        class="bg-sogan text-white hover:bg-kunyit/80 hover:text-sogan  px-4 py-2 rounded text-sm font-medium shadow transition">
        + Tambah Slide
    </a>
</div>

<div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
    <table class="w-full text-sm text-left">
        <thead class="bg-kunyit/10 text-sogan uppercase text-xs font-semibold">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold tracking-wider">Gambar</th>
                <th class="px-4 py-3 text-left text-sm font-semibold tracking-wider">Judul</th>
                <th class="px-4 py-3 text-left text-sm font-semibold tracking-wider">Text</th>
                <th class="px-4 py-3 text-left text-sm font-semibold tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach($carousels as $item)
            <tr class="border-b border-gray-200 hover:bg-orange-50">
                <td class="px-4 py-2">
                    <img src="{{ asset('storage/' . $item->image) }}" class="h-16 w-auto rounded shadow border border-gray-300" alt="Slide">
                </td>
                <td class="px-4 py-2 text-sogan font-medium">{{ $item->title }}</td>
                <td class="px-4 py-2 text-sogan font-medium">{{ $item->text }}</td>
                <td class="px-4 py-2 space-x-2">
                    <form action="{{ route('admin.carousel.destroy', $item) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Yakin ingin menghapus slide ini?');"
                            class="text-red-600 hover:underline text-sm font-medium">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection