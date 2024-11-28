<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Custom Tailwind CSS Styles */
            *:not([hidden]) {
                box-sizing: border-box;
            }
            body {
                font-family: Figtree, ui-sans-serif, system-ui, sans-serif;
                margin: 0;
                line-height: 1.5;
            }
            a {
                color: inherit;
                text-decoration: none;
            }
            .min-h-screen {
                min-height: 100vh;
            }
            .bg-teal {
                background-color: #38b2ac;
            }
            .text-blue {
                color: #3182ce;
            }
            .text-pink {
                color: #FFCFEF;
            }
            .text-green-600 {
                color: #48bb78;
            }
            .text-white {
                color: #fff;
            }
            .rounded-md {
                border-radius: 0.375rem;
            }
            .transition {
                transition: color 150ms, background-color 150ms, border-color 150ms;
            }
            .hover\:text-green-300:hover {
                color: #68d391;
            }
            .container {
                max-width: 1280px;
                margin: 0 auto;
            }
        </style>
    @endif
</head>
<body>

<!-- Navigation Bar -->
<nav class="bg-teal text-blue px-4 py-3 mb-10 shadow-md">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <span class="ml-3 text-xl font-semibold text-blue">Teyvat Nexus</span>
        </div>

        <!-- Navbar links -->
        @if (Route::has('login'))
            <nav class="flex items-center space-x-6">
                @auth
                    <a href="{{ url('/home') }}" class="text-blue hover:text-pink">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-3 py-2 text-blue hover:text-pink">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-3 py-2 text-blue hover:text-pink">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</nav>

<!-- Main Content Section -->
<section class="text-gray-700 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <!-- Text Section -->
        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
            <h2 class="text-4xl font-bold mb-2 text-pink">
                Welcome to Teyvat Nexus
            </h2>
            <h3 class="text-2xl mb-8 text-teal">
                Explore various Genshin characters, weapon recommendations, artifact suggestions, and in-game transactions.
            </h3>
        </div>

        <!-- Image Section -->
        <div class="w-full md:w-1/2">
            <img class="rounded-lg" src="{{ asset('storage/genshin.jpg') }}" alt="Genshin Image">
        </div>
    </div>
</section>

</body>
</html>
