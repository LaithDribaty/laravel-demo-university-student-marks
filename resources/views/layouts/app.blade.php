<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title> {{ config('app.name', 'marks') }}  </title>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Grandstander:wght@200&display=swap);
        body, button {
            font-family: 'Grandstander', cursive;
        }
        p {
            font-family: 'Grandstander', cursive;
            line-height: 1.4em;
        }
        .main {
            padding-top : 50px;
            padding-bottom : 50px;
        }
        @yield('css')
    </style>
    @yield('header')
</head>
<body>
    @include('inc.header')

    <div class="container main">
        @yield('content')
    </div>
    @yield('aboutmain')
    @include('inc.footer')
    <script>
        @yield('java')
    </script>
</body>
</html>