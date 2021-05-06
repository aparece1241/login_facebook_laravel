@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="wrapper">
        <div class="form-container" style="width: 31em;">
            <form action="{{ route('register') }}" method="post">
                <p style="font-weight: 500;font-size: 1.2em;">Register</p>
                @csrf
                <div class="input-form">
                    <label class="label" for="email">Name*</label><br>
                    <input class="inputs" type="text" name="name" id="" value="{{ old('name') }}" placeholder="Name">
                    @if ($errors->has('name'))
                        <small class="error">{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <div class="input-form">
                    <label class="label" for="email">Email*</label><br>
                    <input class="inputs" type="email" name="email" id="" placeholder="Email" value="{{ $email }}" readonly>
                    @if ($errors->has('email'))
                        <small class="error">{{ $errors->first('email') }}</small>
                    @endif
                </div>

                <div class="input_group">
                    <div class="input-form">
                        <label class="label" for="email">Gender*</label><br>
                        <select name="gender" id="" class="inputs">
                            <option value="">Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                        @if ($errors->has('gender'))
                            <small class="error">{{ $errors->first('gender') }}</small>
                        @endif
                    </div>
                    <div class="input-form">
                        <label class="label" for="email">Age*</label><br>
                        <input class="inputs" type="number" name="age" id="" placeholder="Age" value="{{ old('age') }}">
                        @if ($errors->has('age'))
                            <small class="error">{{ $errors->first('age') }}</small>
                        @endif
                    </div>
                </div>

                <div class="input-form">
                    <label class="label" for="birthday">Birthday*</label><br>
                    <input class="inputs" type="date" name="birthday" value="{{ old('birthday') }}" id="" placeholder="Birthday">
                    @if ($errors->has('birthday'))
                        <small class="error">{{ $errors->first('birthday') }}</small>
                    @endif
                </div>

                <div class="input-form">
                    <label class="label" for="password">Password*</label><br>
                    <input class="inputs password" type="password" name="password" value="{{ old('password') }}" id="" placeholder="*************">
                    @if ($errors->has('password'))
                        <small class="error">{{ $errors->first('password') }}</small>
                    @endif
                </div>

                <button type="submit" class="buttons register">Register</button>
            </form>
        </div>
    </div>
@endsection
