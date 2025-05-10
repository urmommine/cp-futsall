<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ? "BUDI LANGGENG SPORT" }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-xl font-bold">Futsal Booking</a>
            <div>
                @auth
                <span class="text-white mr-4">Selamat datang, {{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}" class="text-white">Logout</a>
                @else
                <a href="{{ route('login') }}" class="text-white mr-4">Login</a>
                <a href="{{ route('register') }}" class="text-white">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8">
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>