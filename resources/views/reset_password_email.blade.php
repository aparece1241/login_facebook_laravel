@extends('layouts.app')

@section('title')
    Email
@endsection

@section('content')
    <div class="wrapper">
        <div class="form-container">
            @if (Session::has('message'))
                <h1>{{ Session::get('message') }}</h1>
                <p>Please see your email to complete the password reset</p>
                <p>Thank You!</p>
            @else
                <form action="{{ route('resetPasswordEmail') }}" method="post" >
                    @csrf
                    <div class="input-form" id="submit-email">
                        <label class="label" id="register_label" for="email">Password Reset</label>
                        <br>
                        <br>
                        <input class="inputs" type="email" name="email" id="" placeholder="Email . . . ">
                        @if ($errors->has('email'))
                            <small class="error">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <input class="buttons" id="send-email" type="submit" value="Send Request">
                </form>
            @endif
        </div>
    </div>
@endsection
