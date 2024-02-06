<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi bold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tag') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 mb-4">
                {{ session('error') }}
            </div>
        @endif
        <div class="sm:flex sm:justify-center">
            <div class="sm:w-full md:w-1/2 lg:w-1/3">
                <form action="{{ route('tags.update', $tag->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                        <input type="text" class="form-input w-full mt-1 p-2 border border-gray-300 rounded-md"
                               id="name" name="name" value="{{ $tag->name }}" required>
                    </div>
                    <button type="submit" class="btn bg-indigo-500 text-white py-2 px-4 rounded-md">Update Tag
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
