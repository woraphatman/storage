<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class CheckUser
{
    public function handle(Request $request, Closure $next)
    {
        $previous_session = Auth::User()->session_id;
    if ($previous_session !== Session::getId()) {

        Session::getHandler()->destroy($previous_session);
        $user = Auth::user();
        $request->session()->regenerate();
        $user->session_id = Session::getId();
        $user->save();
    }
    return $next($request);
}
}