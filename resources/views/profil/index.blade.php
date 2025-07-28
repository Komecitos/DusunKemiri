@extends('layouts.app')

@section('content')
<div class="text-sogan font-roboto bg-[#F9F9F9]">

    {{-- Header --}}
    <div class="pt-10 px-4 sm:px-20 mb-10">
        <h1 class="text-3xl sm:text-4xl font-bold mb-2">Profil <span class="text-orange-700 font-serif tracking-widest">Dusun Kemiri</span></h1>
        <div class="h-1 w-20 bg-kunyit rounded"></div>
    </div>

    {{-- Sejarah --}}
    <section class="px-4 sm:px-20 mb-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
        <div class="overflow-hidden rounded-2xl shadow-lg border border-gray-200">
            <img src="{{ asset('images/profil/IMG_3425-min.jpg') }}" alt="Sejarah Dusun" class="w-full h-80 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div>
            <h2 class="text-3xl font-semibold text-sogan mb-4">Sejarah Dusun Kemiri</h2>
            <p class="text-gray-700 leading-relaxed text-justify">{{ $profil->sejarah }}</p>
        </div>
    </section>

    {{-- Visi Misi --}}
    <section class="px-4 sm:px-20 mb-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
        <div>
            <h2 class="text-3xl font-semibold text-sogan mb-4">Visi</h2>
            <p class="text-gray-700 mb-6">{{ $profil->visi }}</p>
            <h2 class="text-3xl font-semibold text-sogan mb-4">Misi</h2>
            <p class="text-gray-700 leading-relaxed">{!! nl2br(e($profil->misi)) !!}</p>
        </div>
        <div class="overflow-hidden rounded-2xl shadow-lg border border-gray-200">
            <img src="{{ asset('images/profil/IMG_3422-min.jpg') }}" alt="Visi Misi" class="w-full h-80 object-cover hover:scale-105 transition-transform duration-300">
        </div>
    </section>

    {{-- Sosial Budaya & Potensi --}}
    <section class="px-4 sm:px-20 mb-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
        <div class="overflow-hidden rounded-2xl shadow-lg border border-gray-200">
            <img src="{{ asset('images/profil/IMG_1450-min.jpg') }}" alt="Potensi Dusun" class="w-full h-80 object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <div>
            <h2 class="text-3xl font-semibold text-sogan mb-4">Kondisi Sosial Budaya</h2>
            <p class="text-gray-700 mb-4">{{ $profil->kondisi_sosial_budaya }}</p>
            <h2 class="text-3xl font-semibold text-sogan mb-4">Potensi Dusun</h2>
            <p class="text-gray-700">{{ $profil->potensi_dusun }}</p>
        </div>
    </section>

    {{-- Letak Geografis --}}
    <section class="px-4 sm:px-20 mb-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
        <div>
            <h2 class="text-3xl font-semibold text-sogan mb-4">Letak Geografis</h2>
            <p class="text-gray-700 mb-4">{{ $profil->letak_geografis }}</p>

            <h3 class="text-2xl font-semibold text-sogan mb-2">Batas Wilayah</h3>
            <div class="grid grid-cols-2 gap-4 text-gray-700 ml-4">
                <p><strong>Utara:</strong> Berbatas dengan ...</p>
                <p><strong>Timur:</strong> Berbatas dengan ...</p>
                <p><strong>Selatan:</strong> Berbatas dengan ...</p>
                <p><strong>Barat:</strong> Berbatas dengan ...</p>
            </div>

            <div class="mt-6 text-gray-800">
                <p><strong>Luas Dusun:</strong> 0000 m²</p>
                <p><strong>Jumlah Penduduk:</strong> 0000 jiwa</p>
            </div>
        </div>
        <div class="overflow-hidden rounded-2xl shadow-lg border border-gray-200">
            <img src="{{ asset('images/profil/IMG_3405-min.jpg') }}" alt="Geografis" class="w-full h-80 object-cover hover:scale-105 transition-transform duration-300">
        </div>
    </section>

    {{-- Struktur Perangkat Dusun --}}
    <section class="mx-4 sm:mx-10 mb-12 mt-4">
        <h2 class="text-2xl sm:text-3xl font-semibold text-orange-700 mb-10 text-center">Struktur Perangkat Dusun</h2>

        <div class="flex flex-col items-center space-y-12 relative">
            {{-- Kepala Dusun --}}
            <div class="relative z-10">
                <div class="bg-white rounded-2xl shadow-lg border-2 border-kunyit p-6 w-72 sm:w-80 text-center hover:scale-105 transition-transform duration-300">
                    <div class="mb-3 w-28 h-28 mx-auto rounded-full overflow-hidden border-4 border-orange-300 shadow-md">
                        @if($perangkat->firstWhere('jabatan', 'Kepala Dusun')?->foto)
                        <img src="{{ asset('storage/' . $perangkat->firstWhere('jabatan', 'Kepala Dusun')->foto) }}" class="w-full h-full object-cover" alt="Kepala Dusun">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($perangkat->firstWhere('jabatan', 'Kepala Dusun')->nama) }}&background=FA7D09&color=fff" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-sogan mt-3">Kepala Dusun</h3>
                    <p class="text-sm text-gray-700 font-medium">{{ $perangkat->firstWhere('jabatan', 'Kepala Dusun')->nama }}</p>
                </div>

                {{-- Garis ke bawah --}}
                <div class="absolute top-full left-1/2 transform -translate-x-1/2 h-10 w-1 bg-orange-300"></div>
            </div>

            {{-- Perangkat Lain --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($perangkat->filter(fn($p) => $p->jabatan !== 'Kepala Dusun') as $item)
                <div class="bg-white rounded-2xl border-2 border-kunyit shadow-md p-4 w-64 mx-auto text-center hover:shadow-xl hover:scale-105 transition-transform duration-300">
                    <div class="mb-3 w-24 h-24 mx-auto rounded-full overflow-hidden border-4 border-orange-200">
                        @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover" alt="{{ $item->nama }}">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=FA7D09&color=fff" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <h3 class="text-lg font-bold text-sogan mt-1">{{ $item->jabatan }}</h3>
                    <p class="text-sm text-gray-700 font-medium">{{ $item->nama }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Modal Detail Perangkat --}}
        <div x-data="{ open: false, perangkat: {} }" x-cloak>
            <div
                x-show="open"
                class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center px-4"
                @keydown.escape.window="open = false">
                <div class="bg-white rounded-2xl shadow-lg max-w-md w-full p-6 relative border border-kunyit">
                    <button class="absolute top-2 right-2 text-gray-700 hover:text-red-500" @click="open = false">
                        ✕
                    </button>

                    <div class="flex flex-col items-center text-center">
                        <div class="mb-4 w-28 h-28 rounded-full overflow-hidden border-4 border-orange-300">
                            <img :src="perangkat.foto" class="w-full h-full object-cover" alt="">
                        </div>
                        <h3 class="text-xl font-bold text-sogan" x-text="perangkat.jabatan"></h3>
                        <p class="text-gray-800 font-medium" x-text="perangkat.nama"></p>

                        <template x-if="perangkat.telepon">
                            <p class="text-sm mt-2 text-gray-600"><strong>Telepon:</strong> <span x-text="perangkat.telepon"></span></p>
                        </template>

                        <template x-if="perangkat.email">
                            <p class="text-sm text-gray-600"><strong>Email:</strong> <span x-text="perangkat.email"></span></p>
                        </template>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
@endsection