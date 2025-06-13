@props(['route', 'label'])

@php
$isActive = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}"
    class="block px-3 py-2 rounded-md {{ $isActive ? 'bg-green-100 text-green-800 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
    {{ $label }}
</a>