@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<div id="wrapper">
    <div id="form-container">
        <p id="heading">Login</p>
        <form action="" method="post">
            <div class="input-form">
                <label class="label" for="email">Email</label><br>
                <input class="inputs" type="email" name="email" id="" placeholder="    Email . . . ">
            </div>
            <div class="input-form">
                <label class="label" for="password">Password</label><br>
                <input class="inputs" type="password" name="password" id="" placeholder="   Password . . . ">
            </div>
            <input class="buttons" id="login" type="button" value="Login">
            <input class="buttons" id="register" type="button" value="Register">
        </form>
        or
        <button class="buttons" id="facebook">Login with Facebook</button>
    </div>
</div>
@endsection
