<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>HireMe</title>
</head>
<body>
    <!-- component -->
<nav class="bg-gray-200 shadow shadow-gray-300 w-100 px-8 md:px-auto">
	<div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
		<!-- Logo -->
		<div class="text-indigo-500 md:order-1">

			<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
			</svg>
		</div>
		<div class="text-gray-500 order-3 w-full md:w-auto md:order-2">
			<ul class="flex font-semibold justify-between">
				<li class="md:px-4 md:py-2 text-indigo-500"><a href="/">Home</a></li>
				<li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="#">Job Offers</a></li>
				@auth
				@if (auth()->user()->role == 'Enterprise')
				<li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="{{route('enterprise.profile')}}">Profile</a></li>
				@endif
				<li class="md:px-4 md:py-2 hover:text-indigo-400">
					<form action="{{route('logout')}}" method="POST">
						@csrf
					<input type="submit" value="Logout">
					</form>
				</li>
				@else
				<li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="{{route('login')}}">Login</a></li>
				<li class="md:px-4 md:py-2 hover:text-indigo-400"><a href="{{route('register')}}">Register</a></li>
				@endauth
			</ul>
		</div>
	</div>
</nav>
   @yield('home')
</body>
</html>


