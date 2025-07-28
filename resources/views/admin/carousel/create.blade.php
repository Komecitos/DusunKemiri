@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-6 font-roboto border border-sogan/30">
    <h2 class="text-2xl font-bold text-sogan mb-6">Tambah Slide Carousel</h2>

    @if ($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.carousels.store') }}" method="POST" enctype="multipart/form-data" class="">
        @csrf
        <div class="mb-4">
            <label for="title" class="block font-semibold text-sogan mb-1">Judul Slide</label>
            <input type="text" name="title" id="title" class="w-full border border-kunyit rounded px-4 py-2 focus:ring-1 focus:ring-kunyit focus:outline-none " value="{{ old('title') }}">
        </div>

        <div class="mb-4">
            <label for="text" class="block font-semibold mb-1 text-sogan">Deskripsi</label>
            <textarea name="text" id="text" rows="3" class="w-full border border-kunyit rounded px-4 py-2 focus:ring-1 focus:ring-kunyit focus:outline-none ">{{ old('text') }}</textarea>
        </div>

        <div class="mb-6">
            <label for="image" class="block font-semibold mb-1 text-sogan">Gambar</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full border border-kunyit px-2 py-1 rounded" required>
        </div>

        <div class="flex justify-between ">
            <a href="{{ route('admin.carousel.index') }}"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">Kembali</a>
            <button type="submit" class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">Simpan</button>
        </div>
    </form>
</div>
@endsection