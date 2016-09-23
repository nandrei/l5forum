<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

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

    public function index()
    {
        $categ = \DB::select(\DB::raw("SELECT * FROM categories WHERE 1"));
        $categ = json_decode(json_encode($categ), true);
        $subcateg = \DB::select(\DB::raw("SELECT * FROM subcategories WHERE 1"));
        $subcateg = json_decode(json_encode($subcateg), true);
        $topics = \DB::select(\DB::raw("SELECT * FROM topics WHERE 1"));
        $topics = json_decode(json_encode($topics), true);

        foreach ($categ as $k0 => $category) {
            foreach ($subcateg as $k1 => $subcategory) {
                if ($category['id'] === $subcategory['parent_category_id']) {
                    $categ[$k0]['subcateg'][] = $subcategory;
                }
            }
        }
//        foreach ($subcateg as $k0 => $subcategory) {
//            foreach ($topics as $x1 => $topic) {
//                if ($subcategory['id'] === $topic['parent_category_id']) {
//                        $subcateg[$k0]['topics'][] = $topic;
//                }
//            }
//        }

        //dd(compact('categ', 'subcateg'));
        return view('forum.main', compact('categ'));
    }

    public function showSubcategories(Request $request)
    {
        $categ_id = $request->input('cat_id');

        $subcateg = \DB::select(\DB::raw("SELECT * FROM subcategories WHERE parent_category_id = $categ_id"));
        $subcateg = json_decode(json_encode($subcateg), true);

        return view('forum.subcategories', compact('subcateg'));

    }

    public function showTopics(Request $request)
    {
        $subcateg_id = $request->input('subcat_id');

        $topics = \DB::select(\DB::raw("SELECT * FROM topics WHERE parent_category_id = $subcateg_id"));
        $topics = json_decode(json_encode($topics), true);

        return view('forum.topics', compact('topics'));
    }

    public function showPosts(Request $request)
    {
        $topic_id = $request->input('topic_id');

        $posts = \DB::select(\DB::raw("SELECT * FROM posts WHERE topic_id = $topic_id"));
        $posts = json_decode(json_encode($posts), true);

        return view('forum.posts', compact('posts'));
    }

    public function showMembers()
    {
        $users = \DB::select(\DB::raw("SELECT * FROM users WHERE 1"));

        return view('users.users', compact('users'));
    }
}
