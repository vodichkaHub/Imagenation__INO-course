<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ URL::asset('img/TRlogo.png') }}" rel="shortcut icon" type="image/png"> 
        <link href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Indie+Flower') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Indie+Flower') }}" rel="stylesheet">

        <script src="{{ URL::asset('https://code.jquery.com/jquery-3.1.1.slim.min.js') }}" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js') }}" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js') }}" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
        <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ URL::asset('js/tuupola-jquery_lazyload-2cfbdb5/jquery.lazyload.min.js') }}"></script>
        <script src="{{ URL::asset('js/add-to-cart.js') }}"></script>
        
        
        <title>Imagenation/@yield('title')</title>
    </head>
    <body>
        <div class="header">
            <span id="up"></span>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-2">
                        <a href="{{ route('home') }}"><img src="{{ URL::asset('img/TRlogo.png') }}" alt="logo" class="logo"></a>
                    </div>
                    <div class="col-md-5">
                        @yield('addition')
                    </div>
                    <div class="col-md-1">
                        <a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-2">
                        <div class="header__nav">
                        
                            <ul class="nav navbar-nav navbar-right">
                                @if (Auth::guest())
                                    <li class="header_nav-links"><a href="{{ route('login') }}">Login</a></li>
                                    <li class="header_nav-links"><a href="{{ route('register') }}">Register</a></li>
                                @else
                                
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        @if (file_exists(public_path() . '/img/avatars/' . Auth::user()->id . '.jpeg')) 
                                            <img src="{{ URL::asset('img/avatars/' . Auth::user()->id . '.jpeg') }}" class="small__avatar" alt="avatar">
                                        @else
                                            <img src="{{ URL::asset('img/avatars/DefaultAvatar.png') }}" class="small__avatar" alt="avatar">
                                        @endif
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                @if(Auth::user()->login == 'admin')
                                                    <a href="{{ route('admin') }}">
                                                        Account
                                                    </a>
                                                @else
                                                    <a href="{{ route('account') }}">
                                                        Account
                                                    </a>
                                                @endif
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
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    <div>
        @yield('h2')
        @yield('content')
    </div>
    </body>
</html>
