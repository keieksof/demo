<!-- resources/views/posts/all.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    @foreach ($posts as $post)
        <div class="rounded-xl border p-5 shadow-md md:w-8/12 lg:w-7/12 xl:w-6/12 2xl:w-5/12 mx-auto mt-5">

            <div class="flex flex-col md:flex-row items-center justify-between border-b pb-3 mb-4">
                <div class="flex items-center space-x-3 mb-2 md:mb-0">
                    <div class="text-lg font-bold text-slate-700">{{ $post->user->name }}</div>
                    <div class="text-sm text-neutral-500">
                        {{ optional($post->created_at)->format('d. m. Y') }}
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">
                        {{ optional($post->category)->name }}
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-6">
                <div class="mb-3 text-xl font-bold">{{ $post->title }}</div>
                <div class="text-sm text-neutral-600 trix-content" style="max-height: 100px; overflow: hidden;">
                    {!! $post->body !!}
                </div>
            </div>

            @if($post->thumbnail)
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post Thumbnail"
                     class="w-16 h-16 object-cover rounded-full">
            @else
                @if($post->photo)
                    <img src="{{ asset('storage/' . $post->photo) }}" alt="Post Thumbnail"
                         class="w-16 h-16 object-cover rounded-full">
                @else
                    No Thumbnail
                @endif
            @endif

            <div class="mt-4 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-2 md:mb-0 md:mr-4">
                    <strong class="mr-2">Tags:</strong>
                    <div class="flex flex-wrap">
                        @forelse($post->tags as $tag)
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    {{ $tag->name }}
                </span>
                        @empty
                            <span>No tags</span>
                        @endforelse
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <a href="{{ route('posts.show', $post->id) }}"
                       class="btn bg-green-400 text-white px-4 py-1 rounded">View</a>

                    @can('edit-posts')
                        <a href="{{ route('posts.edit', $post->id) }}"
                           class="btn bg-blue-400 text-white px-4 py-1 rounded">Edit</a>
                    @endcan
                </div>
            </div>


        </div>
    @endforeach

    <br>
    <div class="mx-auto pb-10 w-4/5">
        {{ $posts->links() }}
    </div>
    <br>
</x-app-layout>
