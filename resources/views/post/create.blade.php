<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Post') }}
            </h2>
            <button class="bg-green-600 hover:bg-green-500 text-white text-sl rounded px-4 py-2">
                <a href="">
                    新規投稿
                </a>
            </button>
        </div>
    </x-slot>

    {{-- 投稿部品 --}}
    <div class="pt-14 w-3/5 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form method="POST" action="{{ route('post.store') }}" class="p-6">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
                    <input type="text" name="title" id="title" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-900">投稿文</label>
                    <textarea name="content" id="content" rows="8" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        投稿する
                    </button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
