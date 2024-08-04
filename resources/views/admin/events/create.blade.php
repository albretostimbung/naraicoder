<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Manage Events') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Add new event to list.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('admin.events.store') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Title Input -->
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                                    required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <!-- Email Input -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="block w-full mt-1"
                                    autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <!-- Description Input -->
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    rows="4" required></textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <!-- Speaker Input -->
                            <div>
                                <x-input-label for="speaker" :value="__('Speaker')" />
                                <x-text-input id="speaker" name="speaker" type="text" class="block w-full mt-1"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('speaker')" />
                            </div>

                            <!-- Is Online Input -->
                            <div>
                                <input id="is_online" name="is_online" type="checkbox"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                                <label for="is_online" class="ml-2 text-sm font-medium text-gray-700">Is Online?</label>
                                <x-input-error class="mt-2" :messages="$errors->get('is_online')" />
                            </div>

                            <!-- URL Input -->
                            <div>
                                <x-input-label for="url" :value="__('URL')" />
                                <x-text-input id="url" name="url" type="text" class="block w-full mt-1" />
                                <x-input-error class="mt-2" :messages="$errors->get('url')" />
                            </div>

                            <!-- Location Input -->
                            <div id="location_input">
                                <x-input-label for="location" :value="__('Location')" />
                                <select id="location" name="location"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                    <option value="Zoom">Zoom</option>
                                    <option value="Google Meet">Google Meet</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('location')" />
                            </div>

                            <!-- Image Input -->
                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <x-text-input id="image" name="image[]" type="file" class="block w-full mt-1"
                                    required multiple />
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script>
        const isOnlineCheckbox = document.getElementById('is_online');
        const locationInput = document.getElementById('location_input');

        function toggleLocationInput() {
            if (isOnlineCheckbox.checked) {
                locationInput.innerHTML = `<x-input-label for="location" :value="__('Location')" />
                                    <select id="location" name="location"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                        <option value="Zoom">Zoom</option>
                                        <option value="Google Meet">Google Meet</option>
                                    </select>
                                <x-input-error class="mt-2" :messages="$errors->get('location')" />`;
            } else {
                locationInput.innerHTML = `
                                    <x-input-label for="location" :value="__('Location')" />
                                    <x-text-input id="location" name="location" type="text" class="block w-full mt-1"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('location')" />`;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleLocationInput();
            isOnlineCheckbox.addEventListener('change', toggleLocationInput);
        });
    </script>
</x-app-layout>
