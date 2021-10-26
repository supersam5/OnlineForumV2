@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class= "w-8/12 bg-white p-6 rounded-lg">
            <form action={{route("posts")}} method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="post_content" class="sr-only"></label>
                    <textarea name="post_content" id="post_content" cols="30" row="4"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('post_content') border-red-500 @enderror"
                    placeholder="Post something!"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        <div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-4 py-2 rounded font-medium"> Post </button>
                </div>
            </form>
            @if ($posts->count())
                @foreach ( $posts as $post )
                    <div class="mb-4">
                        <a href="" class="font-bold">{{$post->user->name}}</a>  <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
                        <p class="mb-2">{{$post->post_content}}</p>
                    </div>
                @endforeach
            @else
              <p> There are no posts</p>
            @endif
            {{$posts->links()}}
        </div>
    </div>
@endsection
