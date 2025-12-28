<x-layouts.landing title="Browse Events | {{ config('app.name') }}">
    <section class="pt-32 pb-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Header --}}
            <div class="mb-12 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Browse Events
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Discover and join exciting tech events, workshops, and networking opportunities
                </p>
            </div>

            {{-- Filter & Search Bar --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-10">
                <form method="GET" action="{{ route('events.index') }}" class="space-y-4">
                    {{-- Search Input --}}
                    <div class="relative">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search events by title or description..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                        >
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    {{-- Filter Tabs --}}
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('events.index', array_filter(['search' => request('search')])) }}"
                           class="px-6 py-2.5 rounded-xl font-medium transition-all duration-200 {{ !request('type') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            All Events
                        </a>

                        <a href="{{ route('events.index', array_filter(['type' => 'ONLINE', 'search' => request('search')])) }}"
                           class="px-6 py-2.5 rounded-xl font-medium transition-all duration-200 {{ request('type') === 'ONLINE' ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            🌐 Online
                        </a>

                        <a href="{{ route('events.index', array_filter(['type' => 'OFFLINE', 'search' => request('search')])) }}"
                           class="px-6 py-2.5 rounded-xl font-medium transition-all duration-200 {{ request('type') === 'OFFLINE' ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            📍 Offline
                        </a>
                    </div>

                    {{-- Results Count --}}
                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <p class="text-sm text-gray-600">
                            Found <span class="font-semibold text-gray-900">{{ $events->total() }}</span> upcoming events
                        </p>

                        @if(request()->hasAny(['search', 'type']))
                            <a href="{{ route('events.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                                Clear filters
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Events Grid --}}
            @if ($events->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach ($events as $event)
                        <x-event-card :event="$event" />
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="flex justify-center">
                    {{ $events->appends(request()->query())->links() }}
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No events found</h3>
                    <p class="text-gray-600 mb-6">Try adjusting your filters or search terms</p>
                    <a href="{{ route('events.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                        View all events
                    </a>
                </div>
            @endif

        </div>
    </section>
</x-layouts.landing>
