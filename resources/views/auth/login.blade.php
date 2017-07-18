@extends('layouts.default')
    @section('content')
    <form action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <h1>Sign in</h1>

           @if ($errors->any())
                <div class="alert alert-info">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h5 class="lb" >Login</h5>
            <input name="login" id="input-login" type="text" class="form-control" required autofocus>

            <h5 class="lb" >Password</h5>
            <input name="password" type="password" class="form-control" required>

            <div>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </div>
            <div>
                <input type="submit" value="Sign in!" class="lb btn btn-primary" >
            </div>
            <div><a href="{{ route('register') }}">Registration</a></div>
            <div>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
      </div>
    </form>
@show