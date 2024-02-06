<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Example') }}
        </h2>
<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">

            <div class="border-b border-gray-200 shadow">
                <table>
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Title
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Content
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Category
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            User
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Edit
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Delete
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4 text-sm text-gray-500">
                            1
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                Jon doe
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">jhondoe@example.com</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            2021-1-12
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






<div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Post</div>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
<div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" id="title" name="title" required spellcheck="false" placeholder="Title" type="text">
    <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" id="body" name="body" required placeholder="What are you thinking?"></textarea>

        <br>
    <!-- buttons -->
    <div class="buttons flex">
        <a href="{{ route('posts.index') }}" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</a>
        <div class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</div>
    </div>
    </form>
        <div>

        </div>
</div>


        <!-- component -->
        <!-- This is an example component -->
        <div class='flex items-center justify-center min-h-screen'>  <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                <div class="flex w-full items-center justify-between border-b pb-3">
                    <div class="flex items-center space-x-3">
                        <div class="text-lg font-bold text-slate-700">{{ ($post->user)->name }}</div>
                    </div>
                    <div class="flex items-center space-x-8">
                        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">{{ ($post->category)->name }}</button>
                        <div class="text-xs text-neutral-500">2 hours ago</div>
                    </div>
                </div>

                <div class="mt-4 mb-6">
                    <div class="mb-3 text-xl font-bold">{{ $post->title }}</div>
                    <div class="text-sm text-neutral-600"> {{ $post->body }}</div>
                </div>

            </div>
        </div>


</x-app-layout>
