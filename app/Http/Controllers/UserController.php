<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginPage(Request $request)
    {
        return view('auth.login');
    }

    public function login()
    {

    }
}
