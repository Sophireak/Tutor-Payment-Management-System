<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Tutor Payment Management System') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100" x-data="{ sidebarOpen: false }">
        <div class="min-h-screen">
            {{-- Desktop sidebar (hidden below the `lg` breakpoint) --}}
            <aside class="fixed inset-y-0 left-0 z-40 hidden w-64 flex-col border-r border-gray-200 bg-white lg:flex">
                @include('layouts.partials.sidebar-content')
            </aside>

            {{-- Mobile sidebar (slide-in drawer) --}}
            <div
                x-cloak
                x-show="sidebarOpen"
                x-transition.opacity
                class="fixed inset-0 z-30 bg-gray-900/50 lg:hidden"
                @click="sidebarOpen = false"
            ></div>

            <aside
                x-cloak
                x-show="sidebarOpen"
                x-transition:enter="transition ease-in-out duration-200"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-150"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col border-r border-gray-200 bg-white lg:hidden"
                @click.outside="sidebarOpen = false"
            >
                @include('layouts.partials.sidebar-content')
            </aside>

            {{-- Main column --}}
            <div class="flex min-h-screen flex-col lg:pl-64">
                @include('layouts.partials.topbar')

                <main class="flex-1 px-4 py-8 sm:px-6 lg:px-8">
                    <div class="mx-auto max-w-7xl">
                        @isset($header)
                            <div class="mb-6">
                                {{ $header }}
                            </div>
                        @endisset

                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>

        @stack('scripts')
    </body>
</html>
