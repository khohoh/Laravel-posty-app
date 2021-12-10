@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white mt-14 p-6 rounded-lg">
            @auth
                <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <input type="hidden" name="id" value="{{ $post->id }}">

                        <label for="title" class="sr-only">Title</label>
                        <input type="text" name="title" id="title" placeholder="Title" value="{{ $post->title }}"
                               class="bg-gray-100 border-2 w-full rounded-md p-2 @error('title') border-red-500 @enderror">
                    
                        @error('title')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" 
                                placeholder="Post Something!">{{ $post->body }}</textarea>
                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <input type="file" name="image">
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                    </div>
                </form>
            @endauth
        </div>
    </div>
@endsection