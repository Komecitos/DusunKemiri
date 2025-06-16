@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="text-2xl font-bold mb-4">Edit Profil Dusun</h1>

    @if(session('success'))
    <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.profil.update') }}" method="POST">
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
        <div class="mb-4">
            <label class="block font-semibold mb-1">{{ $label }}</label>
            <textarea name="{{ $field }}" class="w-full border p-2 rounded" rows="4">{{ old($field, $profil->$field) }}</textarea>
        </div>
        @endforeach

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
</div>
@endsection