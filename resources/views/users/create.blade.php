<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New User') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="sm:flex sm:justify-center">
            <div class="sm:w-full md:w-1/2 lg:w-1/3">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Create a User</h3>


                <form action="{{ route('users.store') }}" method="post">


                    @csrf

                    {{-- Display errors --}}
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-white-500 list-none">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                        <input type="text" class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md"
                               id="name" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md"
                               id="email" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                        <input type="password" class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md"
                               id="password" name="password" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600">Roles</label>
                        @foreach($roles as $role)
                            <div class="flex items-center">
                                <input type="checkbox" id="role_{{ $role->id }}" name="roles[]"
                                       value="{{ $role->name }}">
                                <label for="role_{{ $role->id }}" class="ml-2">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn bg-indigo-500 text-white py-2 px-4 rounded-md">Create a User
                    </button>
                    <button id="back-button"
                            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Back
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
