<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Uazon') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/styles/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            @include('common.header')
        </header>

        <!-- Main Content -->
        <main>
            @yield('content')

            <?php //include_once 'reviews/index.php' ?>
            @stack('list')
        </main>

        <!-- Main Footer -->
        <footer>
            @include('common.footer')
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
