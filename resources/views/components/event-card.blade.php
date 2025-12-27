@props(['event'])

<a href="{{ route('events.show', $event->slug) }}" class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover"
   data-aos="zoom-in">
    <div class="relative overflow-hidden h-56">
        <img
            src="{{ cloudinary_url($event->featured_image, [ 'width' => 1200, 'height' => 630, 'crop' => 'fill', 'quality' => 'auto', 'fetch_format' => 'auto' ]) }}"
            alt="{{ $event->title }}"
            class="h-full w-full object-cover transition-transform duration-500 hover:scale-110">
        <div
            class="absolute top-4 right-4 {{ $event->event_type == 'OFFLINE' ? 'bg-red-600' : 'bg-blue-600' }} text-white px-3 py-1 rounded-full text-xs font-semibold">
            {{ $event->event_type }}
        </div>
    </div>

    <div class="p-6">
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
            <span>📅 {{ $event->start_at->format('d M Y') }}</span>
            <span>•</span>
            <span>⏰ {{ $event->start_at->format('H:i') }} WIB</span>
        </div>
        <h3 class="font-bold text-xl mb-2">
            {{ $event->title }}
        </h3>
        <p class="text-sm text-gray-600 mb-4">
            {{ Str::limit($event->description, 100, '...') }}
        </p>
        <span
            class="inline-flex items-center text-blue-600 font-semibold hover:gap-3 gap-2 transition-all">
            Lihat Detail
            <span>→</span>
        </span>
    </div>
</>
