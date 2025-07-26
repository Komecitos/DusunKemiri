@extends('layouts.admin')

@section('title', 'Detail Warga')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6 font-roboto">
    <h2 class="text-2xl font-bold text-sogan mb-6">Detail Warga</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-darkText">
        <div><span class="font-semibold text-gray-600">Nama:</span> {{ $warga->nama }}</div>
        <div><span class="font-semibold text-gray-600">NIK:</span> {{ $warga->nik }}</div>
        <div><span class="font-semibold text-gray-600">No. KK:</span> {{ $warga->no_kk }}</div>
        <div><span class="font-semibold text-gray-600">Jenis Kelamin:</span> {{ $warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
        <div><span class="font-semibold text-gray-600">Pekerjaan:</span> {{ $warga->pekerjaan }}</div>
        <div><span class="font-semibold text-gray-600">Status Perkawinan:</span> {{ $warga->status_perkawinan }}</div>
        <div><span class="font-semibold text-gray-600">Agama:</span> {{ $warga->agama }}</div>
        <div><span class="font-semibold text-gray-600">Golongan Darah:</span> {{ $warga->golongan_darah }}</div>
        <div><span class="font-semibold text-gray-600">Kategori Penduduk:</span> {{ $warga->kategori_penduduk }}</div>
        <div><span class="font-semibold text-gray-600">Telepon:</span> {{ $warga->telepon }}</div>
        <div class="md:col-span-2"><span class="font-semibold text-gray-600">Alamat:</span> {{ $warga->alamat }}</div>
    </div>

    <div class="mt-6 flex justify-end">
        <a href="{{ route('admin.warga') }}"
            class="inline-block px-4 py-2 bg-kunyit/10 text-sogan border border-kunyit rounded-lg hover:bg-kunyit/20 text-sm font-medium transition">
            ← Kembali ke Daftar Warga
        </a>
    </div>
</div>

{{-- Roboto Font --}}
@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<style>
    .font-roboto {
        font-family: 'Roboto', sans-serif;
    }
</style>
@endpush
@endsection