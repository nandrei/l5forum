<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers;

class MembersController extends Controller
{
    public function showMemberDetails(Request $request)
    {
        $user_id = $request->input('id');
        $sql = "SELECT * FROM profiles JOIN users ON profiles.id = users.id WHERE users.id = $user_id";
        $user = DB::select(DB::raw($sql));

        $last_activity = DB::select(DB::raw("SELECT last_activity FROM sessions WHERE user_id = $user_id"));
        //dd($last_activity);
        $user_last_activity = date('Y-m-d G:i:s', $last_activity[0]->last_activity);
        $user[0]->last_activity_date = $user_last_activity;

        //Check if user is online or offline.
        if ($last_activity[0]->last_activity >= strtotime(Carbon::now()->subMinutes(10))) {
            $user[0]->user_status = 'online';
        } else {
            $user[0]->user_status = 'offline';
        }
        $page_id = $request->input();
        (new Helpers)->recordPageViews($page_id);
        //dd($user);
        return view('members.userdetails', compact('user'));
    }

    public function showMemberProfile()
    {
        $user_id = auth()->user()->id;
        $profile = DB::table('users')->where('users.id', '=', $user_id)
            ->leftjoin('profiles', 'profiles.id', '=', 'users.id')->get();
        //dd(compact('profile'));
        return view('members.profile', compact('profile'));
    }

    public function updateMemberProfile(Request $request)
    {
        $profile_data = $request->input();
        $photo = $request->file('photo');
        $user_id = auth()->user()->id;

        if (isset($photo)) {
            $filename = $user_id . '.' . $photo->getClientOriginalExtension();
            $saveto = public_path('img/avatars');
            $photo->move($saveto, $filename);
            $img_path = $saveto . '/' . $filename;
            $typeok = TRUE;

            //Check if file extension is correct.
            switch ($photo->getClientMimeType()) {
                case "image/gif":
                    $src = imagecreatefromgif($img_path);
                    break;
                case "image/jpeg": // Both regular and progressive jpegs
                case "image/pjpeg":
                    $src = imagecreatefromjpeg($img_path);
                    break;
                case "image/png":
                    $src = imagecreatefrompng($img_path);
                    break;
                default:
                    $typeok = FALSE;
                    break;
            }
            if ($typeok) {
                list($w, $h) = getimagesize($img_path);
                $max = 200;
                $tw = $w;
                $th = $h;
                if ($w > $h && $max < $w) {
                    $th = $max / $w * $h;
                    $tw = $max;
                } elseif ($h > $w && $max < $h) {
                    $tw = $max / $h * $w;
                    $th = $max;
                } elseif ($max < $w) {
                    $tw = $th = $max;
                }
                $tmp = imagecreatetruecolor($tw, $th);

                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
                imageconvolution($tmp, array(array(-1, -1, -1), array(-1, 16, -1), array(-1, -1, -1)), 8, 0);
                imagejpeg($tmp, $img_path, 75);
                imagedestroy($tmp);
                imagedestroy($src);
                DB::table('users')->where('id', $user_id)->update(['avatar_path' => 'img/avatars/' . $filename]);
            }
        }
        return redirect('profile');
    }

    public function listAllMembers()
    {
        $users = DB::table('users')->join('profiles', 'users.id', '=', 'profiles.id')
            ->select('users.*', 'profiles.country')
            ->get();
        $users = json_decode(json_encode($users), true);
        //dd($users);
        return view('members.members', compact('users'));
    }
}
