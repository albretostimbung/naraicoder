<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Social Profiles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Manage Social Profiles') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Edit social profile from list.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('admin.social-profiles.update', $socialProfile) }}"
                            class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <!-- Name Input -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                                    :value="old('name', $socialProfile->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- URL Input -->
                            <div>
                                <x-input-label for="url" :value="__('URL')" />
                                <x-text-input id="url" name="url" type="text" class="block w-full mt-1"
                                    :value="old('url', $socialProfile->url)" />
                                <x-input-error class="mt-2" :messages="$errors->get('url')" />
                            </div>

                            <!-- Icon Input -->
                            <div>
                                <x-input-label for="icon" :value="__('Icon')" />
                                <img src="{{ asset('storage/' . $socialProfile->icon) }}"
                                    alt="{{ $socialProfile->name }}" class="object-cover w-16">
                                <x-text-input id="icon" name="icon" type="file" class="block w-full mt-1" />
                                <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Update') }}</x-primary-button>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
