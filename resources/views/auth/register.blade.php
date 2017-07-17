@extends('layouts.default')
    @section('content')
	<form action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
        	<h1>Sign up</h1>
            
            
            <label class="lb">Login</label>
            <input type="text" class="form-control" placeholder="login" value="{{ old('login') }}" name="login" required>

            @if ($errors->has('login'))
                <span class="error-block">
                    <strong>{{ $errors->first('login') }}</strong>
                </span>
            @endif

            <label class="lb">Password</label>
            <input type="password" class="form-control" placeholder="password" name="password" required>
            <input type="password" class="form-control" placeholder="password" name="password_confirmation" id="password-confirm" required>

            @if ($errors->has('password'))
                <span class="error-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <label class="lb">Email</label>
            <input type="text" class="form-control" placeholder="email" value="{{ old('email') }}" name="email" required>

            @if ($errors->has('email'))
                <span class="error-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <label class="lb">Your first and last name</label>
            <input type="text" class="form-control" placeholder="name surname" value="{{ old('name') }}" name="name">

            @if ($errors->has('name'))
                <span class="error-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            <label class="lb">Country</label>
            <input type="text" class="form-control" value="{{ old('country') }}" name="country">

            @if ($errors->has('country'))
                <span class="error-block">
                    <strong>{{ $errors->first('country') }}</strong>
                </span>
            @endif

            <input type="submit" value="Sign up!" class="lb btn btn-primary">
      </div>
    </form>
    @show