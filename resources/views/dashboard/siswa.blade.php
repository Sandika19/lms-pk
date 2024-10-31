<!DOCTYPE html>
<html lang="en" class="bg-white">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Dashboard</title>
		@vite('resources/css/app.css')

		{{-- Icon --}}
		{{-- <link rel='stylesheet'
			href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'> --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
			integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />

		{{-- Fonts --}}
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
			rel="stylesheet">

	</head>

	<body>
		<header
			class="flex w-full py-3 px-[20px] items-center justify-between border-b-2 md:static fixed top-0 left-0 bg-white z-10">
			{{-- Logo Section --}}
			<div class="logo-section md:w-[30%] w-1/2 flex justify-start items-center gap-3 flex-shrink-0 ">
				<img src="./img/logo-smk.png" class="w-[60px]" alt="">
				<h2 class="md:text-xl text-md sm:block hidden font-semibold">SMK NEGERI 46 JAKARTA</h2>
			</div>

			{{-- Search Bar --}}
			<div class="search-section flex-1 items-center justify-center md:flex hidden flex-shrink-1">
				<div class="search-box flex py-3 px-4 justify-center bg-[#E8E8E8] gap-4 rounded items-center">
					<input type="text" placeholder="Search courses..."
						class="flex-grow flex-shrink w-full min-w-[250px] max-w-[400px] text-slate-800 focus:outline-none bg-transparent">
					<i class="fa-solid fa-magnifying-glass text-slate-800"></i>
				</div>
			</div>

			{{-- Nav Link --}}
			<div class="nav-section flex md:w-[30%] w-1/2 justify-end gap-2 flex-shrink-2 ">
				<div
					class="md:hidden flex sm:p-4 p-3 rounded justify-center bg-[#E8E8E8] group hover:bg-[#4A5B92] cursor-pointer transition-all">
					<i class="fa-solid fa-magnifying-glass text-slate-800 group-hover:text-white"></i>
				</div>
				<div id="menu"
					class="flex text-slate-800 sm:p-4 p-3 rounded justify-center bg-[#E8E8E8] group hover:bg-[#4A5B92] cursor-pointer transition-all">
					<i class="fa-solid fa-bars  group-hover:text-white"></i>
				</div>
				<div
					class="flex sm:p-4 p-3 rounded justify-center bg-[#E8E8E8] hover:bg-[#4A5B92] group cursor-pointer transition-all">
					<i class="fa-solid fa-user text-slate-800 group-hover:text-white"></i>
				</div>
			</div>
		</header>

		<main class="w-full h-full flex bg-[#e9e9e9]">
			{{-- SideBar --}}
			<div id="sidebar"
				class="md:static md:hidden border-r fixed min-w-[300px] width-[300px] top-[10.8%] left-[-400px] bottom-0 bg-white border-stone-400 transition-all">
				{{-- Profile --}}
				<div class="flex flex-col items-center justify-center mt-8">
					<div class="w-[130px] h-[130px] rounded-full overflow-hidden">
						<img class="object-cover w-full h-full"
							src="https://images.unsplash.com/photo-1526379095098-d400fd0bf935?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
							alt="">
					</div>
					<h3 class="text-xl font-semibold mt-4">Phantom</h3>
					<p class="text-sm">Student</p>
					<a class="bg-[#A9BBF4] py-3 px-14 text-xl font-semibold mt-4 rounded" href="#">View Profile</a>
				</div>

				{{-- Sidebar Link --}}
				<div class="mt-10 w-full">
					<div class="w-full  hover:bg-[#A9BBF4] hover:bg-opacity-[50%]">
						<a href="#" class="flex items-center justify-start w-full pl-7 py-3 gap-4">
							<i class="fa-solid fa-house text-xl"></i>
							<p class="text-xl font-medium">Home</p>
						</a>
					</div>
					<div class="w-full  hover:bg-[#A9BBF4] hover:bg-opacity-[50%]">
						<a href="#" class="flex items-center justify-start w-full pl-7 py-3 gap-4">
							<i class="fa-solid fa-graduation-cap text-xl"></i>
							<p class="text-xl font-medium">Courses</p>
						</a>
                        
					</div>
                    <a href='/logout'>Logout</a>
				</div>
			</div>

			{{-- Main Content --}}
			<div id="main-content" class="w-full h-full md:pt-0 pt-[82.3px]">
				{{-- Jumbotron --}}
				<div id="jumbotron" class="w-full h-[40vh] flex items-center justify-center ">
					<div class="w-full h-full bg-black bg-opacity-30 flex items-center justify-center">
						<p class="text-center text-white md:text-5xl font-semibold  md:leading-[60px] sm:text-4xl text-3xl">
							Selamat datang,</br>Phantom
						</p>
					</div>
				</div>

				{{-- Content --}}
				<div class="max-w-[1000px] w-full h-full mx-auto px-5">
					{{-- Status Course --}}
					<div class="w-full flex flex-wrap gap-3 my-10">
						<a href="#"
							class="md:w-1/2 flex-1 h-[100px] flex items-center justify-start pl-[20px] sm:pl-[30px] gap-4 border-2 border-stone-300 shadow rounded">
							<div
								class="flex justify-center items-center w-[40px] sm:w-[50px] h-[40px] sm:h-[50px] bg-[#D4DDF9] rounded-full">
								<i class="fa-regular fa-clock text-[#4A5B92] sm:text-[30px] text-[20px]"></i>
							</div>
							<div>
								<h3 class="sm:text-2xl text-xl font-semibold">In Progress</h3>
								<p class="text-base">2 Courses</p>
							</div>
						</a>

						<a href="#"
							class="md:flex-1 w-full h-[100px] flex items-center justify-start pl-[20px] sm:pl-[30px] gap-4 border-2 border-stone-300 shadow rounded">
							<div
								class="flex justify-center items-center w-[40px] sm:w-[50px] h-[40px] sm:h-[50px] bg-[#D4F9E2] rounded-full">
								<i class="fa-regular fa-circle-check text-[#4A9273] sm:text-[30px] text-[20px]"></i>
							</div>
							<div>
								<h3 class="sm:text-2xl text-xl font-semibold">Completed</h3>
								<p class="text-base">2 Courses</p>
							</div>
						</a>
					</div>

					{{-- My Course --}}
					<div>
						<h2 class="text-3xl font-semibold mb-4">My Courses</h2>

						<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 justify-between gap-4 gap-y-6">
							<div class="p-4 border-2 rounded border-stone-300 shadow">
								<div class="w-full h-[150px] rounded overflow-hidden">
									<img src="./img/tes-1.jpg" class="w-full h-full object-cover object-center" alt="">
								</div>
								<h3 class="text-2xl font-semibold mt-5">Heading in HTML</h3>
								<h5 class="text-sm mb-3">Web Programming</h5>
								<div class="flex items-center justify-start gap-2">
									<div class="w-[25px] h-[25px] bg-[#D4DDF9] rounded-full flex items-center justify-center">
										<i class="fa-solid fa-book-open text-[13px] text-[#4A5B92]"></i>
									</div>
									<p class="text-sm">10 Chapters</p>
								</div>
								<div class="w-full border border-stone-300 shadow rounded-full h-3 mt-3">
									<div class="bg-[#4A5B92] h-2.5 rounded-full w-[50%]"></div>
								</div>
								<p class="mt-1 text-sm font-medium text-[#4A5B92]">50% Complete</p>
							</div>

							<div class="p-4 border-2 rounded border-stone-300 shadow">
								<div class="w-full h-[150px] rounded overflow-hidden">
									<img src="./img/tes-1.jpg" class="w-full h-full object-cover object-center" alt="">
								</div>
								<h3 class="text-2xl font-semibold mt-5">Heading in HTML</h3>
								<h5 class="text-sm mb-3">Web Programming</h5>
								<div class="flex items-center justify-start gap-2">
									<div class="w-[25px] h-[25px] bg-[#D4DDF9] rounded-full flex items-center justify-center">
										<i class="fa-solid fa-book-open text-[13px] text-[#4A5B92]"></i>
									</div>
									<p class="text-sm">10 Chapters</p>
								</div>
								<div class="w-full border border-stone-300 shadow rounded-full h-3 mt-3">
									<div class="bg-[#4A5B92] h-2.5 rounded-full w-[50%]"></div>
								</div>
								<p class="mt-1 text-sm font-medium text-[#4A5B92]">50% Complete</p>
							</div>

							<div class="p-4 border-2 rounded border-stone-300 shadow">
								<div class="w-full h-[150px] rounded overflow-hidden">
									<img src="./img/tes-1.jpg" class="w-full h-full object-cover object-center" alt="">
								</div>
								<h3 class="text-2xl font-semibold mt-5">Heading in HTML</h3>
								<h5 class="text-sm mb-3">Web Programming</h5>
								<div class="flex items-center justify-start gap-2">
									<div class="w-[25px] h-[25px] bg-[#D4DDF9] rounded-full flex items-center justify-center">
										<i class="fa-solid fa-book-open text-[13px] text-[#4A5B92]"></i>
									</div>
									<p class="text-sm">10 Chapters</p>
								</div>
								<div class="w-full border border-stone-300 shadow rounded-full h-3 mt-3">
									<div class="bg-[#4A5B92] h-2.5 rounded-full w-[50%]"></div>
								</div>
								<p class="mt-1 text-sm font-medium text-[#4A5B92]">50% Complete</p>
							</div>

						</div>
					</div>

					{{-- Upcoming Assignments --}}
					<div class="mt-10">
						<h2 class="text-3xl font-semibold mb-4">Upcoming Assignments</h2>


						<div class="w-full flex flex-wrap gap-3 my-10">
							<a href="#"
								class="w-full h-[100px] flex items-center justify-start pl-[20px] sm:pl-[30px] gap-4 border-2 border-stone-300 shadow rounded">
								<div
									class="flex justify-center items-center min-w-[40px] min-h-[40px] w-[40px] sm:min-w-[50px] sm:w-[50px] h-[40px] sm:min-h-[50px] sm:h-[50px] bg-[#D4DDF9] rounded-full">
									<i class="fa-regular fa-file text-[#4A5B92] sm:text-[30px] text-[20px]"></i>
								</div>
								<div>
									<h3 class="sm:text-xl text-base font-semibold">Kelas X PPLG - Portofolio Website Project is due</h3>
									<p class="sm:text-base text-sm">Senin, 14 Oktober, 23.59 </p>
								</div>
							</a>
						</div>
					</div>
		</main>

		<footer>
			<div class="w-full p-4 bg-[#4A5B92] text-center">
				<h3 class="text-base font-normal text-white">copyright @ 2024 by kelompok 4 LMS | all rights reserved!</h3>
			</div>
		</footer>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"
			integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw=="
			crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<script>
			const sidebar = document.getElementById('sidebar');
			const menuBtn = document.querySelector('#menu');

			menuBtn.addEventListener('click', () => {
				// sidebar.classList.toggle('sidebar-active');

				if (window.innerWidth < 850) {
					sidebar.classList.toggle('sidebar-active-md')
				} else {
					sidebar.classList.toggle('md:hidden')
				}

				menuBtn.classList.toggle('menu-active')
			});
		</script>
	</body>

</html>
