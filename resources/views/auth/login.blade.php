@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="wrapper">
        <div class="form-container">
            <p id="heading">Login</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-form">
                    <label class="label" for="email">Email</label><br>
                    <input class="inputs" type="email" name="email" id="" placeholder="Email " value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <small class="error">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="input-form">
                    <label class="label" for="password">Password</label><br>
                    <input class="inputs password" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    @if ($errors->has('password'))
                        <small class="error">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <input class="buttons" id="login" type="submit" value="Login">
                <a href="{{ route('emailPage') }}"><input class="buttons register" type="button" value="Register"></a>
            </form>
            or
            <button class="buttons" id="facebook">Login with Facebook</button>
        </div>
    </div>
@endsection
