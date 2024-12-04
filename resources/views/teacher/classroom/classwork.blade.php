@extends('dashboard.user')
@section('content')
	@if (session()->has('update.class.success'))
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				successAlert("{{ session('update.class.success') }}")
			})
		</script>
	@endif
	@if (session()->has('add.material.success'))
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				successAlert("{{ session('add.material.success') }}")
			})
		</script>
	@endif
	@if (session()->has('delete.material'))
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				successAlert("{{ session('delete.material') }}")
			})
		</script>
	@endif
	@if (session()->has('update.material.success'))
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				successAlert("{{ session('update.material.success') }}")
			})
		</script>
	@endif

	<div class="sm:p-6 p-4 mb-8">
		<div class="max-w-5xl w-full bg-white mx-auto rounded-md">
			<div class="sm:p-7 p-5">
				<div class="flex items-center justify-between">
					<div class="flex items-center sm:gap-10 gap-5 sm:text-2xl text-lg font-bold text-[#757575]">
						<a href="{{ route('show.classwork', $classroom->id) }}"
							class="{{ str_contains(request()->path(), 'classwork') ? 'text-[#4A5B92] border-b-[3px] border-[#4A5B92]' : '' }}">
							Classwork
						</a>
						<a href="{{ route('show.classwork.people', $classroom->id) }}"
							class="{{ str_contains(request()->path(), 'people') ? 'text-[#4A5B92] border-b-[3px] border-[#4A5B92]' : '' }}">People</a>
					</div>
					<div>
						<form action="{{ route('delete.class', $classroom->id) }}" method="post" id="delete-class-form">
							@csrf
							@method('delete')
							<button type="submit"
								class="w-[40px] h-[40px] bg-[#D4DDF9] flex items-center justify-center rounded-full cursor-pointer">
								<i class="fa-regular fa-trash-can text-lg text-[#4A5B92]"></i>
							</button>
						</form>
					</div>
				</div>

				<div class="mt-7">
					<div class="flex md:flex-row flex-col gap-5">
						<div class="md:w-[250px] w-full md:h-[200px] sm:h-[300px] h-[250px] rounded-md overflow-hidden flex-shrink-0">
							<img class="w-full h-full object-cover" src="{{ Storage::url($classroom->thumbnail_class) }}" alt="">
						</div>
						<div>
							<h2 class="font-bold text-3xl">{{ $classroom->title }}</h2>
							<p class="font-semibold text-lg my-3">Kelas {{ $classroom->classToNumber() }}</p>
							<p class="font-semibold text-lg">{{ $classroom->teacher->fullname }}</p>
							<p class="mt-4">{{ $classroom->instructions }}</p>
						</div>
					</div>
					<div class="flex sm:text-xl text-base font-bold sm:gap-x-6 gap-x-2 my-6">
						<div class="relative">
							<button id="addContentButton"
								class="bg-[#A9BBF4] hover:bg-[#92a1d2] sm:w-[190px] sm:h-[50px] w-[130px] h-[40px] rounded-md">Add
								Content</button>
							<div id="dropdownAddContent"
								class="invisible flex sm:w-[200px] w-[150px] bg-white text-base font-medium text-[#757575] flex-col shadow-lg absolute bottom-[-100px]">
								<a href="{{ route('show.add.material.file', $classroom->id) }}"
									class="py-3 px-4 border-b hover:bg-slate-50">File</a>
								<a href="{{ route('show.add.material.video', $classroom->id) }}"
									class="py-3 px-4 border-t hover:bg-slate-50">Video</a>
							</div>
						</div>
						<a href="{{ route('show.update.class', $classroom->id) }}"
							class="bg-[#A9BBF4] hover:bg-[#92a1d2] sm:w-[190px] sm:h-[50px] w-[130px] h-[40px] rounded-md flex items-center justify-center">Update
							Class</a>
					</div>

					{{-- Material --}}
					<div class="flex flex-col gap-6">
						@php
							$videoCount = 1;
							$fileCount = 1;
						@endphp
						@forelse ($materials as $index => $material)
							@if (in_array($material->type, ['mp4', 'mkv']))
								<div class="w-full bg-[#e8e8e8] py-4 sm:px-10 px-4 flex items-center justify-between rounded-md">
									<div class="flex items-center gap-x-6">
										<i class="fa-solid fa-play text-4xl text-[#4A5B92]"></i>
										<p class="font-medium text-lg">Video {{ $videoCount }} - {{ $material->title }}</p>
										<?php $videoCount++; ?>
									</div>
									<div class="flex gap-2 sm:flex-row flex-col">
										<a href="{{ route('show.update.video.material', ['classroom' => $classroom, 'material' => $material]) }}"
											class="flex items-center justify-center w-[110px] h-[40px] bg-[#A9BBF4] hover:bg-[#92a1d2] font-bold text-lg rounded-md">Update</a>
										<form action="{{ route('delete.material', ['classroom' => $classroom, 'material' => $material]) }}"
											method="post" class="delete-material-form">
											@csrf
											@method('delete')
											<button
												class="w-[110px] h-[40px] bg-[#4A5B92] hover:bg-[#435284] font-bold text-lg rounded-md text-white">Delete</button>
										</form>
									</div>
								</div>
							@else
								<div class="w-full bg-[#e8e8e8] py-4 sm:px-10 px-4 flex items-center justify-between rounded-md">
									<div class="flex items-center gap-x-6">
										<i class="fa-regular fa-file text-4xl text-[#4A5B92]"></i>
										<p class="font-medium text-lg">Materi {{ $fileCount }} - {{ $material->title }}</p>
										<?php $fileCount++; ?>
									</div>
									<div class="flex gap-2 sm:flex-row flex-col">
										<a href="{{ route('show.update.file.material', ['classroom' => $classroom, 'material' => $material]) }}"
											class="flex items-center justify-center w-[110px] h-[40px] bg-[#A9BBF4] hover:bg-[#92a1d2] font-bold text-lg rounded-md">Update</a>
										<form action="{{ route('delete.material', ['classroom' => $classroom, 'material' => $material]) }}"
											method="post" class="delete-material-form">
											@csrf
											@method('delete')
											<button
												class="w-[110px] h-[40px] bg-[#4A5B92] hover:bg-[#435284] font-bold text-lg rounded-md text-white">Delete</button>
										</form>
									</div>
								</div>
							@endif
						@empty
							<div class="w-full bg-[#e8e8e8] py-4 sm:px-10 px-4 text-center rounded-md">
								No materials have beed added
							</div>
						@endforelse


					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
