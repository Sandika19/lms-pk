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
		<div class="w-full">
			<a href="{{ route('student.home') }}"
				class="nav-link-sidebar {{ request()->is('dashboard-student/home') ? 'nav-link-active' : '' }}">
				<i class="fa-solid fa-house text-xl"></i>
				<p class="text-xl font-medium">Home</p>
			</a>
		</div>
		<div class="w-full">
			<a href="{{ route('student.home') }}"
				class="nav-link-sidebar {{ request()->is('dashboard-student/classes') ? 'nav-link-active' : '' }}">
				<i class="fa-solid fa-graduation-cap text-xl"></i>
				<p class="text-xl font-medium">Classes</p>
			</a>
		</div>
	</div>
</aside>
