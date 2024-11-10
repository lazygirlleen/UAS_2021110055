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
            *:not([hidden]) { box-sizing: border-box; }
            body { font-family: Figtree, ui-sans-serif, system-ui, sans-serif; margin: 0; line-height: 1.5; }
            a { color: inherit; text-decoration: none; }
            .min-h-screen { min-height: 100vh; }
            .bg-gray-100 { background-color: #f7fafc; }
            .text-black { color: #000; }
            .text-white { color: #fff; }
            .rounded-md { border-radius: 0.375rem; }
            .transition { transition: color 150ms, background-color 150ms, border-color 150ms; }
            .hover\:text-black\/70:hover { color: rgba(0, 0, 0, 0.7); }
            /* Additional styles omitted for brevity */
        </style>
    @endif
</head>

<body class="font-sans antialiased dark:bg-green-house-100 dark:text-white/50">
    <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="{{ url('/home') }}" class="mt-3 text-white hover:text-green overflow-hidden transform transition-transform hover:scale-105">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-5 bg-white rounded-lg shadow-md">
                        <class="py-20" style="background: linear-gradient(90deg, #667eea 0%, #764ba2 100%)">
                        <div class="container mx-auto px-6">
                            <h2 class="text-4xl font-bold mb-2 text-green">
                                Welcome to Teyvat Nexus
                            </h2>
                            <h3 class="text-2xl mb-8 text-green">
                            You can see various Genshin character, weapon recommendation, artefact recommendation, and in game transactions
                            </h3>

                            <button class="w-full py-2 px-4 bg-green text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">
                            Learn More
                            </button>
                        </div>
                        </div>
        </div>
    </div>
</body>
</html>
