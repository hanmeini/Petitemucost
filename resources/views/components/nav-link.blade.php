@props(['active' => false, 'sidebarOpen' => true, 'badge' => null])

@php
$baseClasses = 'flex items-center gap-4 p-3 rounded-xl font-medium text-sm transition-all duration-200 mb-1';
// UBAH WARNA DI SINI:
$activeClasses = 'bg-pink-50 text-pink-600 shadow-sm border border-pink-100';
$inactiveClasses = 'text-gray-500 hover:text-gray-900 hover:bg-gray-50';

$classes = $baseClasses . ' ' . ($active ? $activeClasses : $inactiveClasses);

if (!$sidebarOpen) {
    $classes .= ' justify-center';
}
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{-- Ikon --}}
    <div class="flex-shrink-0 w-6 h-6 {{ $active ? 'text-pink-600' : 'text-gray-400 group-hover:text-gray-600' }}">
        {{ $icon }}
    </div>

    {{-- Teks --}}
    <span class="flex-1 whitespace-nowrap flex justify-between items-center"
          x-show="sidebarOpen"
          x-transition:enter="transition-opacity duration-200"
          x-transition:leave="transition-opacity duration-100">
        <span>{{ $slot }}</span>

        @if($badge)
            <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold leading-none text-white bg-pink-500 rounded-full shadow-sm">
                {{ $badge }}
            </span>
        @endif
    </span>
</a>
