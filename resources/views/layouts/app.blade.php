<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.3/dist/cdn.min.js" defer></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-violet font-oswald antialiased">
    <div id="app">
        <nav class="bg-teal text-white px-4 py-3 mb-10 shadow-md">
            <div class="container mx-auto flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}" class="text-xl font-semibold text-pink hover:text-blue font-oswald">
                        {{ config('Teyvat Nexus') }} Teyvat Nexus
                    </a>
                    @auth
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-pink overflow-hidden transform transition-transform hover:scale-105">Home</a>
                <a href="{{ route('accounts.index') }}" class="text-gray-700 hover:text-pink overflow-hidden transform transition-transform hover:scale-105">Account</a>
                <a href="{{ route('characters.index') }}" class="text-gray-700 hover:text-pink overflow-hidden transform transition-transform hover:scale-105">Character</a>
                <a href="{{ route('weapons.index') }}" class="text-gray-700 hover:text-pink overflow-hidden transform transition-transform hover:scale-105">Weapon</a>
                <a href="{{ route('artefacts.index') }}" class="text-gray-700 hover:text-pink overflow-hidden transform transition-transform hover:scale-105">Artefact</a>

                <div class="relative nav-item" x-data="{ openTopup: false }">
                    <a href="#" @click="openTopup = !openTopup" class="text-gray-700 hover:text-pink overflow-hidden transform transition-transform hover:scale-105">Top Up</a>
                    <div x-show="openTopup" class="absolute right-0 mt-2 w-48 bg-white text-teal rounded-md shadow-lg z-20"
                         x-transition:enter="transition ease-out duration-100 transform"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75 transform"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95">
                        <a href="{{ route('topups.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Request</a>
                        <a href="{{ route('topups.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Transaction</a>
                    </div>
                </div>

                <div class="relative nav-item" x-data="{ openJoki: false }">
                    <a href="#" @click="openJoki = !openJoki" class="text-gray-700 hover:text-pink overflow-hidden transform transition-transform hover:scale-105">Joki</a>
                    <div x-show="openJoki" class="absolute right-0 mt-2 w-48 bg-white text-teal rounded-md shadow-lg z-20"
                         x-transition:enter="transition ease-out duration-100 transform"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75 transform"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95">
                        <a href="{{ route('jokis.create') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Request</a>
                        <a href="{{ route('jokis.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Transaction</a>
                    </div>
                </div>
            @endauth
                </div>

                <div class="relative nav-item" x-data="{ open: false }">
                    <!-- Dropdown Toggle -->
                    @auth
                        <a @click="open = !open" @click.away="open = false"
                            class="nav-link cursor-pointer dropdown-toggle text-gray-800 hover:text-green-house-00 font-semibold"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <!-- Dropdown Menu -->
                        <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white text-green rounded-md shadow-lg z-20"
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95">

                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    @endauth
                </div>


                </div>
            </div>
        </nav>

        <main class="container mx-auto py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
