@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-2xl font-bold mb-4">Profil Dusun Kemiri</h1>

    <section class="mb-6">
        <h2 class="text-xl font-semibold">Sejarah</h2>
        <p>{{ $profil->sejarah }}</p>
    </section>

    <section class="mb-6">
        <h2 class="text-xl font-semibold">Visi</h2>
        <p>{{ $profil->visi }}</p>
    </section>

    <section class="mb-6">
        <h2 class="text-xl font-semibold">Misi</h2>
        <p>{!! nl2br(e($profil->misi)) !!}</p>
    </section>

    <section class="mb-6">
        <h2 class="text-xl font-semibold">Letak Geografis</h2>
        <p>{{ $profil->letak_geografis }}</p>
    </section>

    <section class="mb-6">
        <h2 class="text-xl font-semibold">Kondisi Sosial Budaya</h2>
        <p>{{ $profil->kondisi_sosial_budaya }}</p>
    </section>

    <section class="mb-6">
        <h2 class="text-xl font-semibold">Potensi Dusun</h2>
        <p>{{ $profil->potensi_dusun }}</p>
    </section>

    {{-- 👇 Perangkat Dusun --}}
    <section class="mb-6">
        <h2 class="text-xl font-semibold">Perangkat Dusun</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Jabatan</th>
                        <th class="border p-2">Nama</th>
                        <th class="border p-2">Nomor HP</th>
                        <th class="border p-2">Email</th>
                        <th class="border p-2">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perangkat as $item)
                    <tr>
                        <td class="border p-2">{{ $item->jabatan }}</td>
                        <td class="border p-2">{{ $item->nama }}</td>
                        <td class="border p-2">{{ $item->nomor_hp }}</td>
                        <td class="border p-2">{{ $item->email }}</td>
                        <td class="border p-2">{{ $item->alamat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection