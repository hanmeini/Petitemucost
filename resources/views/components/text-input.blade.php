@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-full shadow-sm bg-gray-100']) }}>
