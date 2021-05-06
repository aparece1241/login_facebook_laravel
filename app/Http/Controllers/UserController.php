<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RegisterEmail;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
class UserController extends Controller
{
    public function loginPage(Request $request)
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            return "Successfully Login!";
        }

        return back()->withErrors([
            'message' => 'Incorrect Credentials!'
        ]);
    }

    public function registerEmailPage()
    {
        return view('verify_email');
    }

    public function registerEmail(Request $request)
    {
        $user = new User();
        $user->email = '19104865@usc.edu.ph';
        $user->notify(new RegisterEmail($user));
        return "Email Send!";
    }

    public function registerPage(Request $request)
    {
        return view('auth.register', ['email' => $request->mail]);
    }

    public function register(UserRequest $request)
    {
        dd($request->all());
    }
}
