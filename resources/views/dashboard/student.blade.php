<!DOCTYPE html>
<html lang="en" class="bg-white scroll-smooth">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>{{ $title ?? 'LMS SMKN 46 JAKARTA' }}</title>

		{{-- Vite --}}
		@vite('resources/css/app.css')

		{{-- Icon --}}
		<link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">

		{{-- Favicon --}}
		<link rel="shortcut icon" href="{{ asset('img/logo-smk.png') }}" type="image/x-icon">

		{{-- Fonts --}}
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
			rel="stylesheet">
	</head>

	<body class="w-full bg-[#E8E8E8] pt-[90px]">
		{{-- === Header === --}}
		@include('partial.user-navbar')
		{{-- != Header =! --}}

		{{-- === Sidebar === --}}
		@include('partial.user-sidebar')
		{{-- != Sidebar =! --}}

		{{-- === Main === --}}
		<main id="main" class="h-full lg:ml-[300px] ml-0">
			@yield('content')
		</main>
		{{-- != Main =! --}}

		{{-- === Footer === --}}
		<footer id="footer" class="lg:ml-[300px] ml-0 relative bottom-0">
			<div class="w-full p-4 bg-[#4A5B92] text-center">
				<h3 class="text-base font-normal text-white">copyright @ 2024 by kelompok 4 LMS | all rights reserved!</h3>
			</div>
		</footer>
		{{-- != Footer =! --}}

		<script src="{{ asset('js/user.js') }}"></script>
		<script src="{{ asset('js/alert.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</body>

</html>
