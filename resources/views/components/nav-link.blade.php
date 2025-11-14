@props(['active' => false, 'sidebarOpen' => true, 'badge' => null])

@php
$baseClasses = 'flex items-center gap-4 p-3 rounded-lg font-medium text-sm transition-all duration-200';
$activeClasses = 'bg-pink-600/20 text-pink-300';
$inactiveClasses = 'text-gray-400 hover:text-white hover:bg-gray-700/50';

$classes = $baseClasses . ' ' . ($active ? $activeClasses : $inactiveClasses);

// Jika sidebar terlipat, pusatkan ikonnya
if (!$sidebarOpen) {
    $classes .= ' justify-center';
}
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>

    {{-- Slot untuk Ikon (Selalu Tampil) --}}
    @if (isset($icon))
        <div class="flex-shrink-0 w-6 h-6">
            {{ $icon }}
        </div>
    @endif

    {{-- Slot untuk Teks (Hanya Tampil jika Sidebar Terbuka) --}}
    <span class="flex-1 whitespace-nowrap"
          x-show="sidebarOpen"
          x-transition:enter="transition-opacity duration-200"
          x-transition:leave="transition-opacity duration-100"
          >
        {{ $slot }}
    </span>
    @if($badge)
        <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold leading-none text-white bg-pink-600 rounded-full">
            {{ $badge }}
        </span>
    @endif
</a>
