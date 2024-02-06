<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Categories') }}
        </h2>
    </x-slot>
    <br>
    <div class="container mx-auto">
        <div class="w-full overflow-x-auto">
            <div class="min-w-full bg-white shadow-md overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        @can('show-categories')
                            <th class="px-6 py-3 text-xs text-gray-500">
                                View
                            </th>
                        @endcan
                        @can('edit-categories')

                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase tracking-wider">
                                Edit
                            </th>
                        @endcan
                        @can('destroy-categories')
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium text-center text-gray-500 uppercase tracking-wider">
                                Delete
                            </th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($categories as $category)
                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $category->name }}</div>
                            </td>
                            @can('show-categories')
                                <td class="px-6 py-4 text-sm text-center">
                                    <a href="{{ route('categories.show', $category->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-green-400 rounded">View</a>
                                </td>
                            @endcan
                            @can('edit-categories')
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                            @endcan
                            @can('destroy-categories')
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
        <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
            <a href="{{ route('categories.create') }}"
               class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">New
                Category</a>

        </div>
        <div class="container mx-auto my-4">
            {{ $categories->links() }}
        </div>
    </div>


    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#tags').select2();
            });
        </script>
    @endpush
</x-app-layout>
