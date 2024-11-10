<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-green-house-50 font-sans antialiased">
    <div id="app">
        <nav class="bg-green text-white px-4 py-3 mb-10 shadow-md">
            <div class="container mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-800 hover:text-blue-600">
                        {{ config('Teyvat Nexus') }} Teyvat Nexus
                    </a>
                    @auth
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-house-100  overflow-hidden transform transition-transform hover:scale-105">Home</a>
                        <a href="{{ route('accounts.create') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Account</a>
                        <a href="{{ route('characters.index') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Character</a>
                        <a href="{{ route('weapons.index') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Weapon</a>
                        <a href="{{ route('topups.create') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Topup</a>
                    @endauth
                </div>

                <div class="flex items-center space-x-4">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600">Register</a>
                        @endif
                    @else
                        <div class="relative">
                            <button class="flex items-center text-gray-700 hover:text-blue-600 focus:outline-none">
                                {{ Auth::user()->name }}
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06 0L10 10.92l3.71-3.71a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 010-1.06z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-10 hidden">
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="container mx-auto py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
