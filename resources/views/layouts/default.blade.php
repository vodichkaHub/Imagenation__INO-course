<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="img/TRlogo.png" type="image/png"> 
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css') }}" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/default.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        
        <title>Imagenation</title>
    </head>
    <body>
        <img src="{{ URL::asset('img/TRlogo.png') }}" alt="logo" class="logo">
    </body>
</html>