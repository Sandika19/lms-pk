@extends('dashboard.user')
@section('content')
	@if (session()->has('success.enrollment'))
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				successAlert("{{ session('success.enrollment') }}")
			})
		</script>
	@endif
	@if (session()->has('reject.enrollment'))
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				rejectAlert("{{ session('reject.enrollment') }}")
			})
		</script>
	@endif

	<div class="max-w-[1000px] px-5 pb-10 w-full mx-auto">
		{{-- My Classes --}}
		<div class="my-10">
			<div class="mb-12">
				<h2 class="text-3xl mb-4 font-bold">Select Major</h2>
				<hr class="h-0.5 w-full bg-black mb-8">

				<div class="flex flex-col justify-center gap-3 relative">
					<div class="w-full rounded-md relative overflow-hidden">
						<i
							class="fa-solid fa-sort-down absolute right-[12px] text-[#414141] text-opacity-50 top-1/2 translate-y-[-70%]"></i>
						<select name="major" id="major-select-class"
							class="w-full bg-[#f5f5f5] py-4 pl-3 pr-7 appearance-none outline-none text-[#414141] text-xl font-medium text-opacity-50 overflow-hidden text-ellipsis">
							<option value="" disabled selected>Select Major</option>
							<option value="pplg" {{ request()->query('major') === 'pplg' ? 'selected' : '' }}>PENGEMBANGAN PERANGKAT LUNAK
								DAN GIM</option>
							<option value="dkv" {{ request()->query('major') === 'dkv' ? 'selected' : '' }}>DESAIN KOMUNIKASI VISUAL
							</option>
							<option value="akl" {{ request()->query('major') === 'akl' ? 'selected' : '' }}>AKUNTANSI DAN KEUANGAN LEMBAGA
							</option>
							<option value="bdp" {{ request()->query('major') === 'bdp' ? 'selected' : '' }}>BISNIS DARING DAN PEMASARAN
							</option>
							<option value="otkp" {{ request()->query('major') === 'otkp' ? 'selected' : '' }}>OTOMATISASI DAN TATA KELOLA
								PERKANTORAN</option>
						</select>
						@error('major')
							<div class="text-red-600 text-xs absolute bottom-[-20px]">
								{{ $message }}
							</div>
						@enderror
					</div>
				</div>
			</div>

			{{-- Container --}}
			<div id="container-course" class="{{ request()->query() ? '' : 'hidden' }}">
				<h2 class="text-3xl mb-4 font-bold">Select Class</h2>
				<hr class="h-0.5 w-full bg-black mb-9">

				<div>
					<div class="flex justify-between items-center gap-3 mb-10">
						<div class="text-center font-bold text-xl flex-1 rounded-md overflow-hidden">
							<input type="radio" name="level" id="level-x" class="hidden peer" value="x"
								{{ request()->query('level') === 'x' ? 'checked' : '' }}>
							<label for="level-x"
								class="py-3 w-full bg-[#A9BBF4] block cursor-pointer peer-checked:bg-[#4A5B92] peer-checked:text-white">X
								{{ Str::upper(request()->query('major')) }}</label>
						</div>
						<div class="text-center font-bold text-xl flex-1 rounded-md overflow-hidden">
							<input type="radio" name="level" id="level-xi" class="hidden peer" value="xi"
								{{ request()->query('level') === 'xi' ? 'checked' : '' }}>
							<label for="level-xi"
								class="py-3 w-full bg-[#A9BBF4] block cursor-pointer peer-checked:bg-[#4A5B92] peer-checked:text-white">XI
								{{ Str::upper(request()->query('major')) }}</label>
						</div>
						<div class="text-center font-bold text-xl flex-1 rounded-md overflow-hidden">
							<input type="radio" name="level" id="level-xii" class="hidden peer" value="xii"
								{{ request()->query('level') === 'xii' ? 'checked' : '' }}>
							<label for="level-xii"
								class="py-3 w-full bg-[#A9BBF4] block cursor-pointer peer-checked:bg-[#4A5B92] peer-checked:text-white">XII
								{{ Str::upper(request()->query('major')) }}</label>
						</div>
					</div>
					<div id="course-container" class="mt-6 relative">
						<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 justify-between gap-4 gap-y-6">
							@forelse ($classes as $class)
								<div class="p-4 border-2 rounded-md border-black border-opacity-20 shadow">
									<div class="w-full h-[150px] rounded overflow-hidden mb-3">
										<img src="{{ Storage::url($class->thumbnail_class) }}" class="w-full h-full object-cover object-center"
											alt="">
									</div>
									<h3 class="text-2xl font-semibold mb-1">{{ $class->title }}</h3>
									<h5 class="text-sm mb-2">{{ $class->teacher->fullname }}</h5>
									<div class="flex items-center justify-start gap-2 mb-4">
										<div class="{{ $class->colorIconClass() }} size-[25px] rounded-full flex items-center justify-center">
											<i class="fa-solid fa-book-open text-[13px]"></i>
										</div>
										<p class="text-sm">Kelas {{ $class->classToNumber() }}</p>
									</div>
									<form action="{{ route('student.class.enrollment', $class) }}" method="POST" class="enroll-form">
										@csrf
										<button type="submit"
											class="font-bold text-xl bg-[#A9BBF4] w-full py-3 rounded-md hover:bg-[#4A5B92] hover:text-white">
											Enroll Class
										</button>
									</form>
								</div>
							@empty
								<p class="text-center grid col-span-full">No class available.</p>
							@endforelse


						</div>
					</div>

				</div>
			</div>
		</div>
	</div>


	<script></script>
@endsection
