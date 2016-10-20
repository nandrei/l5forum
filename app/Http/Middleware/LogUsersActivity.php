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

        $memcache = new Cache();
        $reqtime = strtotime(Carbon::now());
        $memcache::put('reqtime', $reqtime, 5);
        $user_ip = $_SERVER["REMOTE_ADDR"];

        if (!$memcache::has($user_ip)) {
            $memcache::put($user_ip, 0, 5);
        }
        //$memcache::flush();
        //Perform action every 5 min.
        if ($memcache::get('reqtime') >= $memcache::get($user_ip)) {

            $sessionId = $request->session()->getId();
            $user_id = (auth()->check()) ? auth()->user()->id : \Auth::id();
            $payload = json_encode($request->session()->all());
            $ip_address = \DB::table('sessions')->where('ip_address', $user_ip)->get();

            //Write user inf in sessions table.
            if (!$ip_address->first()) {
                \DB::table('sessions')->insert([
                    'id' => $sessionId, 'user_id' => $user_id, 'ip_address' => $user_ip, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            } else {
                \DB::table('sessions')->where('ip_address', $user_ip)->update([
                    'id' => $sessionId, 'user_id' => $user_id, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            }
            $expireAt = strtotime(Carbon::now()->addMinutes(5));
            $memcache::put($user_ip, $expireAt, 5);

            //Get online users from sessions table.
            $registered = \DB::table('sessions')->whereNotNull('user_id')
                ->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(5)))->count();
            $guests = \DB::table('sessions')->whereNull('user_id')
                ->where('last_activity', '>=', strtotime(Carbon::now()->subMinutes(5)))->count();
            $onlineusers = $registered + $guests;
            $memcache::put('onlineusers', $onlineusers, 10);
            $memcache::put('registered', $registered, 10);
            $memcache::put('guests', $guests, 10);
            //dd($registered, $guests);
        }
        return $response;
    }
}
