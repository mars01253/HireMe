<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <title>HireMe</title>
</head>

<body class="bg-[#eeeeee]">
    <!-- component -->
    <nav class="bg-[#eeeeee] shadow shadow-gray-300 w-100 px-8 md:px-auto">
        <div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
            <!-- Logo -->
            <div class="text-indigo-500 md:order-1">
                <svg xmlns="http://www.w3.org/2000/svg" width='30' viewBox="0 0 512 512">
                    <path
                        d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
                </svg>
            </div>
            <div class="text-gray-500 order-3 w-full md:w-auto md:order-2">
                <ul class="flex font-semibold justify-between items-center">
					@auth
                    @if (auth()->user()->role == 'Candidate')
                        <li class="md:px-4 md:py-2 text-indigo-500"><a href="{{route('profile.candidate')}}">Profile</a></li>
						<li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="{{route('job.offers')}}">Job Offers</a></li>
                    @endif
                        @if (auth()->user()->role == 'Enterprise')
                            <li class="md:px-4 md:py-2 hover:text-indigo-400"><a
                                    href="{{route('enterprise.home')}}">Home</a></li>
                            <li class="md:px-4 md:py-2 hover:text-indigo-400"><a
                                    href="{{ route('profile.enterprise') }}">Profile</a></li>
                        @endif
                        <li class="md:px-4 md:py-2 hover:text-indigo-400">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input type="submit" class="p-2 text-white bg-[#3465f8] rounded-lg hover:text-black"
                                    value="Logout">
                            </form>
                        </li>
                    @else
                        <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="{{ route('login') }}">Login</a></li>
                        <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @yield('home')
</body>

</html>
