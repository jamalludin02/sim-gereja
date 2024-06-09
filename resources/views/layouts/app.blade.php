<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Roboto" rel="stylesheet">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="{{ asset('/custom/css/styles.css') }}" rel="stylesheet">
    <!-- Scripts -->
    {{-- @vite(['resources/js/app.js', 'resources/css/app.css']) --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    {{-- CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('public/custom/css/style.css') }}"> --}}
</head>

<body class="sb-nav-fixed">
    <div id="app" style="height: 100%">
        @yield('content')
    </div>
    <script src="{{ asset('custom/js/scripts.js') }}"></script>
    @stack('scripts')
</body>

</html>
