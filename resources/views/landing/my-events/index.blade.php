<x-layouts.landing title="My Events | {{ config('app.name') }}">
    <section class="pt-20 pb-8 bg-gradient-to-b from-gray-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            {{-- Header Section --}}
            <div class="mb-8" data-aos="fade-down">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">My Events</h1>
                <p class="text-gray-600">Manage and track all your registered events</p>
            </div>

            @if ($registrations->isEmpty())
                {{-- Empty State --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 py-20 text-center" data-aos="zoom-in">
                    <div class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No Events Yet</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">
                        You haven't registered for any events. Start exploring and join events that interest you!
                    </p>
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Browse Events
                    </a>
                </div>
            @else

                {{-- Search & Stats Bar --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6" data-aos="fade-up">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                        {{-- Search Box --}}
                        <div class="flex-1 max-w-2xl">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    id="searchInput"
                                    placeholder="Search events by title..."
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                />
                            </div>
                        </div>

                        {{-- Stats --}}
                        <div class="flex items-center space-x-6 text-sm">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                <span class="text-gray-600">Total: <span class="font-bold text-gray-900"
                                                                         id="totalCount">{{ $registrations->count() }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Filter Tabs --}}
                <div class="mb-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="border-b border-gray-200">
                        <nav class="flex space-x-8 overflow-x-auto" aria-label="Tabs">
                            <button
                                data-filter="all"
                                class="filter-tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors active"
                            >
                                All Events
                                <span
                                    class="ml-2 py-0.5 px-2.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-900">
                                    {{ $registrations->count() }}
                                </span>
                            </button>

                            <button
                                data-filter="ONLINE"
                                class="filter-tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors"
                            >
                                <span class="inline-flex items-center">
                                    Online
                                    <span
                                        class="ml-2 py-0.5 px-2.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700">
                                        {{ $registrations->where('event.event_type', 'ONLINE')->count() }}
                                    </span>
                                </span>
                            </button>

                            <button
                                data-filter="OFFLINE"
                                class="filter-tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors"
                            >
                                <span class="inline-flex items-center">
                                    Offline
                                    <span
                                        class="ml-2 py-0.5 px-2.5 rounded-full text-xs font-semibold bg-green-50 text-green-700">
                                        {{ $registrations->where('event.event_type', 'OFFLINE')->count() }}
                                    </span>
                                </span>
                            </button>
                        </nav>
                    </div>
                </div>

                {{-- Events Grid --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="eventsContainer">
                    @foreach ($registrations as $index => $registration)
                        @php $event = $registration->event; @endphp

                        <div data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                            <x-my-event-card
                                :event="$registration->event"
                                :registration="$registration"
                            />
                        </div>
                    @endforeach
                </div>

                {{-- No Results Message --}}
                <div id="noResults" class="hidden text-center py-12" data-aos="fade-up">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-medium">You haven't joined any online events yet</p>
                    <p class="text-sm text-gray-400 mt-1">Try adjusting your search or filter</p>
                </div>

            @endif

        </div>
    </section>

    {{-- JavaScript remains the same --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const searchInput = document.getElementById('searchInput');
                const filterTabs = document.querySelectorAll('.filter-tab');
                const eventCards = document.querySelectorAll('.event-card');
                const noResults = document.getElementById('noResults');
                const totalCount = document.getElementById('totalCount');

                let currentFilter = 'all';
                let searchTerm = '';

                // Filter Function
                function filterEvents() {
                    let visibleCount = 0;

                    eventCards.forEach(card => {
                        const eventType = card.dataset.eventType;
                        const eventTitle = card.dataset.eventTitle;

                        const matchesFilter = currentFilter === 'all' || eventType === currentFilter;
                        const matchesSearch = eventTitle.includes(searchTerm.toLowerCase());

                        if (matchesFilter && matchesSearch) {
                            card.style.display = 'block';
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    // Show/hide no results message
                    if (visibleCount === 0) {
                        noResults.classList.remove('hidden');
                    } else {
                        noResults.classList.add('hidden');
                    }

                    // Update count
                    if (totalCount) {
                        totalCount.textContent = visibleCount;
                    }
                }

                // Search Handler
                if (searchInput) {
                    searchInput.addEventListener('input', function (e) {
                        searchTerm = e.target.value;
                        filterEvents();
                    });
                }

                // Tab Filter Handler
                filterTabs.forEach(tab => {
                    tab.addEventListener('click', function () {
                        // Remove active class from all tabs
                        filterTabs.forEach(t => {
                            t.classList.remove('active', 'border-blue-500', 'text-blue-600');
                            t.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                        });

                        // Add active class to clicked tab
                        this.classList.add('active', 'border-blue-500', 'text-blue-600');
                        this.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');

                        // Update filter
                        currentFilter = this.dataset.filter;
                        filterEvents();
                    });
                });

                // Initial active tab styling
                const activeTab = document.querySelector('.filter-tab.active');
                if (activeTab) {
                    activeTab.classList.add('border-blue-500', 'text-blue-600');
                    activeTab.classList.remove('border-transparent', 'text-gray-500');
                }
            });
        </script>
    @endpush

    {{-- Additional Styles remain the same --}}
    @push('styles')
        <style>
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .filter-tab {
                border-color: transparent;
                color: #6b7280;
            }

            .filter-tab:hover {
                color: #374151;
                border-color: #d1d5db;
            }

            .filter-tab.active {
                border-color: #3b82f6;
                color: #3b82f6;
            }
        </style>
    @endpush
</x-layouts.landing>
