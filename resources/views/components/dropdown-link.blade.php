@props(['color' => 'gray'])
<a {{ $attributes->merge(['class' => "cursor-pointer block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-$color-200
    focus:outline-none focus:bg-$color-100 transition"]) }}>{{ $slot }}</a>