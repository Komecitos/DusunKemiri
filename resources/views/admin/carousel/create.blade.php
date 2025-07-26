@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-xl font-bold text-sogan mb-6">Tambah Slide Carousel</h2>

    @if ($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.carousels.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 border border-gray-200">
        @csrf
        <div class="mb-4">
            <label for="title" class="block font-semibold mb-1 text-sogan">Judul Slide</label>
            <input type="text" name="title" id="title" class="w-full border border-kunyit rounded px-4 py-2 focus:ring-2 focus:ring-orange-500" value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label for="text" class="block font-semibold mb-1 text-sogan">Deskripsi</label>
            <textarea name="text" id="text" rows="3" class="w-full border border-kunyit rounded px-4 py-2 focus:ring-2 focus:ring-orange-500" required>{{ old('text') }}</textarea>
        </div>

        <div class="mb-6">
            <label for="image" class="block font-semibold mb-1 text-sogan">Gambar</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full border border-kunyit px-2 py-1 rounded" required>
        </div>

        <button type="submit" class="bg-kunyit text-white px-6 py-2 rounded hover:bg-orange-700">Simpan Slide</button>
    </form>
</div>
@endsection