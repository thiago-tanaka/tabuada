<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            /* background-image: url("unnamed.jpg"); */
            /* background: rgb(0, 0, 0); */
            /* background: rgba(0, 0, 0, 0.1); */
        }

        .backgrounds{
            z-index:-1;
            position:absolute;
            left:0;
            top:0;
            background-image: url('back{{ rand(1,16) }}.jpg');
            background-repeat: repeat;
            opacity:0.2;
            width: 100%;
            height: 100%;
            background-size: contain;
        }
        *{
            padding: 0px;
            margin: 0px;
        }
    </style>
</head>

<body>
    <div id="app" class="h-100 p-0 m-0">
        <div class="backgrounds"></div>
        {{-- <img src="s.jpg" class="backgrounds" alt=""> --}}
        <main class=" ">
            @yield('content')
        </main>
    </div>
</body>

</html>