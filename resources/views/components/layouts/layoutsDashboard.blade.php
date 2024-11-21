<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Admin|Dashboard</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">
</head>
<body>
    <x-navbar>
        @section('nav')
        <div id="navbar-left" class="flex items-center transition-all duration-300">
            <button class="text-2xl px-4 cursor-pointer text-slate-600" onclick="toggleSidebar()">☰</button>
            <a class="navbar-item text-lg font-semibold text-slate-500">LMS</a>
        </div>
        @endsection
    </x-navbar>
    <x-sidebar>{{ $title }}</x-sidebar>



    <div id="main-content" class="p-4 transition-all duration-300">
        @yield('content')
    </div>
    
    

    <script>
       function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        const navbarLeft = document.getElementById("navbar-left");
        const mainContent = document.getElementById("main-content");
        
        sidebar.classList.toggle("-translate-x-full"); // Show/hide sidebar

        if (!sidebar.classList.contains("-translate-x-full")) {
            navbarLeft.style.marginLeft = "300px";
            mainContent.style.marginLeft = "300px"; // Geser konten utama
        } else {
            navbarLeft.style.marginLeft = "0";
            mainContent.style.marginLeft = "0"; // Kembalikan konten utama ke posisi awal
        }
    }
    </script>
</body>
</html>