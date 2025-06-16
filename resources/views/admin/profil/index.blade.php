@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="text-2xl font-bold mb-4">Data Profil Dusun</h1>

    <a href="{{ route('admin.profil.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">Edit Profil</a>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h2 class="font-semibold">Sejarah</h2>
            <p class="border p-2 rounded bg-gray-50">{{ $profil->sejarah }}</p>
        </div>
        <div>
            <h2 class="font-semibold">Visi</h2>
            <p class="border p-2 rounded bg-gray-50">{{ $profil->visi }}</p>
        </div>
        <div>
            <h2 class="font-semibold">Misi</h2>
            <p class="border p-2 rounded bg-gray-50 whitespace-pre-line">{{ $profil->misi }}</p>
        </div>
        <div>
            <h2 class="font-semibold">Letak Geografis</h2>
            <p class="border p-2 rounded bg-gray-50">{{ $profil->letak_geografis }}</p>
        </div>
        <div>
            <h2 class="font-semibold">Kondisi Sosial Budaya</h2>
            <p class="border p-2 rounded bg-gray-50">{{ $profil->kondisi_sosial_budaya }}</p>
        </div>
        <div>
            <h2 class="font-semibold">Potensi Dusun</h2>
            <p class="border p-2 rounded bg-gray-50">{{ $profil->potensi_dusun }}</p>
        </div>
    </div>
</div>
@endsection