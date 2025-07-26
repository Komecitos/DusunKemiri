@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-sogan-600 font-sans mb-6">Login Admin</h2>

        @if (session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" required autofocus
                    class="w-full px-4 py-2 border border-kunyit rounded-md shadow-sm focus:ring-kunyit focus:border-kunyit text-gray-800"
                    value="{{ old('email') }}">
            </div>

            <div class="mb-6 relative">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 border border-kunyit rounded-md shadow-sm focus:ring-kunyit focus:border-kunyit text-gray-800 pr-10">

                {{-- Tombol toggle password --}}
                <button type="button" onclick="togglePassword()" class="absolute right-3 top-9 text-gray-500">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>

            <div class="flex items-center justify-between mb-6 text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-kunyit">
                    <span class="ml-2 text-gray-700">Ingat saya</span>
                </label>
                {{-- <a href="{{ route('password.request') }}" class="text-orange-500 hover:underline">Lupa Password?</a> --}}
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