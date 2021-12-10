<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Posty</title>
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center font-bold text-gray-400">
            <li>
                <a href="/" class="p-3 hover:text-black">Home</a>
            </li>
            <li>
                <a href="{{ route('my_posts') }}" class="p-3 hover:text-black">My Posts</a>                
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3 hover:text-black">All Posts</a>
            </li>
            @auth
                <li>                    
                    <a href="{{ route('posts.create') }}" 
                       class="border-2 border-blue-500  text-blue-500 ml-3 px-2 py-1 rounded font-medium hover:bg-blue-500 hover:text-white">
                       Create Post</a>
                </li>
            @endauth
        </ul>

        <ul class="flex items-center font-bold">
            @auth
                <li>
                    {{-- <a href="" class="p-3">{{ auth()->user()->name }}</a> --}}
                    <div class="mr-2">{{ auth()->user()->username }}</div>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                        @csrf
                        <button type="submit" class="font-bold text-gray-400 hover:text-black">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li>
                    <a href="{{ route('login') }}" class="p-3 text-gray-400 hover:text-black">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3 text-gray-400 hover:text-black">Register</a>
                </li>
            @endguest
        </ul>
    </nav>

    <div style="background-image: url('https://cdn.pixabay.com/photo/2021/09/01/08/23/winter-6590863_960_720.png')" 
         class="h-screen bg-no-repeat bg-cover">
        @yield('content')
    </div>
</body>
</html>