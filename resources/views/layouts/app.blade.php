<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('common.meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Uazon') }}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/styles/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles/third_party.css') }}" rel="stylesheet"><z></z>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/scripts/owl.carousel.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  </head>
  <body>
    <!-- Main Header -->
    <header>
      @include('common.header')
    </header>

    <!-- Main Content -->
    <main>
      @yield('content')
    </main>

    <!-- Main Footer -->
    <footer>
      @include('common.footer')
    </footer>

    <!-- Scripts -->
    <script src="assets/scripts/jquery.sliderPro.min.js"></script>
    <script src="assets/scripts/jquery.min.js"></script>
  </body>
</html>
