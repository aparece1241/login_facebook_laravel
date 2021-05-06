@extends('layouts.app')

@section('title')
    Email
@endsection

@section('content')
    <div class="wrapper">
        <div class="form-container">
            <form action="{{ route('email') }}" method="post" >
                @csrf
                <div class="input-form" id="submit-email">
                    <label class="label" id="register_label" for="email">Register Email</label>
                    <br>
                    <br>
                    <input class="inputs" type="email" name="email" id="" placeholder="Email . . . ">
                </div>
                <input class="buttons" id="send-email" type="submit" value="Register Email">
            </form>
        </div>
    </div>
@endsection
