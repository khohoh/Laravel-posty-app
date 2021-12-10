@extends('layouts.app')

@section('content')
    {{-- <div class="container"> --}}
        <div class="flex justify-center">
            <div class="w-8/12 mt-14">
                <div class="bg-white rounded-lg mb-5 p-5">
                    <h1 class="text-2xl font-medium ml-1 mb-2">{{ $user_name }}'s Posts</h1>
                    {{-- <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivedLikes->count() }} likes</p> --}}
                    <div class="inline-block rounded-lg px-3 bg-blue-500 text-white mr-2">
                        Posted {{ $user->count() }} {{ Str::plural('post', $user->count()) }}
                    </div>
                    <div class="inline-block rounded-lg px-3 bg-green-500">
                         Received {{ $user_receivedLikes->count() }} {{ Str::plural('like', $user_receivedLikes->count()) }}
                    </div>
                </div>


                <div class="bg-white p-6 rounded-lg">
                    <div class="my-5">
                        @if ($user->count())
                            <table class="table-fixed w-full mb-5">
                                <thead class="border-b-8">
                                    <tr>
                                        <th class="w-1/6">User Name</th>
                                        <th>Title</th>
                                        <th class="w-1/6">Date</th>
                                        <th class="w-1/6">Likes</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($user as $post)
                                        <tr class="border-b-2">
                                            <td><a href="{{ route('users.posts', $post->user) }}">{{ $post->user->username }}</a></td>
                                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->created_at->format('M-d-Y') }}</a></td>
                                            <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->likes->count() }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $user->links() }}
                        @else
                            There are no posts.
                        @endif 
                    </div> 
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection