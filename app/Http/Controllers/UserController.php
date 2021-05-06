<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function loginPage(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
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
}
