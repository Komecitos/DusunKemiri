<!-- @extends('') -->

@section('content')
<h2 class="text-center mb-4">Login Admin</h2>

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Masuk</button>
</form>
@endsection