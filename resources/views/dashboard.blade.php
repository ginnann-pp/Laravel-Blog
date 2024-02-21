<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <button class="bg-green-600 hover:bg-green-500 text-white text-sl rounded px-4 py-2">
                <a href="{{route('post.create')}}">
                    新規投稿
                </a>
            </button>
        </div>
    </x-slot>

    {{-- 一覧 --}}
    <div class="py-12">
        {{-- 投稿 --}}
        @forelse ($posts as $post)
            <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href="{{ route('post.show_user', ['post' => $post]) }}">
                    <div class="  bg-white  hover:bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h2 class="text-gray-900 text-xl mb-2">{{ $post->title }}</h2>
                            <p class="text-gray-600 text-sm mb-2">投稿ユーザー: {{ $post->user_id }}</p>
                            <p class="text-gray-600 text-sm mb-2">投稿日時: {{ $post->created_at }}</p>
                            <p class="text-gray-900">{{ $post->content }} </p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p>Not post</p>
        @endforelse
    </div>

</x-app-layout>
