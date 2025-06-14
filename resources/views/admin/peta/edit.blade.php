@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2>Edit Marker</h2>
    <form action="{{ route('admin.petadusun.update', $petadusun->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.peta.form', ['petadusun' => $petadusun])
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection