@php use Carbon\Carbon; @endphp
<x-app-layout>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <br>
    <div class="container mx-auto">
        <div class="w-full overflow-x-auto">
            <div class="min-w-full bg-white shadow-md overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500">
                            Title
                        </th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500">
                            Content
                        </th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500">
                            Category
                        </th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500">
                            User
                        </th>
                        <th class="px-6 py-3 text-xs font-medium text-left text-gray-500">
                            Thumbnail
                        </th>
                        @can('show-posts')
                            <th class="px-6 py-3 text-xs text-gray-500">
                                View
                            </th>
                        @endcan
                        @can('edit-posts')
                            <th class="px-6 py-3 text-xs text-gray-500">
                                Edit
                            </th>
                        @endcan
                        @can('destroy-posts')
                            <th class="px-6 py-3 text-xs text-gray-500">
                                Delete
                            </th>
                        @endcan
                        <th class="px-6 py-3 text-xs text-gray-500">
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-left text-gray-900">
                                {{ $post->title }}
                            </td>
                            <td class="px-6 py-4 text-sm text-left text-gray-900">
                                {!! Str::limit($post->body, 50) !!}
                            </td>
                            <td class="px-6 py-4 text-sm text-left text-gray-900">
                                {{ $post->category->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-left text-gray-900">
                                {{ $post->user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-left text-gray-900">
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
                            </td>
                            @can('show-posts')
                                <td class="px-6 py-4 text-sm text-center">
                                    <a href="{{ route('posts.show', $post->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-green-400 rounded">View</a>
                                </td>
                            @endcan
                            @can('edit-posts')
                                <td class="px-6 py-4 text-sm text-center">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                            @endcan
                            @can('destroy-posts')
                                <td class="px-6 py-4 text-sm text-center">
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete
                                        </button>
                                    </form>
                                </td>
                            @endcan
                            <td class="px-6 py-4 text-sm text-center">
                                @if (!$post->display)
                                    <span class="text-green-500">
                                        Scheduled for {{ Carbon::parse($post->scheduled_at)->format('Y-m-d H:i:s') }}
                                    </span>
                                @else
                                    <span class="text-blue-500">Posted</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @can('create-posts')
        <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
            <a href="{{ route('posts.create') }}"
               class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">New
                Post</a>
        </div>
    @endcan
    <br>
    <div class="mx-auto pb-10 w-4/5">
        {{ $posts->links() }}
    </div>
</x-app-layout>
