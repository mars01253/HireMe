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
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>HireMe</title>
</head>

<body class="bg-[#eeeeee]">
    <!-- component -->
    <nav class="bg-[#eeeeee] shadow shadow-gray-300 w-100 px-8 md:px-auto">
        <div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
            <!-- Logo -->
            <div class="text-indigo-500 md:order-1 font-bold text-2xl">
                HireMe
            </div>
            <div class="text-gray-500 order-3 w-full md:w-auto md:order-2">
                <ul class="flex font-semibold justify-between items-center">
                    @auth
                        @if (auth()->user()->role == 'Candidate')
                            <li class="md:px-4 md:py-2 text-indigo-500">
                                <form action="{{ route('user.search') }}" method="POST">
                                    @csrf
                                    <input type="text" name="search"
                                        class="w-full max-w-[160px] bg-white pl-2 py-2 rounded-lg text-base font-semibold outline-0"
                                        placeholder="Search for Job offers and Companies" id="">
                                    <input type="button" value="Search"
                                        class="bg-blue-500 p-2 rounded-tr-lg rounded-br-lg text-white font-semibold hover:bg-blue-800 transition-colors">
                                </form>
                            </li>
                            <li class="md:px-4 md:py-2 text-indigo-500"><a
                                    href="{{ route('profile.candidate') }}">Profile</a></li>
                            <li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="{{ route('job.offers') }}">Job
                                    Offers</a></li>
                            <li class="md:px-4 md:py-2 hover:text-indigo-400">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" class="p-2 text-white bg-[#3465f8] rounded-lg hover:text-black"
                                        value="Logout">
                                </form>
                            </li>
                        @endif
                        @if (auth()->user()->role == 'Enterprise')
                            <li class="md:px-4 md:py-2 hover:text-indigo-400"><a
                                    href="{{ route('enterprise.home') }}">Home</a></li>
                            <li class="md:px-4 md:py-2 hover:text-indigo-400"><a
                                    href="{{ route('profile.enterprise') }}">Profile</a></li>
                            <li class="md:px-4 md:py-2 hover:text-indigo-400">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" class="p-2 text-white bg-[#3465f8] rounded-lg hover:text-black"
                                        value="Logout">
                                </form>
                            </li>
                        @endif
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
