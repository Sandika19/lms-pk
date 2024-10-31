<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">

    @vite('resources/css/app.css')
</head>
<body >
    <x-navbar>
        
        @section('nav')
        <div class="navbar-start">
            <i class="fa-solid fa-school"></i>
        </div>
        @endsection
    </x-navbar>

        @yield('content')

</body>
</html>