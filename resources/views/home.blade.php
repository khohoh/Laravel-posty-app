@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg mt-40">
            <div class="grid grid-row-2 justify-center gap-3 text-center">
                <div class="text-3xl">Welcome To Posty App</div>
                <div>Join us to post what you want to share with people for free!</div>
            </div>

            @if(!auth()->user())           
                <div class="flex justify-center mt-7">
                    <div>
                        <a href="{{ route('login') }}" 
                                class="w-32 border-2 border-blue-500  text-blue-500 ml-3 px-2 py-1 rounded font-medium hover:bg-blue-500 hover:text-white">
                                Login</a>
                    </div>
            
                    <div>
                        <a href="{{ route('register') }}" 
                                class="w-32 border-2 border-blue-500  text-blue-500 ml-3 px-2 py-1 rounded font-medium hover:bg-blue-500 hover:text-white">
                                Register</a>
                    </div>
                </div>
            @endif
        </div>

        
    </div>
@endsection