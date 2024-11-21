@extends('components.layouts.layoutsDashboard')

@section('content')
<div class="m-auto card p-8 mt-8">
<h2 class="text-center text-slate-600 text-2xl mb-4">Tambah Siswa</h2>
<div class="relative mb-4">
    <i class="fa-solid fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
    <input name="name" class="pl-10 border border-gray-300 rounded-lg py-2 w-full" placeholder="Nama">
</div>
<div class="relative mb-4">
    <i class="fa-solid fa-circle-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
    <input name="username" class="pl-10 border border-gray-300 rounded-lg py-2 w-full" placeholder="Username">
</div>
<div class="relative mb-4">
    <i class="fa-solid fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
    <input name="email" class="pl-10 border border-gray-300 rounded-lg py-2 w-full" placeholder="Email">
</div>
<div class="relative mb-4">
    <i class="fa-solid fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
    <input name="password" class="pl-10 border border-gray-300 rounded-lg py-2 w-full" placeholder="Password">
</div>
<div class="relative mb-4">
    <i class="fa-solid fa-address-book absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
    <input name="role" class="pl-10 border border-gray-300 rounded-lg py-2 w-full" placeholder="Role">
</div>
</div>



@endsection