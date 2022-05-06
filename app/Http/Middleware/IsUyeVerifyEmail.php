<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUyeVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if(!Auth::guard('uye')->user()->email_verified){
            Auth::guard('uye')->logout();
            return redirect()->route("site.uye_login")->with("toast_success","Eposta Adresini Kontrol Et ve Maili Onayla")->withInput();
        }

        return $next($request);
    }
}
