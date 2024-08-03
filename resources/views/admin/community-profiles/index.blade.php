<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Community Profiles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
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
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Whoops!
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
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
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name', $communityProfile->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Logo Input -->
                            <div>
                                <x-input-label for="logo" :value="__('Logo')" />
                                @if($communityProfile->logo)
                                <img src="{{ asset('storage/' . $communityProfile->logo) }}" alt="{{ $communityProfile->name }}"
                                    class="w-64 object-cover">
                                @endif
                                <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                            </div>

                            <!-- About Input -->
                            <div>
                                <x-input-label for="about" :value="__('About')" />
                                <textarea id="about" name="about"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    rows="15" required>{{ old('about', $communityProfile->about) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('about')" />
                            </div>

                            <div>
                                <x-input-label for="social_media[website]" :value="__('Website')" />
                                <x-text-input id="name" name="social_media[website]" type="text" class="mt-1 block w-full" value="{{ json_decode($communityProfile->social_media)->website }}" required />
                            </div>

                            <div>
                                <x-input-label for="social_media[instagram]" :value="__('Instagram')" />
                                <x-text-input id="name" name="social_media[instagram]" type="text" class="mt-1 block w-full" value="{{ json_decode($communityProfile->social_media)->instagram }}" required />
                            </div>

                            <div>
                                <x-input-label for="social_media[telegram]" :value="__('Telegram')" />
                                <x-text-input id="name" name="social_media[telegram]" type="text" class="mt-1 block w-full" value="{{ json_decode($communityProfile->social_media)->telegram }}" required />
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
