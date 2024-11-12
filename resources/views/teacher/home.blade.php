@extends('dashboard.user')

@section('content')
	{{-- Jumbotron --}}
	<div id="jumbotron" class="w-full h-[40vh] flex items-center justify-center">
		<div class="w-full h-full bg-black bg-opacity-30 flex items-center justify-center ">
			<p
				class="text-center text-white font-semibold lg:leading-[60px] sm:leading-[50px] leading-[40px] lg:text-5xl sm:text-4xl text-3xl">
				Welcome,</br>{{ $teacher->fullname ?? 'Teacher' }}
			</p>
		</div>
	</div>

	{{-- Content --}}
	<div class="max-w-[1000px] w-full h-full mx-auto px-5 pb-10">
		{{-- My Classes --}}
		<div class="mt-10">
			<h2 class="text-3xl font-semibold mb-4">My Classes</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 justify-between gap-4 gap-y-6">
				<a href="">
					<div
						class="p-4 border-2 rounded-md border-black border-opacity-20 shadow hover:scale-[1.05] active:scale-90 transition duration-200">
						<div class="w-full h-[150px] rounded overflow-hidden">
							<img src="{{ asset('img/tes-1.jpg') }}" class="w-full h-full object-cover object-center" alt="">
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

		{{-- == Calendar == --}}
		@include('partial.calendar')
		{{-- != Calendar =! --}}
	@endsection
