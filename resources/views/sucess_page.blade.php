@extends('layouts.app')

@section('title')
    Success
@endsection

@section('content')
    <div class="wrapper">
        <div class="form-container">
            <h1>Successfully Registered!</h1>
            <a href="{{ route('loginPage') }}"><button class="buttons" id="login">Please Login</button></a>
        </div>
    </div>
@endsection
