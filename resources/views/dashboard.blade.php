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

		{{-- Fonts --}}
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
			rel="stylesheet">

	</head>

	<body>
		{{-- === Header === --}}
		<header
			class="flex w-full h-[90px] px-[30px] items-center justify-between border-b-2 fixed top-0 left-0 bg-white z-10">
			{{-- Logo Section --}}
			<div class="w-[300px] h-full flex justify-start items-center gap-3 flex-shrink-0">
				<img src="./img/logo-smk.png" class="w-[60px]" alt="">
				<h2 class="text-xl font-semibold tracking-wider ">SMKN 46 <br>JAKARTA</h2>
			</div>

			{{-- Search Bar --}}
			<div class="flex-1 items-center justify-center lg:flex hidden flex-shrink-1">
				<div class="search-box flex py-3 px-4 justify-center bg-[#E8E8E8] gap-4 rounded items-center">
					<input type="text" placeholder="Search courses..."
						class="flex-grow flex-shrink w-full min-w-[250px] max-w-[400px] text-slate-800 focus:outline-none bg-transparent">
					<i class="fa-solid fa-magnifying-glass text-slate-800"></i>
				</div>
			</div>

			{{-- Nav Link --}}
			<div class="nav-section flex w-[30%] justify-end gap-2 flex-shrink-2">
				<div
					class="lg:hidden flex p-4 rounded justify-center bg-[#E8E8E8] group hover:bg-[#4A5B92] cursor-pointer transition-all">
					<i class="fa-solid fa-magnifying-glass text-slate-800 group-hover:text-white"></i>
				</div>
				<div id="toggle-sidebar-btn"
					class="flex text-slate-800 p-4 rounded justify-center bg-[#E8E8E8] group hover:bg-[#4A5B92] cursor-pointer transition-all">
					<i class="fa-solid fa-bars  group-hover:text-white"></i>
				</div>
				<div class="relative">
					<div id="profile-btn"
						class="group flex p-4 rounded justify-center bg-[#E8E8E8] hover:bg-[#4A5B92] cursor-pointer transition-all text-slate-800">
						<i class="fa-solid fa-user group-hover:text-white"></i>
					</div>

					{{-- Pop up Profile --}}
					<div id="pop-up-profile"
						class="opacity-0 scale-0 absolute right-0 bottom-[-398px] w-[300px] bg-[#e8e8e8] border-black border-2 border-opacity-20 shadow-xl rounded-md py-5 px-6 origin-top-right z-10 transition-all">
						<div class="flex flex-col items-center justify-center">
							<div class="w-[130px] h-[130px] rounded-full overflow-hidden">
								<img class="object-cover w-full h-full"
									src="https://images.unsplash.com/photo-1526379095098-d400fd0bf935?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
									alt="">
							</div>
							<h3 class="text-xl font-semibold mt-4">Phantom</h3>
							<p class="text-sm">Student</p>
							<a
								class="bg-[#A9BBF4] hover:bg-[#92a1d2] w-full flex items-center justify-center py-3 text-xl mt-6 font-semibold rounded"
								href="#">View Profile</a>
							<a
								class="bg-[#4A5B92] text-white w-full flex items-center justify-center py-3 text-xl mt-3 font-semibold rounded"
								href="#">Log Out</a>
						</div>
					</div>
				</div>

			</div>
		</header>
		{{-- != Header =! --}}

		{{-- === Sidebar === --}}
		<aside id="sidebar" class="w-[300px] fixed top-[90px] lg:left-0 left-[-300px] bottom-0 z-99 bg-white shadow ">
			{{-- Profile --}}
			<div class="flex flex-col items-center justify-center mt-8">
				<div class="w-[130px] h-[130px] rounded-full overflow-hidden">
					<img class="object-cover w-full h-full"
						src="https://images.unsplash.com/photo-1526379095098-d400fd0bf935?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
						alt="">
				</div>
				<h3 class="text-xl font-semibold mt-4">Phantom</h3>
				<p class="text-sm">Student</p>
				<a class="bg-[#A9BBF4] hover:bg-[#92a1d2] py-3 px-14 text-xl font-semibold mt-4 rounded" href="#">View
					Profile</a>
			</div>

			{{-- Sidebar Link --}}
			<div class="mt-10 w-full">
				<div class="w-full  hover:bg-[#A9BBF4] hover:bg-opacity-[50%]">
					<a href="#"
						class="flex items-center justify-start w-full pl-7 py-3 gap-4 hover:border-r-[5px] border-[#4A5B92]">
						<i class="fa-solid fa-house text-xl"></i>
						<p class="text-xl font-medium">Home</p>
					</a>
				</div>
				<div class="w-full  hover:bg-[#A9BBF4] hover:bg-opacity-[50%]">
					<a href="#"
						class="flex items-center justify-start w-full pl-7 py-3 gap-4 hover:border-r-[5px] border-[#4A5B92]">
						<i class="fa-solid fa-graduation-cap text-xl"></i>
						<p class="text-xl font-medium">Courses</p>
					</a>
				</div>
			</div>
		</aside>
		{{-- != Sidebar =! --}}

		{{-- === Main === --}}
		<main id="main" class="h-full bg-[#E8E8E8] mt-[90px] lg:ml-[300px] ml-0">
			{{-- Jumbotron --}}
			<div id="jumbotron" class="w-full h-[40vh] flex items-center justify-center">
				<div class="w-full h-full bg-black bg-opacity-30 flex items-center justify-center ">
					<p
						class="text-center text-white font-semibold lg:leading-[60px] sm:leading-[50px] leading-[40px] lg:text-5xl sm:text-4xl text-3xl">
						Welcome,</br>Jhon Doe
					</p>
				</div>
			</div>

			{{-- Content --}}
			<div class="max-w-[1000px] w-full h-full mx-auto px-5 py-10">
				{{-- Status Course --}}
				<div class="w-full flex flex-wrap gap-3">
					<a href="#"
						class="md:w-1/2 flex-1 sm:h-[100px] h-[80px] flex items-center justify-start pl-[20px] sm:pl-[30px] gap-4 border-2 border-opacity-20 border-black shadow rounded-md">
						<div class="flex justify-center items-center w-[40px] sm:w-[50px] h-[40px] sm:h-[50px] bg-[#D4DDF9] rounded-full">
							<i class="fa-regular fa-clock text-[#4A5B92] sm:text-[30px] text-[20px]"></i>
						</div>
						<div>
							<h3 class="sm:text-2xl text-xl font-semibold">In Progress</h3>
							<p class="text-base">2 Courses</p>
						</div>
					</a>

					<a href="#"
						class="md:flex-1 w-full sm:h-[100px] h-[80px] flex items-center justify-start pl-[20px] sm:pl-[30px] gap-4 border-2 border-opacity-20 border-black shadow rounded-md">
						<div class="flex justify-center items-center w-[40px] sm:w-[50px] h-[40px] sm:h-[50px] bg-[#D4F9E2] rounded-full">
							<i class="fa-regular fa-circle-check text-[#4A9273] sm:text-[30px] text-[20px]"></i>
						</div>
						<div>
							<h3 class="sm:text-2xl text-xl font-semibold">Completed</h3>
							<p class="text-base">2 Courses</p>
						</div>
					</a>
				</div>

				{{-- My Course --}}
				<div class="mt-10">
					<h2 class="text-3xl font-semibold mb-4">My Courses</h2>
					<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 justify-between gap-4 gap-y-6">
						<a href="#">
							<div class="p-4 border-2 rounded-md border-black border-opacity-20 shadow">
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
							</div>
						</a>
						<a href="">
							<div class="p-4 border-2 rounded-md border-black border-opacity-20 shadow">
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
							</div>
						</a>
						<a href="">
							<div class="p-4 border-2 rounded-md border-black border-opacity-20 shadow">
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
							</div>
						</a>
					</div>
				</div>

				{{-- Upcoming Assignments --}}
				<div class="mt-10">
					<h2 class="text-3xl font-semibold mb-4">Upcoming Assignments</h2>

					<div class="w-full flex flex-wrap gap-3">
						<a href="#"
							class="w-full sm:h-[100px] h-[80px] flex items-center justify-start px-[20px] sm:px-[30px] gap-4 border-2 border-black border-opacity-20 shadow rounded-md">
							<div
								class="flex justify-center items-center min-w-[40px] min-h-[40px] w-[40px] sm:min-w-[50px] sm:w-[50px] h-[40px] sm:min-h-[50px] sm:h-[50px] bg-[#D4DDF9] rounded-full">
								<i class="fa-regular fa-file text-[#4A5B92] sm:text-[30px] text-[20px]"></i>
							</div>
							<div class="flex-1 min-w-0">
								<h3 class="w-full sm:text-xl text-base font-semibold overflow-hidden whitespace-nowrap text-ellipsis">
									Kelas X PPLG - Portofolio Website Project
								</h3>
								<p class="sm:text-base text-sm">Senin, 14 Oktober, 23.59</p>
							</div>
						</a>
					</div>

				</div>

				{{-- Calendar --}}
				<div class="mt-10">
					<h2 class="text-3xl font-semibold mb-4">Calendar</h2>

					<div class="bg-white rounded sm:p-6 p-4 w-full border-stone-300 border-2 shadow">
						<div class="w-full">
							<div class="overflow-hidden">
								<div class="flex items-center justify-between px-6 py-3 bg-[#4A5B92] rounded-md text-white">
									<button id="prevMonth">
										<i class="fa-solid fa-angle-left"></i>
									</button>
									<h2 id="currentMonth"></h2>
									<button id="nextMonth">
										<i class="fa-solid fa-angle-right"></i>
									</button>
								</div>
								<div class="grid grid-cols-7 gap-2 mt-4" id="calendar">
									<!-- Calendar Days Go Here -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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

		<script>
			const profileBtn = document.querySelector('#profile-btn');
			const popUpProfile = document.querySelector('#pop-up-profile');

			if (profileBtn) {
				profileBtn.addEventListener('click', (e) => {
					profileBtn.classList.toggle('profile-active')
				})

				document.addEventListener('click', (e) => {
					if (!popUpProfile.contains(e.target) && !profileBtn.contains(e.target)) {
						profileBtn.classList.remove('profile-active')
					}
				})
			}
		</script>

		<script>
			const toggleSidebarBtn = document.querySelector('#toggle-sidebar-btn');

			if (toggleSidebarBtn) {
				toggleSidebarBtn.addEventListener('click', function(e) {
					document.body.classList.toggle('toggle-sidebar');
				});
			}
		</script>

		{{-- Calendar --}}
		<script>
			// Function to generate the calendar for a specific month and year
			function generateCalendar(year, month) {
				const calendarElement = document.getElementById('calendar');
				const currentMonthElement = document.getElementById('currentMonth');

				if (calendarElement) {
					// Create a date object for the first day of the specified month
					const firstDayOfMonth = new Date(year, month, 1);
					const daysInMonth = new Date(year, month + 1, 0).getDate();

					// Clear the calendar
					calendarElement.innerHTML = '';

					// Set the current month text
					const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
						'October', 'November', 'December'
					];
					currentMonthElement.innerText = `${monthNames[month]} ${year}`;

					// Calculate the day of the week for the first day of the month (0 - Sunday, 1 - Monday, ..., 6 - Saturday)
					const firstDayOfWeek = firstDayOfMonth.getDay();

					// Create headers for the days of the week
					const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
					daysOfWeek.forEach(day => {
						const dayElement = document.createElement('div');
						dayElement.className = 'text-center sm:p-3 py-2 px-0 font-semibold bg-[#D4DDF9] rounded-md';
						dayElement.innerText = day;
						calendarElement.appendChild(dayElement);
					});

					// Create empty boxes for days before the first day of the month
					for (let i = 0; i < firstDayOfWeek; i++) {
						const emptyDayElement = document.createElement('div');
						calendarElement.appendChild(emptyDayElement);
					}

					// Create boxes for each day of the month
					for (let day = 1; day <= daysInMonth; day++) {
						const dayElement = document.createElement('div');
						dayElement.className = 'text-center py-2 rounded-md border cursor-pointer hover:bg-slate-300';
						dayElement.innerText = day;

						// Check if this date is the current date
						const currentDate = new Date();
						if (year === currentDate.getFullYear() && month === currentDate.getMonth() && day === currentDate
							.getDate()) {
							dayElement.classList.add('bg-[#4A5B92]', 'text-white'); // Add classes for the indicator
						}

						calendarElement.appendChild(dayElement);
					}
				}
			}

			// Initialize the calendar with the current month and year
			const currentDate = new Date();
			let currentYear = currentDate.getFullYear();
			let currentMonth = currentDate.getMonth();
			generateCalendar(currentYear, currentMonth);

			const prevMonth = document.getElementById('prevMonth')
			const nextMonth = document.getElementById('nextMonth')

			if (prevMonth && nextMonth) {
				// Event listeners for previous and next month buttons
				prevMonth.addEventListener('click', () => {
					currentMonth--;
					if (currentMonth < 0) {
						currentMonth = 11;
						currentYear--;
					}
					generateCalendar(currentYear, currentMonth);
				});

				nextMonth.addEventListener('click', () => {
					currentMonth++;
					if (currentMonth > 11) {
						currentMonth = 0;
						currentYear++;
					}
					generateCalendar(currentYear, currentMonth);
				});
			}
		</script>
	</body>

</html>
