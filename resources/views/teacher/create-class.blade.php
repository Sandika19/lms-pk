@extends('dashboard.user')

@section('content')
	<div class="p-6 mb-10">
		<div class="max-w-5xl w-full bg-white mx-auto rounded-md">
			<div class="pt-7">
				<h2 class="text-3xl font-bold mb-10 text-center">Create Class</h2>

				<form action="{{ route('create.class') }}" method="post" class="px-7 text-xl" enctype="multipart/form-data"
					id="create-class-form">
					@csrf
					<div class="flex flex-col gap-y-8">
						<div class="flex flex-col justify-center gap-3 relative">
							<label class="px-3 font-medium text-[#414141] text-opacity-50" for="title">Title<span
									class="text-red-500">*</span></label>
							<input id="title" name="title" type="text" placeholder="Type your class title here..."
								class="w-full py-4 px-3 text-[#414141] text-opacity-50 bg-[#e8e8e8] focus:outline-none rounded-md" required>
							@error('title')
								<div class="text-red-600 text-xs absolute bottom-[-20px]">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="flex flex-col justify-center gap-3 relative">
							<label class="px-3 font-medium text-[#414141] text-opacity-50" for="class">Class<span
									class="text-red-500">*</span></label>
							<div class="bg-[#e8e8e8] w-full rounded-md relative overflow-hidden">
								<i
									class="fa-solid fa-sort-down absolute right-[12px] text-[#414141] text-opacity-50 top-1/2 translate-y-[-70%]"></i>
								<select name="class" id="class" required
									class="w-full py-4 px-3 appearance-none bg-transparent outline-none text-[#414141] text-opacity-50">
									<option value="" selected disabled>Choose the class level</option>
									<option value="x">X</option>
									<option value="xi">XI</option>
									<option value="xii">XII</option>
								</select>
								@error('class')
									<div class="text-red-600 text-xs absolute bottom-[-20px]">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						<div class="flex flex-col justify-center gap-3 relative">
							<label class="px-3 font-medium text-[#414141] text-opacity-50" for="thumbnail_class">Select Thumbnail<span
									class="text-red-500">*</span></label>
							<input id="thumbnail_class" name="thumbnail_class" type="file"
								class="w-full py-4 px-3 text-[#414141] text-opacity-50 bg-[#e8e8e8] focus:outline-none rounded-md" required>
							@error('thumbnail_class')
								<div class="text-red-600 text-xs absolute bottom-[-20px]">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="flex flex-col justify-center gap-3 relative">
							<label class="px-3 font-medium text-[#414141] text-opacity-50" for="instructions">Instructions (optional)</label>
							<textarea name="instructions" id="instructions" cols="30" rows="10"
							 placeholder="Type your class instructions here..."
							 class="resize-none p-3 border rounded-md bg-[#e8e8e8] text-[#414141] focus:outline-none"></textarea>
							@error('instructions')
								<div class="text-red-600 text-xs absolute bottom-[-20px]">
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>

					<button type="submit"
						class="w-full py-4 bg-[#4A5B92] hover:bg-[#3f4e7c] text-xl font-semibold my-10 text-white rounded-md">Create
						Class</button>
				</form>
			</div>
		</div>
	</div>
@endsection
