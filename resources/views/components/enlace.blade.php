@props([
    'href'
])

<a href="{{ $href }}" class="inline-flex items-center px-5 py-2.5 bg-blue-500 hover:bg-blue-900 text-white text-sm font-medium rounded-md shadow-sm hover:shadow transition-all duration-200">
    {{ $slot }}
</a>