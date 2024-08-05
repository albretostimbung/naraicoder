<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Community Profiles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Manage Community Profiles') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Edit community profile information.') }}
                            </p>
                        </header>

                        @if ($errors->any())
                        <div class="mb-5" role="alert">
                            <div class="px-4 py-2 font-bold text-white bg-red-500 rounded-t">
                                Whoops!
                            </div>
                            <div class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-b">
                                <p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </p>
                            </div>
                        </div>
                        @endif

                        <form method="post" action="{{ route('admin.community-profiles.store') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Input -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                                    :value="old('name', $communityProfile->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Logo Input -->
                            <div>
                                <x-input-label for="logo" :value="__('Logo')" />
                                @if($communityProfile->logo)
                                <img src="{{ asset('storage/' . $communityProfile->logo) }}" alt="{{ $communityProfile->name }}"
                                    class="object-cover w-64">
                                @endif
                                <x-text-input id="logo" name="logo" type="file" class="block w-full mt-1" />
                                <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                            </div>

                            <!-- About Input -->
                            <div>
                                <x-input-label for="about" :value="__('About')" />
                                <textarea id="about" name="about"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    rows="15" required>{{ old('about', $communityProfile->about) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('about')" />
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
