@props(['url', 'label'])

<a href="{{ url($url) }}" class="@if(Request::is(trim($url, '/').'*')) bg-orange-200 text-orange-800 @else text-black-700 hover:bg-orange-100 @endif block px-4 py-2 rounded-md transition duration-200">
    {{ $label }}
</a>