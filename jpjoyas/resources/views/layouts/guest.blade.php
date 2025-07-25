<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-rich-text::styles theme="richtextlaravel" data-turbo-track="false" />
</head>

<body class="font-sans antialiased bg-fixed bg-no-repeat bg-top bg-black" style="background-image: url('/images/fondo-jpjoyas.jpg');">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-black/40 backdrop-blur-md">
        

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white/80 backdrop-blur-md shadow-lg ring-1 ring-gray-300/30 rounded-lg">
            <div>
                <a href="/">
                    <x-application-logo class="block h-36 w-auto fill-current text-gray-100" />
                </a>
            </div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
