@props([
    'name',
    'class' => 'w-5 h-5',
    'ariaLabel' => null,
])

@php
    $path = resource_path("icons/lucide/{$name}.svg");
@endphp

@if (file_exists($path))
    <span {{ $attributes->merge(['class' => 'inline-flex items-center ' . $class]) }}>
        {!! file_get_contents($path) !!}
    </span>
@else
    {{-- icon not found --}}
@endif
