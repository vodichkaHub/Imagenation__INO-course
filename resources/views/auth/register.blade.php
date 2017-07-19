@extends('layouts.default')
@section('title', 'Register')
    @section('content')
	<form action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
        	<h1>Sign up</h1>
            
            
            <h5 class="lb">Login</h5>
            <input type="text" class="form-control" value="{{ old('login') }}" name="login" required autofocus>

            @if ($errors->has('login'))
                <span class="error-block">
                    {{ $errors->first('login') }}
                </span>
            @endif

            <h5 class="lb">Password</h5>
            <input type="password" class="form-control" name="password" required>
            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>

            @if ($errors->has('password'))
                <span class="error-block">
                    {{ $errors->first('password') }}
                </span>
            @endif

            <h5 class="lb">Email</h5>
            <input type="text" class="form-control" value="{{ old('email') }}" name="email" required>

            @if ($errors->has('email'))
                <span class="error-block">
                    {{ $errors->first('email') }}
                </span>
            @endif

            <h5 class="lb">Name</h5>
            <input type="text" class="form-control" value="{{ old('name') }}" name="name">

            @if ($errors->has('name'))
                <span class="error-block">
                    {{ $errors->first('name') }}
                </span>
            @endif

            <h5 class="lb">Country</h5>
            <input type="text" class="form-control" value="{{ old('country') }}" name="country">

            @if ($errors->has('country'))
                <span class="error-block">
                    {{ $errors->first('country') }}
                </span>
            @endif

            <input type="submit" value="Sign up!" class="lb btn btn-primary">
      </div>
    </form>
    @show