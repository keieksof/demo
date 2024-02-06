<x-app-layout>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Notifications') }}
        </h2>
    </x-slot>
    <br>


    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-semibold mb-4">Notifications</h1>

        <!-- Clear All Notifications Button -->
        <form action="{{ route('notifications.clear') }}" method="POST" class="mb-4">
            @csrf
            @method('POST')
            <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:border-blue-300">
                Clear All Notifications
            </button>
        </form>


        @forelse($notifications as $notification)

            <div class="bg-white shadow-md rounded p-4 mb-4">

                @if(isset($notification->data['message']))
                    <p class="text-lg font-semibold mb-2">{{ $notification->data['message'] }}</p>
                    @if(isset($notification->data['post_id']))
                        <a href="{{ route('post.show', $notification->data['post_id']) }}"
                           class="inline-block px-4 py-2 text-sm font-semibold text-white bg-green-500 rounded">View
                            Post</a>
                    @endif
                @else
                    <p class="text-gray-600">No specific message for this notification</p>
                @endif
                <p class="text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</p>

            </div>

        @empty

            <p class="text-gray-500">No notifications.</p>

        @endforelse

    </div>

</x-app-layout>
