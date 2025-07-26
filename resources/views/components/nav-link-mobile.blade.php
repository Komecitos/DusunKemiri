@props(['url', 'label'])

@php
$isActive = request()->is(ltrim($url, '/'));
@endphp

<a href="{{ url($url) }}"
    class="block px-4 py-2 rounded-md transition duration-150 {{ $isActive ? 'bg-orange-100 text-sogan font-semibold' : 'text-sogan hover:bg-orange-100' }}">
    {{ $label }}
</a>