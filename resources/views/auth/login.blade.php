@extends('layouts.app')

@section('content')
    <div class="flex justify-center">

        <div class= "w-4/12 bg-white p-6 rounded-lg">
           <form action="{{ route('login') }}" method="POST">
            @if( session('status'))
                <div class="bg-red-500 rounded-lg p-4 mb-6 text-white text-center">
                    {{session('status')}}
                </div>

            @endif
            @csrf
            <div class="mb-4">


                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your Email"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">

                    @error('email')
                        <div class="bg-red-100 mt-2 tesct-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                    @error('password')
                        <div class="bg-red-100 mt-2 tesct-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="checkbox" class="mr-2" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
