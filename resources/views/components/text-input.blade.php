@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'rounded-xl border border-gray-300 py-2 px-3 transition duration-300 focus:border-blue-300 focus:ring focus:ring-blue-100',
]) !!}>
