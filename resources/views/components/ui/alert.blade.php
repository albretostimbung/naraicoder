@props([
    'type' => 'success',
    'title' => null,
    'message' => null,
    'autohide' => null, // ms, e.g. 4000
])

@php
    $types = [
        'success' => [
            'bg' => 'bg-green-50',
            'border' => 'border-green-200',
            'text' => 'text-green-700',
            'icon' => '✔️',
        ],
        'error' => [
            'bg' => 'bg-red-50',
            'border' => 'border-red-200',
            'text' => 'text-red-700',
            'icon' => '❌',
        ],
        'warning' => [
            'bg' => 'bg-yellow-50',
            'border' => 'border-yellow-200',
            'text' => 'text-yellow-700',
            'icon' => '⚠️',
        ],
        'info' => [
            'bg' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'text' => 'text-blue-700',
            'icon' => 'ℹ️',
        ],
    ];

    $style = $types[$type] ?? $types['info'];
@endphp

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition
    @if($autohide)
        x-init="setTimeout(() => show = false, {{ $autohide }})"
    @endif
    class="relative mb-4 rounded-xl border p-4 {{ $style['bg'] }} {{ $style['border'] }} {{ $style['text'] }}"
>
    <div class="flex items-start gap-3">
        <div class="text-xl">
            {{ $style['icon'] }}
        </div>

        <div class="flex-1">
            @if($title)
                <div class="font-semibold mb-1">
                    {{ $title }}
                </div>
            @endif

            @if($message)
                <div class="text-sm leading-relaxed">
                    {{ $message }}
                </div>
            @endif

            {{ $slot }}
        </div>

        <button
            @click="show = false"
            class="text-lg opacity-60 hover:opacity-100 transition"
            aria-label="Close"
        >
            ✕
        </button>
    </div>
</div>
