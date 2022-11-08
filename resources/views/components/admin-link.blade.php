@props(['active'])

@php
$classes = ($active ?? false)

? 'block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:bg-gray-200 focus:bg-gray-200
hover:text-gray-900
focus:text-gray-900
dark:hover:bg-gray-600
dark:focus:bg-gray-600
dark:bg-gray-600
dark:focus:text-white
dark:hover:text-white
dark:text-gray-200
hover:text-gray-900
focus:text-gray-900
hover:bg-gray-200
focus:bg-gray-200
focus:outline-none
focus:shadow-outline
transition duration-150 ease-in-out'
: 'block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 hover:bg-gray-200 dark:text-white rounded-lg
dark:hover:bg-gray-600 focus:outline-none transition duration-150 ease-in-out';



@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
