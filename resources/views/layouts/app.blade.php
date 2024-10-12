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


    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles for smooth transitions */
        #mobile-sidebar {
            transition: transform 0.3s ease-in-out;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')
        {{--
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset --}}

        <!-- Page Content -->
        <main>
            <!-- Toggle Button for Mobile Sidebar -->
            <button id="toggle-button" class="p-2 text-gray-800 md:hidden dark:text-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <div class="flex">
                <!-- Include Sidebar -->
                @include('layouts._sidebar')

                @yield('content')
            </div>


        </main>
    </div>

    @stack('js')
</body>

</html>
