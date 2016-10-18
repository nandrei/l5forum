<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    public function showMemberDetails(Request $request)
    {
        $user_id = $request->input('id');
        $sql = "SELECT * FROM profiles JOIN users ON profiles.id = users.id WHERE users.id = $user_id";
        $user = DB::select(DB::raw($sql));
        $user = json_decode(json_encode($user), true);
        //dd(compact('user'));
        return view('members.userdetails', compact('user'));
    }

    public function showMemberProfile()
    {
        $user_id = \Auth::user()->id;
        $profile = DB::table('users')->where('users.id', '=', $user_id)
            ->leftjoin('profiles', 'profiles.id', '=', 'users.id')->get();
        dd(compact('profile'));
        return view('members.profile', compact('profile'));
    }

    public function listAllMembers()
    {
        $users = DB::select(DB::raw("SELECT * FROM users WHERE 1"));
        $users = json_decode(json_encode($users), true);

        return view('members.members', compact('users'));
    }
}
