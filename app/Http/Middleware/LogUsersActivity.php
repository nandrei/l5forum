<?php

namespace App\Http\Middleware;

use App\Session\OnlineUsers;
use Carbon\Carbon;
use Closure;

class LogUsersActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //Check user auth.
        if (\Auth::check()) {

            $reqtime = strtotime(Carbon::now());
            if (!isset($expiresAt)) {
                $expiresAt = 0;
            }
            //Perform action every 5 min.
            if ($reqtime > $expiresAt) {
                $request->session()->put('user_id', \Auth::user()->id);
                $request->session()->put('last_activity', date("Y-m-d h:i:sa"));
                $expiresAt = strtotime(Carbon::now()->addMinutes(5));
            }
        }
        return $response;
    }
}
