<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MembersController extends Controller
{
    public function showUserDetails(Request $request)
    {

        $user_id = $request->input('id');
        $user = \DB::select(\DB::raw("SELECT * FROM users WHERE id = $user_id"));
        $user = json_decode(json_encode($user), true);

        return view('members.userdetails', compact('user'));
    }

    public function showMembers()
    {
        $users = \DB::select(\DB::raw("SELECT * FROM users WHERE 1"));
        $users = json_decode(json_encode($users), true);

        return view('members.members', compact('users'));
    }
}
