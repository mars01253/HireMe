<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HireMe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
</head>

<body>
    <div class="max-w-screen-xl mx-auto">
        <!-- header -->
        <header class="flex items-center justify-between py-2 border-b">
            <a href="#" class="px-2 lg:px-0 uppercase font-bold text-purple-800">
                LOGO
            </a>
        </header>
        <!-- header ends here -->

        <main class="mt-10">

            <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10"
                    style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80"
                    class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-20">

                    @foreach ($offer as $offers)
                        @php
                            $skills = explode(',', $offers->skills);
                        @endphp
                    @endforeach
                    @foreach ($skills as $skill)
                        <a href="#"
                            class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{ $skill }}</a>
                    @endforeach


                    <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                        {{ $offers->title }}
                    </h2>
                    <div class="flex mt-3">
                        <img src="https://randomuser.me/api/portraits/men/97.jpg"
                            class="h-10 w-10 rounded-full mr-2 object-cover" />
                        <div>
                            <p class="font-semibold text-gray-200 text-sm"> {{ $offers->enterprise->name }} </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
                <p class="pb-6">
                    {{ $offers->description }}
                </p>


                <h2 class="text-2xl text-gray-800 font-semibold mb-4 mt-4">type of contract : </h2>
                <button
                    class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{ $offers->Contract }}</button>
                <h2 class="text-2xl text-gray-800 font-semibold mb-4 mt-4">Location : </h2>
                <button
                    class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{ $offers->Location }}</button>
            </div>
        </main>

        <div class="w-[80%] p-3 mt-5 rounded-lg bg-black mb-5 m-auto flex justify-center">
           
            <form action="{{route('store.application')}}" method="POST">
                @csrf
                <input type="text" class="hidden" name="id" value="{{$offers->id}}">
                <input class="inline-block py-2 px-6 rounded-l-xl rounded-t-xl bg-black hover:bg-white hover:text-[#7747FF] focus:text-[#7747FF] focus:bg-gray-200 text-gray-50 font-bold leading-loose transition duration-200" type="submit" value="Apply Now">
            </form>
         
        </div>
</body>

</html>
