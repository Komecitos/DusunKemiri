@props(['url', 'label'])

@php
$active = request()->is(ltrim($url, '/'));
@endphp

<a href="{{ $url }}"
    class="px-3 py-2 rounded-md transition duration-150 ease-in-out
          {{ $active ? 'text-kunyit font-semibold' : 'text-gray-700 hover:text-kunyit' }}">
    {{ $label }}
</a>