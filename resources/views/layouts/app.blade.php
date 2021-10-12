<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
        @stack('styles')

        <!-- Scripts -->
        @livewireScripts
        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('scripts')
    </head>

    <body class="antialiased font-sans">
        @if(in_array(Route::currentRouteName(), ['login', 'register']))
            <div class="bg-cover" style="background-image: url({{ asset('storage/wallpaper.jpg') }})">
                @yield('content')
            </div>
        @else
            @if(auth()->check())
                @include('layouts.navigation.navbar.admin')
                @include('layouts.navigation.sidebar')
            @else
                @include('layouts.navigation.navbar.guest')
            @endif

            <main class="block float-right" id="container">
                @includeWhen(auth()->check(), 'layouts.templates.admin')
                @includeUnless(auth()->check(), 'layouts.templates.guest')
            </main>
                @includeWhen(auth()->check(), 'layouts.footer.admin')
                @includeUnless(auth()->check(), 'layouts.footer.guest')
        @endif
    </body>
</html>
