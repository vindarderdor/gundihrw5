@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-3 mt-2 text-white bg-indigo-600 rounded-md transition-colors duration-200 transform shadow-md'
            : 'flex items-center px-4 py-3 mt-2 text-gray-300 transition-colors duration-200 transform rounded-md hover:bg-slate-800 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
