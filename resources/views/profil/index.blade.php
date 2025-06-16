@extends('layouts.app')

@section('content')
<div class="py-10 px-4 md:px-16 text-[#2D2D2D]">
    <h1 class="text-3xl md:text-4xl font-bold mb-8">Profil Dusun Kemiri</h1>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-orange-500 mb-2">Sejarah</h2>
        <p class="leading-relaxed">{{ $profil->sejarah }}</p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-orange-500 mb-2">Visi</h2>
        <p class="leading-relaxed">{{ $profil->visi }}</p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-orange-500 mb-2">Misi</h2>
        <p class="leading-relaxed">{!! nl2br(e($profil->misi)) !!}</p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-orange-500 mb-2">Letak Geografis</h2>
        <p class="leading-relaxed">{{ $profil->letak_geografis }}</p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-orange-500 mb-2">Kondisi Sosial Budaya</h2>
        <p class="leading-relaxed">{{ $profil->kondisi_sosial_budaya }}</p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-orange-500 mb-2">Potensi Dusun</h2>
        <p class="leading-relaxed">{{ $profil->potensi_dusun }}</p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-orange-500 mb-6">Perangkat Dusun</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($perangkat as $item)
            <div class="bg-white border border-orange-200 rounded-lg shadow hover:shadow-md transition duration-300">
                <div class="p-4">
                    {{-- Foto Placeholder --}}
                    <div class="w-full h-40 bg-orange-100 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                        <img src="{{ $item->foto ?? 'https://ui-avatars.com/api/?name='.urlencode($item->nama).'&background=FA7D09&color=fff&size=128' }}"
                            alt="Foto {{ $item->nama }}"
                            class="object-cover w-full h-full">
                    </div>

                    <h3 class="text-lg font-bold text-orange-700 mb-1">{{ $item->jabatan }}</h3>
                    <p class="text-sm text-gray-700 font-medium mb-1">{{ $item->nama }}</p>
                    <p class="text-sm text-gray-600 mb-1"> {{ $item->nomor_hp }}</p>
                    <p class="text-sm text-gray-600 mb-1"> {{ $item->email }}</p>
                    <p class="text-sm text-gray-600"> {{ $item->alamat }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</div>

@endsection