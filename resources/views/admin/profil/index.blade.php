@extends('layouts.admin')

@section('title', 'Profil Dusun')

@section('content')
<div class="">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-sogan">Data Profil Dusun</h1>
        <a href="{{ route('admin.profil.edit') }}"
            class="bg-sogan text-white hover:bg-kunyit/80 hover:text-sogan  px-4 py-2 rounded text-sm font-medium shadow transition">
            Edit Profil
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h2 class="font-semibold text-sogan mb-3">Sejarah</h2>
            <p class="bg-white border-l-4 border-kunyit rounded-xl shadow-md p-6">{{ $profil->sejarah }}</p>
        </div>
        <div>
            <h2 class="font-semibold text-sogan mb-3">Visi</h2>
            <p class="bg-white border-l-4 border-kunyit rounded-xl shadow-md p-6">{{ $profil->visi }}</p>
        </div>
        <div class="md:col-span-2">
            <h2 class="font-semibold text-sogan mb-3">Misi</h2>
            <p class="bg-white border-l-4 border-kunyit rounded-xl shadow-md p-6">{{ $profil->misi }}</p>
        </div>
        <div>
            <h2 class="font-semibold text-sogan mb-3">Letak Geografis</h2>
            <p class="bg-white border-l-4 border-kunyit rounded-xl shadow-md p-6">{{ $profil->letak_geografis }}</p>
        </div>
        <div>
            <h2 class="font-semibold text-sogan mb-3">Kondisi Sosial Budaya</h2>
            <p class="bg-white border-l-4 border-kunyit rounded-xl shadow-md p-6">{{ $profil->kondisi_sosial_budaya }}</p>
        </div>
        <div class="md:col-span-2">
            <h2 class="font-semibold text-sogan mb-3">Potensi Dusun</h2>
            <p class="bg-white border-l-4 border-kunyit rounded-xl shadow-md p-6">{{ $profil->potensi_dusun }}</p>
        </div>
    </div>
</div>

{{-- Font --}}
@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
@endpush

<style>
    .font-roboto {
        font-family: 'Roboto', sans-serif;
    }
</style>
@endsection