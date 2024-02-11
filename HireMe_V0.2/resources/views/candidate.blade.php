@extends('layouts.mynav')
@section('home')
    @if (auth()->user()->confirm == 1)
        <div class="px-8 py-6 bg-green-400 text-white flex justify-between rounded">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                </svg>
                <p>Your Profile was registerd Succesfully</p>
            </div>
        </div>
    @else
        <div class="px-8 py-6 bg-yellow-400 text-white flex justify-between rounded">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                </svg>
                <p>Please Register your profile</p>
            </div>
        </div>
        <h1 class="text-xl font-bold">Register Your Profile: </h1>

        <form action="{{ route('candidate.confirm') }}" method="POST" class="w-[50%] m-auto flex flex-col gap-2"
            enctype="multipart/form-data">
            @csrf
            <div class="flex gap-1 ">
                <div class="flex flex-col w-1/2">
                    <input type="file" id="photo" name="photo" value="{{ old('photo') }}"
                        class="border-none py-2 px-8 rounded-xl">
                    <input type="text" name="id" value="{{ auth()->user()->id }}"
                        class="border-none py-1 px-8 rounded-xl hidden">
                    <input type="text" name="name" value="{{ auth()->user()->name }}"
                        class="border-none py-1 px-8 rounded-xl hidden">
                    <input type="text" name="email" value="{{ auth()->user()->email }}"
                        class="border-none py-1 px-8 rounded-xl hidden">
                    @error('photo')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col w-1/2">
                    <input type="text" id="titre" name="titre" value="{{ old('titre') }}"
                        placeholder="entre your title" class="border-none py-2 px-8 rounded-xl">
                    @error('titre')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex gap-1 ">
                <div class="flex flex-col w-1/2">
            <input type="text" id="current_position" name="current_position" value="{{ old('current_position') }}"
                placeholder="entre your current position" class="border-none py-2 px-8 rounded-xl">
            @error('current_position')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
            <div class="flex flex-col w-1/2">
            <input type="text" id="industry" name="industry" value="{{ old('industry') }}"
                placeholder="entre your industry" class="border-none py-2 px-8 rounded-xl">
            @error('industry')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        </div>
            <input type="text" id="address" name="address" value="{{ old('address') }}"
                placeholder="entre your current address" class="border-none py-2 px-8 rounded-xl">
            @error('address')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div class="flex flex-col">
                <input type="text-area" id="about" name="about" value="{{ old('about') }}"
                    placeholder="about ..." class="border-none py-5 px-8 rounded-xl">
                @error('about')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" class="p-2 bg-[#3465f8] font-medium rounded-lg" value="Register your Profile">
        </form>
    @endif
@endsection
