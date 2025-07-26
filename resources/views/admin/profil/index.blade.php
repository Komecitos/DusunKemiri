@extends('layouts.admin')

@section('title', 'Profil Dusun')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-6 font-roboto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-sogan">Data Profil Dusun</h1>
        <a href="{{ route('admin.profil.edit') }}"
            class="bg-kunyit hover:bg-[#c69058] text-white px-4 py-2 rounded-xl shadow transition text-sm font-semibold">
             Edit Profil
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h2 class="font-semibold text-sogan mb-1">Sejarah</h2>
            <p class="border border-kunyit bg-[#fffaf3] p-4 rounded-xl min-h-[100px]">{{ $profil->sejarah }}</p>
        </div>
        <div>
            <h2 class="font-semibold text-sogan mb-1">Visi</h2>
            <p class="border border-kunyit bg-[#fffaf3] p-4 rounded-xl min-h-[100px]">{{ $profil->visi }}</p>
        </div>
        <div class="md:col-span-2">
            <h2 class="font-semibold text-sogan mb-1">Misi</h2>
            <p class="border border-kunyit bg-[#fffaf3] p-4 rounded-xl whitespace-pre-line min-h-[100px]">{{ $profil->misi }}</p>
        </div>
        <div>
            <h2 class="font-semibold text-sogan mb-1">Letak Geografis</h2>
            <p class="border border-kunyit bg-[#fffaf3] p-4 rounded-xl min-h-[100px]">{{ $profil->letak_geografis }}</p>
        </div>
        <div>
            <h2 class="font-semibold text-sogan mb-1">Kondisi Sosial Budaya</h2>
            <p class="border border-kunyit bg-[#fffaf3] p-4 rounded-xl min-h-[100px]">{{ $profil->kondisi_sosial_budaya }}</p>
        </div>
        <div class="md:col-span-2">
            <h2 class="font-semibold text-sogan mb-1">Potensi Dusun</h2>
            <p class="border border-kunyit bg-[#fffaf3] p-4 rounded-xl min-h-[100px]">{{ $profil->potensi_dusun }}</p>
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