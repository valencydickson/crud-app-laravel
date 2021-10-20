<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <header class="container mx-auto flex justify-between items-center p-5 bg-gray-100">
        <h1 class="text-2xl font-semibold"><a href="{{url('/')}}">Products</a></h1>
        <nav class="flex justify-end">
            @if(Route::has("login"))

            @auth
            <a href="{{url('/dashboard')}}" class="pl-4">Dashboard</a>
            <a href="{{ route('logout') }}" class="pl-4"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            @else
            <a href="{{route('login')}}" class="pl-4">Login</a>

            @if(Route::has("register"))
            <a href="{{route('register')}}" class="pl-4">Register</a>
            @endif

            @endauth
            @endif
        </nav>
    </header>

    <main class="container mx-auto px-5 py-12">
        {{ $slot }}
    </main>
</body>

</html>