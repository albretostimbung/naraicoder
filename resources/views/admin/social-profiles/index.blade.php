<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Social Profiles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Social Profiles</h3>
                            <a href="{{ route('admin.social-profiles.create') }}"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Add New Social Profile
                            </a>
                        </div>
                        <div class="mx-auto mt-6">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Social Profile
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            URL
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($socialProfiles as $social)
                                        <tr>
                                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                <div class="flex items-center gap-4">
                                                    <img src="{{ asset('storage/' . $social->icon) }}"
                                                        alt="{{ $social->name }}" class="object-cover w-16">
                                                    <div>
                                                        <div class="text-xl">{{ $social->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-semibold text-blue-800 whitespace-nowrap">
                                                <a href="{{ $social->url }}" target="_blank">{{ $social->url }}</a>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.social-profiles.edit', $social) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">
                                                    Edit
                                                </a>
                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.social-profiles.destroy', $social) }}"
                                                    method="POST" class="inline ml-4">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
