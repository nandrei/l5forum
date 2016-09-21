<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function showCategories()
    {
        $categ = \DB::table('categories')->get();
        $categ = json_decode(json_encode($categ), true);
        $subcateg = \DB::table('subcategories')->get();
        $subcateg = json_decode(json_encode($subcateg), true);

        foreach ($categ as $k0 => $category) {
            foreach ($subcateg as $k1 => $subcategory) {
                if ($category['id'] === $subcategory['parent_category_id']) {
                    $categ[$k0]['subcateg'][] = $subcategory;
                }
            }
        }
        //dd(compact('categ'));
        return view('forum.main', compact('categ'));
    }

    public function showTopics(Request $request)
    {
        $parent_category_id = $request->input('subcat_id');
        $subcateg = \DB::select(\DB::raw("SELECT * FROM subcategories WHERE 1"));
        $subcateg = json_decode(json_encode($subcateg), true);
        $topics = \DB::select(\DB::raw("SELECT * FROM topics WHERE parent_category_id = $parent_category_id"));
        $topics = json_decode(json_encode($topics), true);


        //dd($parent_category_id, $topics);

        return view('forum.topics', compact('topics'));
    }

    public function showMembers()
    {
        $users = \DB::select(\DB::raw("SELECT * FROM users WHERE 1"));

        //dd($users);

        return view('users.users', compact('users'));
    }
}
