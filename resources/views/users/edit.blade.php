<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="sm:flex sm:justify-center">
            <div class="sm:w-full md:w-1/2 lg:w-1/3">
                <form action="{{ route('users.update', $user->id) }}" method="post">

                    <form action="{{ route('users.store') }}" method="post">

                        @csrf
                        @method('PUT')

                        {{-- Display errors --}}
                        @if ($errors->any())
                            <div class="bg-red-500 text-white p-4 mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-white-500 list-none">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                   class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}"
                                   class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                            <input type="password" id="password" name="password" placeholder="*********" required
                                   class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm
                                Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   placeholder="*********" required
                                   class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md">
                        </div>

                        @isset($roles)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600">Roles</label>
                                @foreach($roles as $role)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="role_{{ $role->id }}" name="roles[]"
                                               value="{{ $role->name }}" {{ in_array($role->name, $user->roles->pluck('name')->toArray()) ? 'checked' : '' }}>
                                        <label for="role_{{ $role->id }}" class="ml-2">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endisset

                        <button type="submit" class="btn bg-indigo-500 text-white py-2 px-4 rounded-md">Update User
                        </button>
                        <button id="back-button"
                                class="btn bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Back
                        </button>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>

