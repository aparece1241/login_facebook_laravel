<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PasswordLinkChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('token_reset_pwd')['exp'] <= Carbon::now()) {
            abort(404);
        }

        $email = openssl_decrypt(str_replace('slash','/', $request->session()->get('token_reset_pwd')["data"]), env('ENCRYPT_CIPHER'), env('ENCRYPT_KEY'),0,env('ENCRYPRION_IV'));
        $originalEmail = $request->mail;
        if($email == $originalEmail) {
            return $next($request);
        }

        abort(404);
        return;
    }
}
