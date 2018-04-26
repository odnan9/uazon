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
    <link href="{{ asset('assets/styles/main.css') }}" rel="stylesheet">

    {{--{{ Html::script('uazon-cms/node_modules/angular2/bundles/angular2-polyfills.js') }}--}}
    {{--{{ Html::script('uazon-cms/node_modules/systemjs/dist/system.src.js') }}--}}
    {{--{{ Html::script('uazon-cms/node_modules/rxjs/bundles/Rx.js') }}--}}
    {{--{{ Html::script('uazon-cms/node_modules/angular2/bundles/angular2.js') }}--}}
    {{--{{ Html::script('uazon-cms/node_modules/@angular/router/router.d.ts') }}--}}
    {{--{{ Html::script('uazon-cms/node_modules/angular2/bundles/http.js') }}--}}

    {{--<script>--}}
        {{--System.config({--}}
            {{--packages: {--}}
                {{--'uazon-cms': {--}}
                    {{--format: 'register',--}}
                    {{--defaultExtension: 'ts'--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
        {{--System.import('app/main')--}}
            {{--.then(null, console.error.bind(console));--}}
    {{--</script>--}}
</head>

<body>
<uazon-cms>
    Cargando...
</uazon-cms>
</body>
</html>