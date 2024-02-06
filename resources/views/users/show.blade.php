<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Detail') }}
        </h2>
    </x-slot>

    <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white mx-auto mt-5 mb-5">
        <div class="flex w-full items-center justify-between border-b pb-3">
            <div class="flex items-center space-x-3">
                <div class="text-lg font-bold text-slate-700">{{ $user->name }}</div>
                <div class="text-sm text-neutral-500">{{ $user->created_at->format('d. m. Y') }}</div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="text-lg font-bold text-slate-700">{{ $user->email }}</div>
            </div>
        </div>
    </div>

    <div class="container py-10 px-10 mx-0 min-w-full flex flex-col items-center">
        <button id="back-button"
                class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            &#8592;
            Back
        </button>
    </div>

</x-app-layout>
