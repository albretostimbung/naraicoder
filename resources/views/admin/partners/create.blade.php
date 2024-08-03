<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Partners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Manage Partners') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Add new partner to list.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('admin.partners.store') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Input -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Logo Input -->
                            <div>
                                <x-input-label for="logo" :value="__('Logo')" />
                                <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                            </div>

                            <!-- Website Input -->
                            <div>
                                <x-input-label for="website" :value="__('Website')" />
                                <x-text-input id="website" name="website" type="text" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('website')" />
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
</x-app-layout>
