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
    @vite(['resources/css/app.css'])

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')
        @if (session()->has('success'))
            <x-alert class="my-3 alert-success w-[35rem] ml-5">
                {{ session()->get('success') }}
            </x-alert>
        @endif
        <main class=" px-36 py-5">
            {{ $slot }}
        </main>
    </div>
</body>


@stack('bottom-stack')

</html>
