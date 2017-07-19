<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Account</title>
    </head>
    <body>
    @section('content')
        
    <div class="main">
        <h1>Profile</h1>
        <div class="main__avatar">
            @if (!empty($avatar)) 
               <img src="{{ URL::asset('img/avatars/' . $avatar) }}" class="home__avatar" alt="avatar">
            @else
                <img src="{{ URL::asset('img/avatars/DefaultAvatar.png') }}" class="home__avatar" alt="avatar">
            @endif
            <p>(Click on photo, if u going to reset this)</p>            <div class="main__avatar-button">
                {{--  <form action="{{ route('setAvatar') }}" method="post" enctype="multipart/form-data">  --}}
                    {{ csrf_field() }}
                    <input class="select" type="file" name="ava">
                    <input type="submit" class="btn btn-default" value="Set">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        </div>
        <div class="main__info">
            <ul class="ul">
                <li>Login: {{ session('login') }}</li><br>
                <li>Email: {{ session('email') }}</li><br>
                <li>Name: {{ session('name') }}</li><br>
                <li>Phone: {{ session('phone') }}</li><br>
                <li>Sex: {{ session('sex') }}</li><br>
            </ul>
        </div>
    </div>    
    @show
    </body>
</html>
