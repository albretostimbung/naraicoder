@props([
    'event',
    'registration',
])

<div class="bg-white rounded-xl shadow hover:shadow-lg transition p-5">

    {{-- Header --}}
    <div class="flex justify-between items-start mb-3">
        <h3 class="font-semibold text-lg leading-tight">
            {{ $event->title }}
        </h3>

        <span class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-700">
            Registered
        </span>
    </div>

    {{-- Date & Time --}}
    <div class="text-sm text-gray-600 mb-3">
        @if($event->start_at)
            📅 {{ $event->start_at->translatedFormat('l, d M Y') }}
            <br>
            🕒 {{ $event->start_at->format('H:i') }} WIB
        @else
            <span class="italic text-gray-400">
                Schedule will be announced
            </span>
        @endif
    </div>

    {{-- Event Type & Attendance --}}
    <div class="flex flex-wrap gap-2 mb-4 text-xs">
        <span class="px-2 py-1 rounded
                @if($event->event_type === 'ONLINE') bg-blue-100 text-blue-700
                @elseif($event->event_type === 'OFFLINE') bg-red-100 text-red-700
                @endif">
                {{ strtoupper($event->event_type) }}
        </span>

        @if($event->event_type === 'HYBRID' && $registration->attendance_mode)
            <span class="px-2 py-1 rounded bg-purple-100 text-purple-700">
                {{ strtoupper($registration->attendance_mode) }}
            </span>
        @endif
    </div>

    {{-- Info message --}}
    <p class="text-sm text-gray-500 mb-4">
        We’ll notify you before the event starts.
    </p>

    {{-- CTA --}}
    <a href="{{ route('events.show', $event->slug) }}"
       class="inline-flex items-center text-blue-600 font-medium hover:gap-2 transition">
        View Details →
    </a>
</div>
