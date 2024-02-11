@extends('layouts.mynav')

@section('home')
    
<div class="py-3 px-3"><h1 class="font-bold text-2xl font-Oswald">MyProfile</h1></div>

@if (auth()->user()->confirm== 0 )
<div class="w-[60%] m-auto bg-slate-200 p-16 rounded-lg">
    <form action="{{route('enterprise.confirm')}}" method="POST" class="w-[50%] m-auto flex flex-col gap-2"  enctype="multipart/form-data">
        @csrf
        <label for="logo" class="font-bold">Logo</label>
        <input type="file" id="logo" name="logo">
        
        <div class="flex flex-col"> 
            <label for="slogan" class="font-bold">Slogan</label>
        <input type="text" id="slogan" name="slogan" value="{{old('slogan')}}" class="border-none py-1 px-8 rounded-xl" >
        <input type="text"  name="user_id" value="{{auth()->user()->id}}" class="border-none py-1 px-8 rounded-xl hidden" >
        <input type="text"  name="name" value="{{auth()->user()->name}}" class="border-none py-1 px-8 rounded-xl hidden" >
        <input type="text"  name="email" value="{{auth()->user()->email}}" class="border-none py-1 px-8 rounded-xl hidden" >
        @error('slogan')
            <p class="text-red-500">{{$message}}</p>
        @enderror
       </div>
       <div class="flex flex-col"> 
        <label for="industrie" class="font-bold">Industrie</label>
        <input type="text" id="industrie" name="industrie" value="{{old('industrie')}}" class="border-none py-1 px-8 rounded-xl" >
        @error('industrie')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    <div class="flex flex-col"> 
        <label for="description" class="font-bold">Description</label>
        <input type="text-area" id="description" value="{{old('description')}}" name="description" class="border-none py-5 px-8 rounded-xl" >
        @error('description')
        <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
        <input type="submit" class="p-2 bg-yellow-400 font-medium rounded-lg" value="Confirm">
    </form>
</div>
@endif

  
   





@endsection