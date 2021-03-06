<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ValidateEmailCrypt
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
        if(Session::get('token')['exp'] <= Carbon::now()) {
            abort(404);
        }

        $email = openssl_decrypt(str_replace('slash','/', $request->session()->get('token')["data"]), env('ENCRYPT_CIPHER'), env('ENCRYPT_KEY'),0,env('ENCRYPRION_IV'));
        $originalEmail = $request->mail;
        if($email == $originalEmail) {
            return $next($request);
        }

        abort(404);
        return;
    }
}
