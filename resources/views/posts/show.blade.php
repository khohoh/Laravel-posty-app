@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white mt-14 p-6 rounded-lg">
            <x-post :post="$post"></x-post>            
        </div>
    </div>
@endsection