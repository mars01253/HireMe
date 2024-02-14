@extends('layouts.mynav')
@section('home')
    <main class="m-auto w-[80%] flex flex-wrap gap-5 mt-5 mr-5">
        @foreach ($offers as $offer)
            @php
                $skills = explode(',', $offer->skills);
            @endphp

            <div class=" flex w-80 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                <div
                    class="  h-40 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40 bg-gradient-to-r from-blue-500 to-blue-600">
                </div>
                <div class="p-6">
                    <h5
                        class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        {{ $offer->title }}
                    </h5>
                    <h5 class="font-bold mb-1">Skills required :</h5>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($skills as $skill)
                            <span class="p-2 bg-blue-600 rounded-lg  ">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="p-6 pt-0 flex gap-5">
                    <a href="{{route('job.offer' ,[$offer->id])}}" target="blank" data-ripple-light="true" type="button"
                        class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Read More
                    </a>
                    <button  data-ripple-light="true" type="button"
                        class="select-none rounded-lg bg-green-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        {{$offer->enterprise->name}}
                    </button>
                </div>
            </div>
        @endforeach

    </main>
@endsection
