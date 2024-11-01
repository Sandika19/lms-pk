<!DOCTYPE html>
<html lang="en" class="bg-white scroll-smooth">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Dashboard</title>
		@vite('resources/css/app.css')

		{{-- Icon --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
			integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />

		{{-- Favicon --}}
		<link rel="shortcut icon" href="{{ asset('img/logo-smk.png') }}" type="image/x-icon">

		{{-- Fonts --}}
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
			rel="stylesheet">
	</head>

	<body>
		{{-- === Header === --}}
		@include('partial.user-navbar')
		{{-- != Header =! --}}

		{{-- === Sidebar === --}}
		@include('partial.user-sidebar')
		{{-- != Sidebar =! --}}

		{{-- === Main === --}}
		<main id="main" class="h-full bg-[#E8E8E8] mt-[90px] lg:ml-[300px] ml-0">
			@yield('content')
		</main>
		{{-- != Main =! --}}

		{{-- === Footer === --}}
		<footer id="footer" class="lg:ml-[300px] ml-0">
			<div class="w-full p-4 bg-[#4A5B92] text-center">
				<h3 class="text-base font-normal text-white">copyright @ 2024 by kelompok 4 LMS | all rights reserved!</h3>
			</div>
		</footer>
		{{-- != Footer =! --}}

		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"
			integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw=="
			crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<script src="{{ asset('js/user.js') }}"></script>
	</body>

</html>
