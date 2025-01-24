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
    </head>
    <body class="font-sans antialiased">
        <div class="h-auto w-auto bg-gray-50 text-sm md:text-md">
            @include('layouts.navigation')


            <!-- Page Heading -->
            @isset($header)
            <div class="flex flex-col md:flex-row h-full">
                <!-- Sidebar Header -->
                <div class="w-full md:w-40 h-auto md:h-full bg-indigo-900 text-white text-xs font-light fixed top-16 p-4  z-20 md:z-100">
                    {{ $header }}
                </div>
            @endisset

            <!-- Main Content -->
            <div class=" bg-gray-50">
                <div class="max-w-7xl py-6 px-1 sm:px-6 lg:px-8 m-0 md:ml-40 mt-28 md:mt-20">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
