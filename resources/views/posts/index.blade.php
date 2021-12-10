@extends('layouts.app')

@section('content')
    {{-- <div class="flex justify-center">
        @if (Session::has('success'))
            <div class="w-9/12 bg-green-500 text-white rounded-lg mt- pl-5">
                {{ Session::get('success') }}
            </div>
        @endif
    </div> --}}

    <div class="flex justify-center">        
        <div class="w-9/12 bg-white mt-14 p-6 rounded-lg">
            @if (Session::has('success'))
                <div class="w-full bg-green-500 text-white rounded-lg mt- pl-5">
                    {{ Session::get('success') }}
                </div>
            @endif

            <div class="my-5">
                @if ($posts->count())
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
                            @foreach ($posts as $post)
                                <tr class="border-b-2">
                                    <td><a href="{{ route('users.posts', $post->user) }}">{{ $post->user->username }}</a></td>
                                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->created_at->format('Y-m-d') }}</a></td>
                                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->likes->count() }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $posts->links() }}

                @else
                    There are no posts.
                @endif                
            </div>  
        </div>
    </div>
@endsection