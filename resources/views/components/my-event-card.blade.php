@props(['event', 'registration'])

<div class="event-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group"
     data-event-type="{{ $event->event_type }}"
     data-event-title="{{ $event->name }}">

    {{-- Event Image --}}
    <div class="relative h-48 overflow-hidden">
        @if($event->image)
            <img src="{{ asset('storage/' . $event->image) }}"
                 alt="{{ $event->name }}"
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        @else
            <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                <svg class="w-20 h-20 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        @endif

        {{-- Event Type Badge --}}
        <div class="absolute top-4 left-4">
            <span class="px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg
                {{ $event->event_type === 'ONLINE' ? 'bg-blue-500 text-white' : 'bg-purple-500 text-white' }}">
                {{ $event->event_type === 'ONLINE' ? '🌐 Online' : '📍 Offline' }}
            </span>
        </div>

        {{-- Registration Status Badge --}}
        <div class="absolute top-4 right-4">
            <span class="px-3 py-1.5 bg-green-500 text-white rounded-full text-xs font-semibold shadow-lg">
                ✓ Registered
            </span>
        </div>
    </div>

    {{-- Event Content --}}
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors">
            {{ $event->name }}
        </h3>

        <div class="space-y-3 mb-4">
            {{-- Date & Time --}}
            <div class="flex items-start text-sm text-gray-600">
                <svg class="w-5 h-5 mr-2 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <div>
                    <p class="font-medium">{{ $event->start_at->format('D, M j, Y') }}</p>
                    <p>{{ $event->start_at->format('g:i A') }} - {{ $event->end_at->format('g:i A') }}</p>
                </div>
            </div>

            {{-- Location --}}
            @if ($event->location)
                <div class="flex items-start text-sm text-gray-600">
                    <svg class="w-5 h-5 mr-2 text-purple-500 flex-shrink-0" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <p class="line-clamp-2">{{ $event->location }}</p>
                </div>
            @endif

            {{-- Registration Date --}}
            <div class="flex items-start text-sm text-gray-600">
                <svg class="w-5 h-5 mr-2 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p>Registered {{ $registration->created_at->diffForHumans() }}</p>
            </div>
        </div>

        {{-- Action Button --}}
        <a href="{{ route('events.show', $event->slug) }}"
           class="block w-full py-3 px-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
            View Event Details
        </a>
    </div>
</div>
