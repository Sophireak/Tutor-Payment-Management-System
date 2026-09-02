<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Tutor Payment Management System') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50">
        <div class="flex min-h-screen flex-col items-center justify-center px-4 py-16">
            <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-600 text-white shadow-lg shadow-indigo-600/20">
                <x-icon name="logo" class="h-7 w-7" />
            </span>

            <h1 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Tutor Payment Management System
            </h1>

            <p class="mt-3 max-w-md text-center text-gray-600">
                Manage your tutoring students and track their monthly tuition payments in one simple place.
            </p>

            <div class="mt-8 flex flex-col items-center gap-3 sm:flex-row">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                       class="inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </body>
</html>
