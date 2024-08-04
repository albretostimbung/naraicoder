<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Manage Articles') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Edit article from list.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('admin.articles.update', $article) }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <!-- Name Input -->
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="block w-full mt-1" :value="old('title', $article->title)"
                                    required autofocus autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <!-- Content Input -->
                            <div>
                                <x-input-label for="content" :value="__('Content')" />
                                <textarea id="content" name="content"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    rows="4">{{ old('content', $article->content) }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('content')" />
                            </div>

                            <!-- Image Input -->
                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->name }}"
                                    class="object-cover w-32">
                                <x-text-input id="image" name="image" type="file" class="block w-full mt-1" />
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
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
