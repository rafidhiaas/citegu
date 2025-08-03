<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'CITEGU') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="min-h-screen flex">
        @include('layouts.sidebar')

        <div class="flex-1 flex flex-col">
            @include('layouts.navigation')

            @hasSection('header')
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>
            @endif

            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                <div class="py-12">
                    {{-- DIV INI YANG DIUBAH --}}
                    {{-- Hapus kelas max-w-7xl mx-auto sm:px-6 lg:px-8 --}}
                    <div class="px-6"> 
                        @if(session('success'))
                            <div class="p-3 mb-4 text-sm text-emerald-100 bg-emerald-600 rounded-lg dark:bg-emerald-700 dark:text-emerald-100" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="p-3 mb-4 text-sm text-red-100 bg-red-600 rounded-lg dark:bg-red-700 dark:text-red-100" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>