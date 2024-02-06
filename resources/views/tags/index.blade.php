<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Tags') }}
        </h2>
    </x-slot>
    <br>
    <div class="container mx-auto">
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 mb-4">
                {{ session('error') }}
            </div>
        @endif
        <div class="lg:justify-end overflow-x-auto">
            <div class="min-w-full bg-white shadow-md overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        @can('show-tags')
                            <th class="px-6 py-3 text-xs text-gray-500">
                                View
                            </th>
                        @endcan
                        @can('edit-tags')
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase tracking-wider">
                                Edit
                            </th>
                        @endcan
                        @can('destroy-tags')
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase tracking-wider">
                                Delete
                            </th>
                        @endcan


                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tags as $tag)
                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $tag->name }}</div>
                            </td>
                            @can('show-tags')
                                <td class="px-6 py-4 text-sm text-center">
                                    <a href="{{ route('tags.show', $tag->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-green-400 rounded">View</a>
                                </td>
                            @endcan
                            @can('edit-tags')
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <a href="{{ route('tags.edit', $tag->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                            @endcan
                            @can('destroy-tags')
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            @endcan


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        @can('create-tags')
            <form action="{{ route('tags.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                    <input type="text" class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md"
                           id="name" name="name" required>
                </div>
                <button type="submit" class="btn bg-indigo-500 text-white py-2 px-4 rounded-md">Create a
                    Tag
                </button>
            </form>
        @endcan

        <div class="container mx-auto my-4">
            {{ $tags->links() }}
        </div>
</x-app-layout>
