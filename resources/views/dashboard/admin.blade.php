@extends('components.layouts.layoutsDashboard')

@section('content')
<h1 class="text-2xl font-bold mb-8">Dashboard Content</h1>

<section class="flex justify-between">
    <div class="card bg-[#4A5B92] text-white">
        <div class="card-body flex flex-row items-center">
            <div class="flex flex-col items-center">
            <i class="fa-solid fa-book text-3xl"></i>
            <h2 class="text-xl">Murid</h2>
            </div>
            <div class="ml-auto"><p class="text-6xl">01</p></div>
        </div>
    </div>

<div class="card bg-[#4A5B92] text-white">
    <div class="card-body flex flex-row items-center">
        <div class="flex flex-col items-center">
        <i class="fa-solid fa-chalkboard-user text-3xl"></i>
        <h2 class="text-xl">Guru</h2>
        </div>
        <div class="ml-auto"><p class="text-6xl">01</p></div>
    </div>
</div>

<div class="card bg-[#4A5B92] text-white">
    <div class="card-body flex flex-row items-center">
        <div class="flex flex-col items-center">
        <i class="fa-solid fa-user-tie text-3xl"></i>
        <h2 class="text-xl">Admin</h2>
        </div>
        <div class="ml-auto"><p class="text-6xl">01</p></div>
    </div>
</div>
</section>
@endsection