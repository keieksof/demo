@php use App\Models\Post; @endphp
<x-app-layout>
    @vite('resources/js/app.js')
    <script src="{{asset('build/assets/js/create-posts.js')}}"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>


    <div class="container mt-5 px-0 lg:px-0">
        <div class="lg:flex lg:justify-center">
            <div class="lg:w-1/2">
                <div class="editor mx-auto w-full bg-gray-100 border border-gray-300 p-4 shadow-lg">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        @if ($errors->any())
                            <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-white-500 list-none">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="font-bold text-gray-800 block">Title:</label>
                            <input class="title bg-gray-100 border border-gray-300 p-2 outline-none w-full" id="title"
                                   name="title" spellcheck="false" placeholder="Title" type="text" required>
                        </div>

                        <!-- Body -->
                        <div class="mb-4">
                            <label for="body" class="block text-sm font-medium text-gray-600">Body:</label>
                            <input id="x" type="hidden" name="body" required>
                            <trix-editor input="x" class="trix-content"></trix-editor>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category_id" class="font-bold text-gray-800 block">Category:</label>
                            <select name="category_id"
                                    class="form-select w-full bg-gray-200 border border-gray-300 p-2 outline-none"
                                    required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @can('create-categories')
                            <div class="container pt-2 min-w-full flex flex-col items-center">
                                <a href="{{ route('categories.create') }}"
                                   class="btn bg-green-700 hover:bg-green-800 text-white focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">New
                                    Category</a>
                            </div>
                        @endcan

                        <!-- Tags -->
                        <div class="mb-4">
                            <label for="tags" class="block text-sm font-medium text-gray-600">Tags:</label>
                            <select name="tags[]" id="tags" class="border border-gray-300 p-2 w-full" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Photo -->
                        <div class="mb-4">
                            <label for="foto" class="font-bold text-gray-800 block">Photo:</label>
                            <input type="file" name="foto">
                            <img id="photo-preview" class="mt-2" style="max-width: 10%;">
                        </div>

                        <!-- Thumbnail -->
                        <div class="mb-4">
                            <label for="thumbnail" class="font-bold text-gray-800 block">Thumbnail:</label>
                            <input type="file" name="thumbnail">
                            <img id="thumbnail-preview" class="mt-2" style="max-width: 10%;">
                        </div>

                        <!-- Scheduled Date and Time -->
                        <div class="mb-4">
                            <label for="scheduled_at">Scheduled Date and Time:</label>
                            <input readonly type="datetime-local" name="scheduled_at">
                        </div>

                        <div class="buttons flex flex-col md:flex-row mt-4 md:mt-0 justify-end items-center">
                            <button type="submit"
                                    class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-indigo-500 md:mr-2">
                                Post
                            </button>
                            <a id="back-button"
                               class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500
                            md:mt-0 ">Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
