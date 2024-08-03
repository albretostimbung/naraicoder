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
                                {{ __('Edit partner from list.') }}
                            </p>
                        </header>

                        @if ($errors->any())
                            <div class="mb-5" role="alert">
                                <div class="bg-red-500 text-white text-sm font-bold px-4 py-3 rounded-md">
                                    {{ __('Whoops! Something went wrong.') }}
                                </div>

                                <div class="mt-3 px-4 py-3 text-red-700 bg-red-100 rounded-md">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form method="post" action="{{ route('admin.partners.update', $partner) }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <!-- Name Input -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $partner->name)"
                                    required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Logo Input -->
                            <div>
                                <x-input-label for="logo" :value="__('Logo')" />
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                                    class="w-16 object-cover">
                                <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                            </div>

                            <!-- Website Input -->
                            <div>
                                <x-input-label for="website" :value="__('Website')" />
                                <x-text-input id="website" name="website" type="text" class="mt-1 block w-full" :value="old('website', $partner->website)" />
                                <x-input-error class="mt-2" :messages="$errors->get('website')" />
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
