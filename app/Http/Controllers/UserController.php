<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\RegisterEmail;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Exception;

class UserController extends Controller
{
    public function loginPage(Request $request)
    {
        return view('auth.login');
    }

    public function successPage()
    {
        return view('sucess_page');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        dd(Auth::attempt($credentials));
        if($request->auth->attempt($credentials)) {
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
        $request->validate([
            'email' => 'required|email'
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->notify(new RegisterEmail($user));
        return "Email Send!";
    }

    public function registerPage(Request $request)
    {
        return view('auth.register', ['email' => $request->mail]);
    }

    public function register(UserRequest $request)
    {
        $data = $request->validated();
        $data["password"] = Hash::make($data["password"]);
        $user = User::create($data);
        return "Success Page!";
    }
}
