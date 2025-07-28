@extends('layouts.admin')

@section('title', 'Edit Profil Dusun')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl p-6 font-roboto border border-kunyit">
    <div class="">
        <h1 class="text-3xl font-bold text-sogan mb-6">Edit Profil Dusun</h1>
        <a href="{{ route('admin.profil.index') }}"
            class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">
            Kembali
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 rounded p-3 mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.profil.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        @foreach ([
        'sejarah' => 'Sejarah',
        'visi' => 'Visi',
        'misi' => 'Misi',
        'letak_geografis' => 'Letak Geografis',
        'kondisi_sosial_budaya' => 'Kondisi Sosial Budaya',
        'potensi_dusun' => 'Potensi Dusun',
        ] as $field => $label)
        <div>
            <label for="{{ $field }}" class="block text-sm font-medium text-gray-600 mb-1 ml-1">{{ $label }}</label>
            <textarea name="{{ $field }}" id="{{ $field }}" rows="4"
                class="w-full border border-gray-300 bg-white text-gray-800 p-3 rounded focus:outline-none focus:ring-1 focus:ring-kunyit">{{ old($field, $profil->$field) }}</textarea>
        </div>
        @endforeach

        <div class="flex justify-end mt-6">
            <button type="submit"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">
                Update
            </button>
        </div>
    </form>
</div>

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
@endpush

<style>
    .font-roboto {
        font-family: 'Roboto', sans-serif;
    }
</style>
@endsection