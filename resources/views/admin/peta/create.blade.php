@extends('layouts.admin')

@section('title', 'Tambah Marker')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6 font-roboto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-sogan">Tambah Marker Peta</h2>
        <a href="{{ route('admin.petadusun.index') }}"
            class="bg-gray-200 hover:bg-gray-300 text-sogan px-4 py-2 rounded-xl text-sm transition">
            ← Kembali
        </a>
    </div>

    <form action="{{ route('admin.petadusun.store') }}" method="POST"
        class="bg-white shadow rounded-xl p-6 border border-kunyit space-y-4">
        @csrf

        {{-- Form Fields --}}
        @include('admin.peta.form')

        <div class="flex justify-end">
            <button type="submit"
                class="bg-kunyit hover:bg-[#c69058] text-white px-5 py-2 rounded-xl shadow font-semibold transition">
                Simpan
            </button>
        </div>
    </form>
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