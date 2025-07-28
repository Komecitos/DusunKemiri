@extends('layouts.admin')

@section('title', 'Edit Marker')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-6 font-roboto border border-kunyit">
    <h2 class="text-3xl font-bold text-sogan mb-6">Edit marker peta</h2>

    <form action="{{ route('admin.petadusun.update', $petadusun->id) }}" method="POST"
        class="">
        @csrf
        @method('PUT')

        {{-- Form Fields --}}
        @include('admin.peta.form', ['petadusun' => $petadusun])

        <div class="md:col-span-2 flex justify-between  ">
            <a href="{{ route('admin.petadusun.index') }}"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">
                Kembali
            </a>
            <button type="submit"
                class="bg-sogan hover:bg-kunyit hover:text-sogan text-white px-6 py-2 rounded shadow transition">
                Update 
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