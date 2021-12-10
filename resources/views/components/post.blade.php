{{-- @props(['post' => $post]) --}}

{{-- <div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->username }}</a> 
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
    
    <p class="mb-2">{{ $post->body }}</p>

    @can('delete', $post)
        <div>
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete</button>
            </form>
        </div>
    @endcan

    <div class="flex items-center">
        @auth
            @if(!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif                                
        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div> --}}



{{-- Edited --}}
<div class="p-4">
    <div class="flex justify-between border-b-4 p-2">
        <div>
            <span class="text-sm">Title: </span>
            <span class="text-xl">{{ $post->title }}</span>
        </div>
        <div>
            <span class="text-sm">by </span>
            <a href="{{ route('users.posts', $post->user) }}" class="text-xl">{{ $post->user->username }}</a> 
            <span>{{ $post->created_at->diffForHumans() }}</span>
        </div>
    </div>

    <div class="my-7">
        @if ($post->image)            
            <img src="/storage/{{ $post->image }}" style="width: 500px">            
        @endif

        <p class="my-5 px-2">{{ $post->body }}</p>
    </div>

    <div class="flex items-center">
        @auth
            @if(!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Unlike</button>
                </form>
            @endif                                
        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>

    <div class="border-t-4 mt-4 px-1 flex justify-between">
        @if ($post->user->id == auth()->user()->id)
            <a href="{{ route('posts.edit', $post) }}" 
               class="bg-yellow-500 hover:bg-yellow-700 text-white rounded-lg px-2 mt-4">Edit post</a>        
        @endif
        
        @can('delete', $post)    
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white rounded-lg px-2 mt-4">Delete post</button>
            </form>
        @endcan
    </div>
</div>

