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

    public function index()
    {
        $categ = \DB::select(\DB::raw("SELECT * FROM categories WHERE 1"));
        $categ = json_decode(json_encode($categ), true);
        $subcateg = \DB::select(\DB::raw("SELECT * FROM subcategories WHERE 1"));
        $subcateg = json_decode(json_encode($subcateg), true);

        foreach ($categ as $k0 => $category) {
            foreach ($subcateg as $k1 => $subcategory) {
                if ($category['id'] === $subcategory['parent_category_id']) {
                    $categ[$k0]['subcateg'][] = $subcategory;
                }
            }
        }
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
        $subcat_id = $request->input('subcat_id');

        $topics = \DB::select(\DB::raw("SELECT * FROM topics WHERE parent_category_id = $subcat_id"));
        $topics = json_decode(json_encode($topics), true);

        return view('forum.topics', compact('topics', 'subcat_id'));
    }

    public function showPosts(Request $request)
    {
        $topic_id = $request->input('topic_id');

        $posts = \DB::select(\DB::raw("SELECT * FROM posts WHERE topic_id = $topic_id"));
        $posts = json_decode(json_encode($posts), true);

        return view('forum.posts', compact('posts'));
    }

    public function createTopic(Request $request)
    {
        if ($request->input('action') === 'newtopic') {

            $subcat_id = $request->input('subcat_id');
            $session = session()->all();
            //dd($session);
            return view('forum.newtopic', compact('subcat_id'));
        } elseif ($request->input('action') === 'savetopic') {

            $subcat_id = $request->input('subcat_id');
            $user_id = \Auth::user()->id;
            $topic = $request->input('topic');
            $post = $request->input('post');

            $last_topic_id = \DB::select(\DB::raw("SELECT id FROM topics ORDER BY id DESC LIMIT 1"));
            $newtopic_id = $last_topic_id[0]->id + 1;
            $last_post_id = \DB::select(\DB::raw("SELECT id FROM posts ORDER BY id DESC LIMIT 1"));
            $newpost_id = $last_post_id[0]->id + 1;

            //dd($subcat_id);
            \DB::insert(\DB::raw("INSERT INTO topics (id, parent_category_id, name, author_id)
                                  VALUES ('$newtopic_id', '$subcat_id', '$topic', '$user_id')"));
            \DB::insert(\DB::raw("INSERT INTO posts (id, topic_id, author_id, content)
                                  VALUES ('$newpost_id', '$newtopic_id', '$user_id', '$post')"));
        }
        return redirect('subcategory?subcat_id=' . $subcat_id);
    }
}
