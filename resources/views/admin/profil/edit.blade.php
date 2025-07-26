@extends('layouts.admin')

@section('title', 'Edit Profil Dusun')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6 font-roboto">
    <h1 class="text-2xl font-bold text-sogan mb-6">Edit Profil Dusun</h1>

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
            <label for="{{ $field }}" class="block font-semibold text-sogan mb-1">{{ $label }}</label>
            <textarea name="{{ $field }}" id="{{ $field }}" rows="4"
                class="w-full border border-kunyit bg-[#fffaf3] text-gray-800 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-kunyit">{{ old($field, $profil->$field) }}</textarea>
        </div>
        @endforeach

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.profil.index') }}"
                class="text-sm text-sogan hover:underline">
                ← Kembali ke Profil
            </a>
            <button type="submit"
                class="bg-kunyit hover:bg-[#c69058] text-white px-5 py-2 rounded-xl font-semibold shadow">
                Simpan Perubahan
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