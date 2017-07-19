<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="img/TRlogo.png" type="image/png"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="header">
            <img src="{{ URL::asset('img/TRlogo.png') }}" alt="logo" class="logo">
            <div class="header__nav">
            
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li class="header_nav-links"><a href="{{ route('login') }}">Login</a></li>
                        <li class="header_nav-links"><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                @if (!empty($avatar)) 
                                    <img src="{{ URL::asset('img/avatars/' . $avatar) }}" class="main__avatar" alt="avatar">
                                @else
                                    <img src="{{ URL::asset('img/avatars/DefaultAvatar.png') }}" class="main__avatar" alt="avatar">
                                @endif
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('account') }}">
                                        Account
                                    </a>
                                    <br>
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
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div>
        @yield('content')
        </div>
    </body>
</html>