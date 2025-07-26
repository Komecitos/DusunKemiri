@props(['route', 'label'])

@php
$isActive = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}"
    class="block px-3 py-2 rounded-md transition
        {{ $isActive 
            ? 'bg-orange-100 text-orange-700 font-semibold'
            : 'hover:bg-orange-200 hover:text-orange-900 text-gray-700' }}">
    {{ $label }}
</a>