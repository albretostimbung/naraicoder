<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Teams') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Manage Teams') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Add new team to list.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('admin.teams.store') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name Input -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                                    required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <!-- Email Input -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="text" class="block w-full mt-1"
                                    required autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <!-- Role Description Input -->
                            <div>
                                <x-input-label for="role_description" :value="__('Role Description')" />
                                <x-text-input id="role_description" name="role_description" type="text" class="block w-full mt-1"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('role_description')" />
                            </div>

                            <!-- Avatar Input -->
                            <div>
                                <x-input-label for="avatar" :value="__('Avatar')" />
                                <x-text-input id="avatar" name="avatar" type="file" class="block w-full mt-1"
                                    required />
                                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
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
