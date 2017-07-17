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
            <label class="lb" >Login or email</label>
            <input name="email" id="input-login" type="text" class="form-control" placeholder="login/email" required>

            <label class="lb" >Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password" required>

            <div>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </div>
            <input type="submit" value="Sign in!" class="lb btn btn-primary" >
            <div>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
      </div>
    </form>
    @show