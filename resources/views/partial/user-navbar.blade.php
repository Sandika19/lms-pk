<header class="flex w-full h-[90px] items-center justify-between border-b-2 fixed top-0 left-0 bg-white z-10">
	{{-- Logo Section --}}
	<div class="sm:w-[300px] w-1/2 pl-[30px] h-full flex justify-start items-center gap-6 flex-shrink-0 ">
		<img src="{{ asset('img/logo-smk.png') }}" class="w-[70px]" alt="">
		<h2 class="sm:block hidden text-2xl font-bold tracking-widest">SMKN 46 <br>JAKARTA</h2>
	</div>

	{{-- Search Bar --}}
	<div class="flex-1 items-center justify-center lg:flex hidden flex-shrink-1">
		<div class="search-box flex py-3 px-4 justify-center bg-[#E8E8E8] gap-4 rounded items-center">
			<input type="text" placeholder="Search courses..."
				class="flex-grow flex-shrink w-full min-w-[300px] max-w-[400px] text-slate-800 focus:outline-none bg-transparent">
			<i class="fa-solid fa-magnifying-glass text-slate-800"></i>
		</div>
	</div>

	{{-- Nav Link --}}
	<div class="nav-section h-full items-center flex sm:w-[300px] w-1/2 justify-end gap-2 flex-shrink-1 pr-[30px]">
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
				class="opacity-0 scale-0 absolute right-0 bottom-[-398px] w-[300px] bg-white border-black border-2 border-opacity-20 shadow-xl rounded-md py-5 px-6 origin-top-right z-10 transition-all">
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
					<div
						class="bg-[#4A5B92] hover:bg-[#3f4e7c] text-white w-full flex items-center justify-center py-3 text-xl mt-3 font-semibold rounded">
						<form action="{{ route('logout') }}" method="post">
							@csrf
							<button type="submit">Logout</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
