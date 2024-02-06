<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="container mt-5 px-0 lg:px-0">
        <div class="lg:flex lg:justify-center">
            <div class="lg:w-1/2">
                <div class="editor mx-auto w-full bg-gray-100 border border-gray-300 p-4 shadow-lg">
                    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                            <input type="text" class="title w-full bg-gray-200 border border-gray-300 p-2 outline-none"
                                   id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        </div>

                        <!-- Body -->
                        <div class="mb-4">
                            <label for="body" class="block text-sm font-medium text-gray-600">Body:</label>
                            <input id="x" type="hidden" name="body" value="{{ $post->body }}">
                            <trix-editor input="x" class="trix-content"></trix-editor>
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category_id" class="font-bold text-gray-800 block">Category:</label>
                            <select name="category_id"
                                    class="form-select w-full bg-gray-200 border border-gray-300 p-2 outline-none"
                                    required>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tags -->
                        <div class="mb-4">
                            <label for="tags" class="font-bold text-gray-800 block">Tags:</label>
                            <select name="tags[]" id="tags" class="border border-gray-300 p-2 w-full" multiple>
                                @foreach($tags as $tag)
                                    <option
                                        value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Photo Upload -->
                        <div class="mb-4">
                            <label for="foto" class="font-bold text-gray-800 block">Photo:</label>
                            <input type="file" name="foto" id="photo" class="border border-gray-300 p-2 w-full">

                            <img id="photo-preview" src="{{ asset('storage/' . ($post->photo ?? '')) }}"
                                 alt="Photo Preview">
                        </div>

                        <!-- Thumbnail Upload -->
                        <div class="mb-4">
                            <label for="thumbnail" class="font-bold text-gray-800 block">Thumbnail:</label>
                            <input type="file" name="thumbnail" id="thumbnail"
                                   class="border border-gray-300 p-2 w-full">
                            <img id="thumbnail-preview" src="{{ asset('storage/' . ($post->thumbnail ?? '')) }}"
                                 alt="Thumbnail Preview">
                        </div>

                        <!-- Button -->
                        <div class="buttons flex flex-col md:flex-row mt-4 md:mt-0 justify-end items-center">
                            <button type="submit"
                                    class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 bg-indigo-500 md:mt-0 md:mr-2">
                                Update Post
                            </button>
                            <a id="back-button"
                               class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500
                                    ">Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
