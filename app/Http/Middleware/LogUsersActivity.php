<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
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

        $sessionId = $request->session()->getId();
        $user_id = (auth()->check()) ? auth()->user()->id : \Auth::id();
        $user_ip = $_SERVER["REMOTE_ADDR"];
        $payload = json_encode($request->session()->all());

        //Write user inf in sessions table.
        if (auth()->check()) {
            //Check if auth user log exists;
            $auth_user_log = \DB::table('sessions')->where('user_id', $user_id)->first();
            if (empty($auth_user_log)) {
                \DB::table('sessions')->insert([
                    'id' => $sessionId, 'user_id' => $user_id, 'ip_address' => $user_ip, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            } else {
                \DB::table('sessions')->where('user_id', $user_id)->update([
                    'id' => $sessionId, 'ip_address' => $user_ip, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            }
        } else {
            //Check if guest user log exists;
            $guest_user_log = \DB::table('sessions')->where('id', $sessionId)->first();
            if (empty($guest_user_log)) {
                \DB::table('sessions')->insert([
                    'id' => $sessionId, 'user_id' => $user_id, 'ip_address' => $user_ip, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            } else {
                \DB::table('sessions')->where('id', $sessionId)->update([
                    'user_id' => $user_id, 'ip_address' => $user_ip, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            }
        }
        //Get online users from sessions table.
        $registered = \DB::table('sessions')->whereNotNull('user_id')
            ->where('last_activity', '>=', strtotime(Carbon::now()))->count();
        $guests = \DB::table('sessions')->whereNull('user_id')
            ->where('last_activity', '>=', strtotime(Carbon::now()))->count();
        $onlineusers = $registered + $guests;
        Cache::put('onlineusers', $onlineusers, 10);
        Cache::put('registered', $registered, 10);
        Cache::put('guests', $guests, 10);
        //dd($registered, $guests);

        return $response;
    }
}
