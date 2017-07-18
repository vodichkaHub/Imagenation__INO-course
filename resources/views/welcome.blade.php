<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="{{ URL::asset('css/welcome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css') }}" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <title>Imagenation</title>
</head>
<body>
    <div class="logo">
        <img src="{{ URL::asset('img/TRlogo-2.png') }}" alt="logo" class="logo">
    </div>
    <div class="links">
        <a href="{{ route('login') }}" class="bl" role="button">login</a>
        <a href="{{ route('register') }}" class="bl" role="button">Registration</a>
    </div>
    <div class="description">
        <p class="description-text">Welcome to photobank<br> We call yourself Imagenation<br> Throw all the thoughts, which disturb you and<br> enjoy the beautiful works of talanted photographers<br> from worldwide!</p>
    </div>
    <div class="button-go">
        <a href="{{ route('home') }}" class="go">Touch<img src="{{ URL::asset('img/arrow-right-outlined-angle.png') }}" alt="alt" class="angle"></a>
   </div>
</body>
</html>

 