<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Roles') }}
        </h2>
    </x-slot>
    <br>

    <div class="container mx-auto">
        <div class="w-full overflow-x-auto">
            @if ($errors->any())
                <div class="w-4/8 m-auto text-center">
                    @foreach($errors->all() as $error)
                        <li class="text-red-500 list-none">
                            {{$error}}
                        </li>
                    @endforeach
                </div>
            @endif
            <div class="border-b border-gray-200 shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500">
                            Name
                        </th>
                        @can('edit-roles')
                            <th class="px-6 py-3 text-xs font-medium text-center text-gray-500">
                                Edit
                            </th>
                        @endcan
                        @can('destroy-roles')
                            <th class="px-6 py-3 text-xs font-medium text-center text-gray-500">
                                Delete
                            </th>
                        @endcan


                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($roles as $role)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-left text-gray-900">
                                {{ $role->name }}
                            </td>
                            @can('edit-roles')
                                <td class="px-6 py-4 text-sm text-center">
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                            @endcan
                            @can('destroy-roles')
                                <td class="px-6 py-4 text-sm text-center">
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
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
    </div>
    @can('create-roles')
        <div class="container py-10 px-10 mx-auto min-w-full flex flex-col items-center">
            <a href="{{ route('roles.create') }}"
               class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">New
                Role</a>
        </div>
    @endcan

</x-app-layout>
