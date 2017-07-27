@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="reset__h2"><h2>Reset Password</h2></div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" class="form-group" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <label for="email">E-Mail Address</label>

            <input id="email" type="email"  class="email" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
        </form>
    </div>
</div>
@endsection
