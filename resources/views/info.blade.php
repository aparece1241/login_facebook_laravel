@extends('layouts.app')

@section('title')
    Info
@endsection

@section('content')
    <div class="wrapper">
        <div id="header">
            <a href="{{ route('logout') }}"><button class="buttons register" style="float: right; margin: 7px 0.5em;" >Logout</button></a>
        </div>
        <div class="form-container" style="width: 39em;height: 27rem;">
            <div id="division">
                <div id="profile" class="half">
                    <div>
                        <div id="profile-img-cont">
                            <span style="
                            font-size: 6em;
                            color: white;
                            ">{{ strtoupper(substr($user["name"],0,2)) }}</span>
                        </div>
                        <p id="name">{{ $user["name"] }}</p>
                    </div>
                </div>

                <div class="half" id="info-cont">
                    <div class="info">
                        <p class="field-name">Email</p>
                        <p class="field-content">{{ $user["email"] }}</p>
                    </div>
                    <div class="info">
                        <p class="field-name">Age</p>
                        <p class="field-content">{{ $user["age"] }}</p>
                    </div>
                    <div class="info">
                        <p class="field-name">Birthday</p>
                        <p class="field-content">{{ $user["birthday"] }}</p>
                    </div>
                    <div class="info">
                        <p class="field-name">Gender</p>
                        <p class="field-content">{{ $user["gender"] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
