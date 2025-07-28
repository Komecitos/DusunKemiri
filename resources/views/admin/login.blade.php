@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex items-center justify-center bg-cover bg-center"
    style="background-image: url('{{ asset('images/profil/IMG_3405-min.JPG') }}')">
    <div class="w-80 bg-white bg-opacity-100 p-6 rounded-xl shadow-lg border border-gray-200">
        <h2 class="text-xl font-bold text-center text-sogan-600 font-sans mb-5">Login Admin</h2>

        @if (session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" target="_blank">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-sogan mb-1">Email</label>
                <input type="email" name="email" id="email" required autofocus
                    class="w-full px-3 py-2 border border-kunyit rounded-md shadow-sm focus:ring-kunyit focus:border-kunyit text-gray-800 outline-none"
                    value="{{ old('email') }}">
            </div>

            <div class="mb-5 relative">
                <label for="password" class="block text-sm font-medium text-sogan mb-1">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-2 border border-kunyit rounded-md shadow-sm focus:ring-kunyit focus:border-kunyit text-gray-800 pr-10 outline-none">
                <button type="button" onclick="togglePassword()" class="absolute right-3 top-8 text-sogan">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <div class="flex items-center justify-between mb-5 text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-kunyit">
                    <span class="ml-2 text-gray-700">Ingat saya</span>
                </label>
            </div>

            <button type="submit"
                class="w-full bg-kunyit hover:bg-yellow-500 text-white font-semibold py-2 rounded-md shadow-md">
                Masuk
            </button>
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a9.979 9.979 0 012.338-4.042M3 3l18 18" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.878 9.879A3 3 0 0112 15a2.99 2.99 0 002.121-.879" />`;
        } else {
            input.type = 'password';
            icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
        }
    }
</script>
@endsection