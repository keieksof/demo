<x-app-layout>
    {{-- Include Vite assets --}}
    @vite('resources/js/app.js')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Role') }}
        </h2>
    </x-slot>

    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">Create a Role</div>

    <form action="{{ route('roles.store') }}" method="post">
        @csrf

        @if ($errors->any())
            <div class="w-4/8 m-auto text-center">
                @foreach($errors->all() as $error)
                    <li class="text-red-500 list-none">
                        {{ $error }}
                    </li>
                @endforeach
            </div>
        @endif

        <div
            class="editor mx-auto w-full md:w-10/12 lg:w-8/12 xl:w-6/12 2xl:w-4/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input class="name bg-gray-100 border border-gray-300 p-2 outline-none w-full" id="name" name="name"
                       spellcheck="false" placeholder="Name" type="text" required>
            </div>

            {{-- Permissions --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600">Permissions</label>
                @foreach($permissions as $permission)
                    <div class="flex items-center">
                        <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]"
                               value="{{ $permission->name }}">
                        <label for="permission_{{ $permission->id }}"
                               class="ml-2">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
            {{-- Permissions End --}}

            <!-- Your existing buttons and styles here -->
            <div class="buttons flex flex-col md:flex-row mt-4 md:mt-0 justify-end items-center">
                <a href="{{ route('roles.index') }}"
                   class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 md:mt-0 md:mr-2">Cancel</a>
                <button type="submit"
                        class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-indigo-500">
                    Create
                </button>
            </div>
        </div>
    </form>
</x-app-layout>
