@extends('dashboard.user')
@section('content')
	@if (session()->has('complete.profile'))
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				completeProfileAlert("{{ session('complete.profile') }}")
			})
		</script>
	@endif
	{{-- Jumbotron --}}
	<div id="jumbotron" class="w-full h-[40vh] flex items-center justify-center">
		<div class="w-full h-full bg-black bg-opacity-30 flex items-center justify-center ">
			<p
				class="text-center text-white font-semibold lg:leading-[60px] sm:leading-[50px] leading-[40px] lg:text-5xl sm:text-4xl text-3xl">
				Welcome,</br>{{ $student->fullname ?? 'Student' }}
			</p>
		</div>
	</div>

	{{-- Content --}}
	<div class="max-w-[1000px] w-full h-full mx-auto px-5 pb-10">
		{{-- My Classes --}}
		<div class="mt-10">
			<h2 class="text-3xl font-bold mb-4">My Classes</h2>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 justify-between gap-4 gap-y-6">
				@forelse ($enrolledClass as $class)
					<a href="{{ route('student.classwork', $class) }}">
						<div
							class="p-4 border-2 rounded-md border-black border-opacity-20 shadow hover:scale-[1.05] active:scale-90 transition duration-200">
							<div class="w-full h-[150px] rounded overflow-hidden">
								<img src="{{ Storage::url($class->thumbnail_class) }}" class="w-full h-full object-cover object-center"
									alt="">
							</div>
							<h3 class="text-2xl font-semibold mt-5">{{ $class->title }}</h3>
							<h5 class="text-sm mb-3">{{ $class->teacher->fullname }}</h5>
							<div class="flex items-center justify-start gap-2">
								<div class="{{ $class->colorIconClass() }} w-[25px] h-[25px] rounded-full flex items-center justify-center">
									<i class="fa-solid fa-book-open text-[13px]"></i>
								</div>
								<p class="text-sm">Kelas {{ Str::upper($class->class) }}</p>
							</div>
						</div>
					</a>
				@empty
				@endforelse
			</div>

		</div>

		{{-- Upcoming Assignments --}}
		<div class="mt-10">
			<h2 class="text-3xl font-bold mb-4">Upcoming Assignments</h2>

			{{-- <div class="w-full flex flex-wrap gap-3">
				<a href="#"
					class="w-full sm:h-[100px] h-[80px] flex items-center justify-start px-[20px] sm:px-[30px] gap-4 border-2 border-black border-opacity-20 shadow rounded-md hover:bg-slate-300 transition">
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
			</div> --}}

		</div>

		{{-- == Calendar == --}}
		@include('partial.calendar')
		{{-- != Calendar =! --}}
	@endsection
