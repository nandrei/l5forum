<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    public function showMemberDetails(Request $request)
    {
        $user_id = $request->input('id');
        $sql = "SELECT * FROM profiles JOIN users ON profiles.id = users.id WHERE users.id = $user_id";
        $user = DB::select(DB::raw($sql));

        $last_activity = DB::select(DB::raw("SELECT last_activity FROM sessions WHERE user_id = $user_id"));
        $user_last_activity = date('Y-m-d G:i:s', $last_activity[0]->last_activity);
        $user[0]->last_activity_date = $user_last_activity;

        //Check if user is online or offline.
        if ($last_activity[0]->last_activity >= strtotime(Carbon::now()->subMinutes(10))) {
            $user[0]->user_status = 'online';
        } else {
            $user[0]->user_status = 'offline';
        }
        //dd($user);
        return view('members.userdetails', compact('user'));
    }

    public function showMemberProfile()
    {
        $user_id = \Auth::user()->id;
        $profile = DB::table('users')->where('users.id', '=', $user_id)
            ->leftjoin('profiles', 'profiles.id', '=', 'users.id')->get();
        //dd(compact('profile'));
        return view('members.profile', compact('profile'));
    }

    public function listAllMembers()
    {
        $users = DB::select(DB::raw("SELECT * FROM users WHERE 1"));
        $users = json_decode(json_encode($users), true);

        return view('members.members', compact('users'));
    }
}
