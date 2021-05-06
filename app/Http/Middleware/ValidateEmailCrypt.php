<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        $email = openssl_decrypt(str_replace('slash','/', $request->email), env('ENCRYPT_CIPHER'), env('ENCRYPT_KEY'),0,env('ENCRYPRION_IV'));
        $originalEmail = $request->mail;
        if($email == $originalEmail) {
            return $next($request);
        }

        return back()->withErrors(['error' => 'Not valid!']);
    }
}
