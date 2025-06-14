@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2>Tambah Marker Peta</h2>
    <form action="{{ route('admin.petadusun.store') }}" method="POST">
        @csrf
        @include('admin.peta.form')
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection