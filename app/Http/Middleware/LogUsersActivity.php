<?php

namespace App\Http\Middleware;

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

        $sessionId = $request->session()->getId();
        $user_id = (auth()->check()) ? auth()->user()->id : \Auth::id();
        $user_ip = $_SERVER["REMOTE_ADDR"];

        $user_agent = $request->header('User-Agent');
        $browser_name = 'Unknown';
        //Get the name of the useragent.
        if (preg_match('/MSIE/i', $user_agent) && !preg_match('/Opera/i', $user_agent)) {
            $browser_name = 'Internet Explorer';
        } elseif (preg_match('/Firefox/i', $user_agent)) {
            $browser_name = 'Mozilla Firefox';
        } elseif (preg_match('/Chrome/i', $user_agent)) {
            $browser_name = 'Google Chrome';
        } elseif (preg_match('/Safari/i', $user_agent)) {
            $browser_name = 'Apple Safari';
        } elseif (preg_match('/Opera/i', $user_agent)) {
            $browser_name = 'Opera';
        } elseif (preg_match('/Netscape/i', $user_agent)) {
            $browser_name = 'Netscape';
        }
        $payload = json_encode($request->session()->all());

        //Write user inf in sessions table.
        if (auth()->check()) {
            //Check if auth user log exists;
            $auth_user_log = \DB::table('sessions')->where('user_id', $user_id)->first();
            if (empty($auth_user_log)) {
                \DB::table('sessions')->insert([
                    'id' => $sessionId, 'user_id' => $user_id, 'ip_address' => $user_ip, 'user_agent' => $browser_name, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            } else {
                \DB::table('sessions')->where('user_id', $user_id)->update([
                    'id' => $sessionId, 'ip_address' => $user_ip, 'user_agent' => $browser_name, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            }
        } else {
            //Check if guest user log exists;
            $guest_user_log = \DB::table('sessions')->where('id', $sessionId)->first();
            if (empty($guest_user_log)) {
                \DB::table('sessions')->insert([
                    'id' => $sessionId, 'user_id' => $user_id, 'ip_address' => $user_ip, 'user_agent' => $browser_name, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            } else {
                \DB::table('sessions')->where('id', $sessionId)->update([
                    'user_id' => $user_id, 'ip_address' => $user_ip, 'user_agent' => $browser_name, 'payload' => base64_encode($payload), 'last_activity' => time(),
                ]);
            }
        }
        $members = \DB::table('sessions')->whereNotNull('user_id')
            ->where('last_activity', '>=', strtotime(Carbon::now()->subSeconds(2)))->count();
        $guests = \DB::table('sessions')->whereNull('user_id')
            ->where('last_activity', '>=', strtotime(Carbon::now()->subSeconds(2)))->count();
        $online_users = $members + $guests;
        $request->session()->put('members', $members);
        $request->session()->put('guests', $guests);
        $request->session()->put('online_users', $online_users);

        $total_posts = \DB::table('posts')->count();
        $total_members = \DB::table('users')->count();
        $last_member = \DB::table('users')->orderBy('created_at', 'desc')->first();
        $request->session()->put('total_posts', $total_posts);
        $request->session()->put('total_members', $total_members);
        $request->session()->put('last_member_id', $last_member->id);
        $request->session()->put('last_member_name', $last_member->name);

        $today = Carbon::today()->toDateTimeString();
        $tomorrow = Carbon::tomorrow()->toDateTimeString();
        $today_registered = \DB::table('users')->whereBetween('created_at', [$today, $tomorrow])->count();
        $request->session()->put('today_registered', $today_registered);

        $hi_no_conn_users = \DB::table('users_activity')->first();
        //dd($hi_no_conn_users);
        if (!$hi_no_conn_users) {
            \DB::table('users_activity')->insert(['hi_no_online' => $online_users, 'hi_no_online_date' => Carbon::now()->toDateTimeString()]);
        } elseif ($online_users > $hi_no_conn_users->hi_no_online) {
            \DB::table('users_activity')->update(['hi_no_online' => $online_users, 'hi_no_online_date' => Carbon::now()->toDateTimeString()]);
        }
        $request->session()->put('hi_no_online', $hi_no_conn_users->hi_no_online);
        $request->session()->put('hi_no_online_date', $hi_no_conn_users->hi_no_online_date);
        //dd($request->session()->all());

        return $response;
    }
}
