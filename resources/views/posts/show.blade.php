<!-- resources/views/posts/show.blade.php -->

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="rounded-xl border p-5 shadow-md sm:w-11/12 md:w-10/12 lg:w-9/12 xl:w-8/12 bg-white mx-auto mt-5 mb-8">
        <div class="flex w-full items-center justify-between border-b pb-3">
            <div class="flex items-center space-x-3">
                <div class="text-lg font-bold text-slate-700">{{ $post->user->name }}</div>
                <div class="text-sm text-neutral-500">{{ $post->created_at->format('d. m. Y') }}</div>
            </div>
            <div class="flex items-center space-x-8">
                <div
                    class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">{{ $post->category->name }}</div>
            </div>
        </div>

        <div class="mt-4 mb-6">
            <div class="mb-3 text-xl font-bold">{{ $post->title }}</div>

            <!-- Trix content rendering -->
            <div class="text-sm text-neutral-600 trix-content" style="max-width: 100%; word-wrap: break-word;">
                {!! $post->body !!}
            </div>
        </div>

        {{-- Display User's Photo --}}
        <div class="mt-4">
            <strong>Uploaded Photo:</strong>
            @if($post->photo)
                <img src="{{ asset('storage/' . $post->photo) }}" alt="" class="max-w-2xl">
            @else
                No Photo
            @endif
        </div>

        {{-- Tags --}}
        <div class="mt-4">
            <strong>Tags:</strong>
            @forelse($post->tags as $tag)
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->name }}</span>
            @empty
                <span>No Tags</span>
            @endforelse
        </div>
    </div>

    <div class="container py-10 px-6 mx-auto min-w-full flex flex-col items-center">
        <button id="back-button"
                class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium
        rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            &#8592;
            Back
        </button>
    </div>
</x-app-layout>
