@props(['route', 'label'])

@php
// Jika route adalah admin.dashboard, hanya aktif di halaman persis dashboard
$isDashboard = $route === 'admin.dashboard';
$isActive = $isDashboard
? request()->routeIs($route)
: request()->routeIs(Str::before($route, '.index') . '*');
@endphp

<a href="{{ route($route) }}"
    class="block px-3 py-2 rounded-md transition
        {{ $isActive 
            ? 'bg-sogan text-white font-semibold'
            : 'hover:bg-orange-200 hover:text-orange-900 text-gray-700' }}">
    {{ $label }}
</a>