<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="img/TRlogo.png" rel="shortcut icon" type="image/png"> 
        <link href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="{{ URL::asset('css/default.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Indie+Flower') }}" rel="stylesheet">
        
        <title>Imagenation/@yield('title')</title>
    </head>
    <body>
        <a href="{{ route('home') }}"><img src="{{ URL::asset('img/TRlogo.png') }}" alt="logo" class="logo"></a>
        @yield('content')
    </body>
</html>