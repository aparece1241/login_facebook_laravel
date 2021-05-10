@extends('layouts.app')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="wrapper">
        <div class="form-container">
            <form action="">
                <h2>Reset Password</h2>
                @csrf
                <div class="input-form">
                    <label for="" class="label">New Password</label>
                    <input type="text" class="inputs">
                </div>

                <div class="input-form">
                    <label for="" class="label">Confirm Password</label>
                    <input type="text" class="inputs">
                </div>

                <input type="submit" class="buttons" style="background-color: rgb(49, 155, 204)" value="Confirm">
            </form>
        </div>
    </div>
@endsection
