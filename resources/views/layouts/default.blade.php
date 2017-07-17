<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css') }}" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
        <link href="css/fonts/Fresca-Regular.ttf" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        
        <title>Account</title>
    </head>
    <body>
        <img src="{{ URL::asset('img/logo.png') }}" alt="logo" class="logo">
        @section('guets')
            @if (Auth::guest())
                <a class="guets-bar" href="{{ route('login') }}"></a>
                <a class="guets-bar" href="{{ route('register') }}"></a>
            @else
                <a href="#" class="dropdown__user-bar" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown__user-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            @endif
        @show
    </body>
</html>