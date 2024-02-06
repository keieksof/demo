<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="sm:flex sm:justify-center">
            <div class="sm:w-full md:w-1/2 lg:w-1/3">
                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Role Name</label>
                        <input type="text" class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md"
                               id="name" name="name" value="{{ $role->name }}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600">Permissions</label>
                        @foreach($permissions as $permission)
                            <div class="flex items-center">
                                <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]"
                                       value="{{ $permission->name }}"
                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                <label for="permission_{{ $permission->id }}"
                                       class="ml-2">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn bg-indigo-500 text-white py-2 px-4 rounded-md">Update Role</button>
                    <a href="{{ route('roles.index') }}"
                       class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</a>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
