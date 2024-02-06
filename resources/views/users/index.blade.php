<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>
    <br>

    <div class="container mx-auto">
        <div class="w-full overflow-x-auto">
            <div class="border-b border-gray-200 shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500">
                            Name
                        </th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500">
                            Email
                        </th>
                        @can('show-users')
                            <th class="px-6 py-3 text-xs text-gray-500">
                                View
                            </th>
                        @endcan
                        @can('edit-users')
                            <th class="px-6 py-3 text-xs font-medium text-center text-gray-500">
                                Edit
                            </th>
                        @endcan
                        @can('destroy-users')
                            <th class="px-6 py-3 text-xs font-medium text-center text-gray-500">
                                Delete
                            </th>
                        @endcan
                        @can('show-roles')
                            <th class="px-6 py-3 text-xs font-medium text-center text-gray-500">
                                Role
                            </th>
                        @endcan


                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-left text-gray-900">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-left text-gray-900">
                                {{ $user->email }}
                            </td>
                            @can('show-users')
                                <td class="px-6 py-4 text-sm text-center">
                                    <a href="{{ route('users.show', $user->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-green-400 rounded">View</a>
                                </td>
                            @endcan
                            @can('edit-users')
                                <td class="px-6 py-4 text-sm text-center">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                            @endcan
                            @can('destroy-users')
                                <td class="px-6 py-4 text-sm text-center">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            @endcan
                            @can('show-roles')
                                @if($user->roles->count() > 0)
                                    <td class="px-6 py-4 text-sm text-center">
                                        @foreach($user->roles as $role)
                                            {{ $role->name }}
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </td>
                                @else
                                    <td class="px-6 py-4 text-sm text-center">
                                        {{ __('No Role') }}
                                    </td>
                                @endif
                        </tr>
                        @endcan

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @can('create-users')
        <div class="container py-10 px-10 mx-auto min-w-full flex flex-col items-center">
            <a href="{{ route('users.create') }}"
               class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">New
                User</a>
        </div>
    @endcan

    <div class="container mx-auto my-4">
        {{ $users->links() }}
    </div>
</x-app-layout>
