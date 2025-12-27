<x-filament-widgets::widget>
    <x-filament::section>
        <x-filament::card>
            <h2 class="text-lg font-bold mb-4">
                Upcoming Events
            </h2>

            @forelse($events as $event)
                <div class="flex justify-between items-center py-2 border-b last:border-0">
                    <div>
                        <p class="font-medium">{{ $event->title }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $event->start_at->format('d M Y • H:i') }}
                        </p>
                    </div>

                    <a href="{{ route('filament.admin.resources.events.edit', $event) }}"
                       class="text-sm text-primary-600">
                        Edit
                    </a>
                </div>
            @empty
                <p class="text-sm text-gray-500">
                    No upcoming events.
                </p>
            @endforelse
        </x-filament::card>

    </x-filament::section>
</x-filament-widgets::widget>
