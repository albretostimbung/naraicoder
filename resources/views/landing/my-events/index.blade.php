<x-layouts.landing title="My Events | {{ config('app.name') }}">
    <section class="pt-32 pb-16 bg-gradient-to-b from-gray-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            {{-- Header Section --}}
            <div class="mb-10" data-aos="fade-down">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold mb-2 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            My Events
                        </h1>
                        <p class="text-lg text-gray-600">Track and manage all your registered events</p>
                    </div>

                    @if (!$registrations->isEmpty())
                        <a href="{{ route('events.index') }}"
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Browse More Events
                        </a>
                    @endif
                </div>
            </div>

            @if ($registrations->isEmpty())
                {{-- Empty State --}}
                <div class="bg-white rounded-2xl shadow-lg p-16 text-center" data-aos="zoom-in">
                    <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">No Events Yet</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto text-lg">
                        Start your journey by registering for exciting events!
                    </p>
                    <a href="{{ route('events.index') }}"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Explore Events
                    </a>
                </div>
            @else

                {{-- Search & Filter Bar --}}
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8" data-aos="fade-up">
                    <div class="space-y-4">
                        {{-- Search Box --}}
                        <div class="relative">
                            <input
                                type="text"
                                id="searchInput"
                                placeholder="Search your registered events..."
                                class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-base"
                            />
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>

                        {{-- Filter Tabs --}}
                        <div class="flex flex-wrap gap-3">
                            <button data-filter="all" class="filter-tab bg-blue-600 text-white shadow-lg shadow-blue-600/30 px-6 py-2.5 rounded-xl font-medium transition-all duration-200">
                                All Events
                                <span class="ml-2 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/30 text-white">{{ $registrations->count() }}</span>
                            </button>

                            <button data-filter="ONLINE" class="filter-tab bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl font-medium transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200 border border-transparent">
                                🌐 Online
                                <span class="ml-2 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/20">{{ $registrations->where('event.event_type', 'ONLINE')->count() }}</span>
                            </button>

                            <button data-filter="OFFLINE" class="filter-tab bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl font-medium transition-all duration-200 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-200 border border-transparent">
                                📍 Offline
                                <span class="ml-2 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/20">{{ $registrations->where('event.event_type', 'OFFLINE')->count() }}</span>
                            </button>
                        </div>

                        {{-- Stats Bar --}}
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-600">Showing</span>
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-semibold" id="totalCount">{{ $registrations->count() }}</span>
                                <span class="text-sm text-gray-600">events</span>
                            </div>
                            <button id="clearFilters" class="text-sm text-blue-600 hover:text-blue-700 font-medium hidden">
                                Clear search
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Events Grid --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8" id="eventsContainer">
                    @foreach ($registrations as $index => $registration)
                        <div data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                            <x-my-event-card :event="$registration->event" :registration="$registration" />
                        </div>
                    @endforeach
                </div>

                {{-- No Results State --}}
                <div id="noResults" class="hidden bg-white rounded-2xl shadow-lg p-16 text-center" data-aos="fade-up">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No events found</h3>
                    <p class="text-gray-600 mb-6">Try adjusting your search or filter</p>
                    <button id="resetSearch" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                        Clear filters
                    </button>
                </div>

            @endif

        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const searchInput = document.getElementById('searchInput');
                const filterTabs = document.querySelectorAll('.filter-tab');
                const eventCards = document.querySelectorAll('.event-card');
                const noResults = document.getElementById('noResults');
                const totalCount = document.getElementById('totalCount');
                const clearFilters = document.getElementById('clearFilters');
                const resetSearch = document.getElementById('resetSearch');

                let currentFilter = 'all';
                let searchTerm = '';

                function filterEvents() {
                    let visibleCount = 0;

                    eventCards.forEach(card => {
                        const eventType = card.dataset.eventType;
                        const eventTitle = card.dataset.eventTitle.toLowerCase();

                        const matchesFilter = currentFilter === 'all' || eventType === currentFilter;
                        const matchesSearch = eventTitle.includes(searchTerm.toLowerCase());

                        if (matchesFilter && matchesSearch) {
                            card.closest('[data-aos]').style.display = 'block';
                            visibleCount++;
                        } else {
                            card.closest('[data-aos]').style.display = 'none';
                        }
                    });

                    noResults.classList.toggle('hidden', visibleCount > 0);
                    totalCount.textContent = visibleCount;
                    clearFilters.classList.toggle('hidden', searchTerm === '');
                }

                searchInput?.addEventListener('input', function (e) {
                    searchTerm = e.target.value;
                    filterEvents();
                });

                filterTabs.forEach(tab => {
                    tab.addEventListener('click', function () {
                        filterTabs.forEach(t => {
                            t.classList.remove('active', 'bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-600/30', 'border-blue-600');
                            t.classList.add('bg-gray-100', 'text-gray-600', 'border-transparent');
                        });

                        this.classList.add('active', 'bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-600/30', 'border-blue-600');
                        this.classList.remove('bg-gray-100', 'text-gray-600', 'border-transparent');

                        currentFilter = this.dataset.filter;
                        filterEvents();
                    });
                });

                clearFilters?.addEventListener('click', () => {
                    searchInput.value = '';
                    searchTerm = '';
                    filterEvents();
                });

                resetSearch?.addEventListener('click', () => {
                    searchInput.value = '';
                    searchTerm = '';
                    currentFilter = 'all';

                    filterTabs.forEach(t => {
                        t.classList.remove('active', 'bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-600/30');
                        t.classList.add('bg-gray-100', 'text-gray-600');
                    });
                    filterTabs[0].classList.add('active', 'bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-600/30');
                    filterTabs[0].classList.remove('bg-gray-100', 'text-gray-600');

                    filterEvents();
                });
            });
        </script>
    @endpush

    @push('styles')
        <style>
            .filter-tab {
                @apply bg-gray-100 text-gray-600 border border-transparent transition-all duration-200;
            }

            .filter-tab:hover:not(.active) {
                @apply bg-blue-50 text-blue-600 border-blue-200 transform scale-105;
            }

            .filter-tab.active {
                @apply bg-blue-600 text-white shadow-lg shadow-blue-600/30 border-blue-600;
            }

            .filter-tab span {
                @apply bg-white/20 transition-colors duration-200;
            }

            .filter-tab:hover:not(.active) span {
                @apply bg-blue-100 text-blue-700;
            }

            .filter-tab.active span {
                @apply bg-white/30 text-white;
            }
        </style>
    @endpush
</x-layouts.landing>
