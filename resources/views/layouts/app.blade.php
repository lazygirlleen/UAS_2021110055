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
                        <a href="{{ route('accounts.index') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Account</a>
                        <a href="{{ route('characters.index') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Character</a>
                        <a href="{{ route('weapons.index') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Weapon</a>
                        <a href="{{ route('artefacts.index') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Artefact</a>
                        <a href="{{ route('topups.create') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Topup</a>
                        <a href="{{ route('jokis.create') }}" class="text-gray-700 hover:text-green-house-100 overflow-hidden transform transition-transform hover:scale-105">Joki</a>
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
                    <div class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
