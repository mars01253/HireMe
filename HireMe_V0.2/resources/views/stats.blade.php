@extends('layouts.mynav')
@section('home')
<div class="min-h-full flex">
    <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
        <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button type="button"
                    class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-shrink-0 flex items-center px-4">
                <img class="h-8 w-auto"
                    src="https://tailwindui.com/img/logos/workflow-logo-rose-500-mark-white-text.svg" alt="Workflow">
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <nav class="px-2">
                    <div class="space-y-1">
                        <a href="{{route('profile.admin')}}"
                            class="bg-gray-900 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md"
                            aria-current="page">
                            <svg class="text-gray-300 mr-4 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Home
                        </a>
                        <a href="{{route('stats.admin')}}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <svg class="text-gray-400 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            Stats
                        </a>

                       

                        
                        <form action="{{ route('logout') }}" method="POST" class="flex items-center ml-1">
                            @csrf
                            <button type="submit"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center gap-3 px-2 py-2 text-base font-medium rounded-md">
                                <i class="fa-solid fa-right-from-bracket"  style="color: #888d91;"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
        </div>
    </div>


    <div class="hidden lg:flex lg:w-64 lg:fixed lg:inset-y-0">
        <div class="flex-1 flex flex-col min-h-0">
            <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
                <img class="h-8 w-auto"
                    src="https://tailwindui.com/img/logos/workflow-logo-rose-500-mark-white-text.svg" alt="Workflow">
            </div>
            <div class="flex-1 flex flex-col overflow-y-auto bg-gray-800">
                <nav class="flex-1 px-2 py-4">
                    <div class="space-y-1">
                        <a href="{{route('profile.admin')}}"
                            class="bg-gray-900 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                            aria-current="page">
                            <svg class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                           Home
                        </a>

                        <a href="{{route('stats.admin')}}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                           Stats
                        </a>
                        

                        <form action="{{ route('logout') }}" method="POST" class="flex items-center ml-1">
                            @csrf
                            <button type="submit"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center gap-3 px-2 py-2 text-base font-medium rounded-md">
                                <i class="fa-solid fa-right-from-bracket"  style="color: #888d91;"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="lg:pl-64 flex flex-col w-0 flex-1">
        <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200">
            <button type="button"
                class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-900 lg:hidden">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
        </div>
    
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
              <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <h1 class="font-bold text-3xl">Total Companies </h1>
                    <h2 class=" text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$companies}}</h2>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <h1 class="font-bold text-3xl">Total Candidates </h1>
                    <dd class=" text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$candidates}}</dd>
                    
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <h1 class="font-bold text-3xl">Total Offers </h1>
                    <dd class=" text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$offers}}</dd>
          
                </div>
              </dl>
            </div>
          </div>
    </div>
</div>
@endsection
