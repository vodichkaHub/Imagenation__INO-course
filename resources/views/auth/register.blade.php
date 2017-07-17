@extends('layouts.default')
    @section('content')
	<form action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
        	<h1>Sign up</h1>
            
            
            <label class="lb">Login</label>
            <input type="text" class="form-control" placeholder="Login" value="{{ old('login') }}" name="login" required>

            @if ($errors->has('login'))
                <span class="error-block">
                    {{ $errors->first('login') }}
                </span>
            @endif

            <label class="lb">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" id="password-confirm" required>

            @if ($errors->has('password'))
                <span class="error-block">
                    {{ $errors->first('password') }}
                </span>
            @endif

            <label class="lb">Email</label>
            <input type="text" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" required>

            @if ($errors->has('email'))
                <span class="error-block">
                    {{ $errors->first('email') }}
                </span>
            @endif

            <label class="lb">Name</label>
            <input type="text" class="form-control" placeholder="Name Surname" value="{{ old('name') }}" name="name">

            @if ($errors->has('name'))
                <span class="error-block">
                    {{ $errors->first('name') }}
                </span>
            @endif

            <label class="lb">Country</label>
            <input type="text" class="form-control" placeholder="Country" value="{{ old('country') }}" name="country">

            @if ($errors->has('country'))
                <span class="error-block">
                    {{ $errors->first('country') }}
                </span>
            @endif

            <input type="submit" value="Sign up!" class="lb btn btn-primary">
      </div>
    </form>
    @show