<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Exception;
use Auth;
use Socialite;
use Carbon\Carbon;


class FbController extends Controller
{
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'birthday', 'age', 'gender'
        ])->scopes(['user_birthday', 'email', 'user_gender', 'user_age_range'])->redirect();

    }

    public function loginFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->fields([
                'name', 'email', 'gender', 'birthday', 'age_range'
            ])->user();
            $facebookId = User::where('facebook_id', $user->id)->first();
            if(!$facebookId){
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'gender' => $user['gender'],
                    'age' => Carbon::parse($user['birthday'])->diffInYears(Carbon::now()),
                    'birthday' => Carbon::parse($user['birthday']),
                    'facebook_id' => $user->id
                ]);
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
