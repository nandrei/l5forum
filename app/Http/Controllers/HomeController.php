<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $categ = DB::select(DB::raw("SELECT * FROM categories WHERE 1"));
        $categ = json_decode(json_encode($categ), true);
        $subcateg = DB::select(DB::raw("SELECT * FROM subcategories WHERE 1"));
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

        $categ = DB::select(DB::raw("SELECT * FROM categories WHERE id = $categ_id"));
        $categ = json_decode(json_encode($categ), true);
        $subcateg = DB::select(DB::raw("SELECT * FROM subcategories WHERE parent_category_id = $categ_id"));
        $subcateg = json_decode(json_encode($subcateg), true);

        return view('forum.subcategories', compact('categ', 'subcateg'));
    }

    public function showTopics(Request $request)
    {
        $subcat_id = $request->input('subcat_id');

        $topics = DB::table('topics')->where('parent_category_id', '=', $subcat_id)->get();
//                                     ->join('users', 'users.id', '=', 'topics.author_id')
//                                     ->select('topics.*', 'users.name')->get();
        $topics = json_decode(json_encode($topics), true);

        foreach ($topics as $k0 => $topic) {
            $topic_id = $topic['author_id'];
            $topic_author = DB::select(DB::raw("SELECT id, name FROM users WHERE id = $topic_id"));
            $topic_author = json_decode(json_encode($topic_author), true);

            foreach ($topic_author as $k1 => $author) {
                if ($topic_id === $author['id']) {
                    $topics[$k0]['author'] = $author['name'];
                }
            }
        }
        foreach ($topics as $k0 => $topic) {
            $topic_id = $topic['id'];
            //$lastpost = DB::table('posts')->where('topic_id', $topic_id)->orderby('created_at', 'desc')->first();
            $lastpost = DB::select(DB::raw("SELECT * FROM posts WHERE topic_id = $topic_id ORDER BY created_at DESC LIMIT 1"));
            $lastpost = json_decode(json_encode($lastpost), true);

            foreach ($lastpost as $k1 => $post) {
                if ($topic_id === $post['topic_id']) {
                    $topics[$k0]['lastpostdate'] = $post['created_at'];
                }
                $author_id = $post['author_id'];
                $lastpost_author = DB::select(DB::raw("SELECT * FROM users WHERE id = $author_id"));
                $lastpost_author = json_decode(json_encode($lastpost_author), true);

                foreach ($lastpost_author as $k2 => $author) {
                    if ($author_id === $author['id']) {
                        $topics[$k0]['lastpostauthor'] = $author['name'];
                    }
                }
            }
        }
        //dd(compact('topics'));
        return view('forum.topics', compact('topics', 'subcat_id'));
    }

    public function showPosts(Request $request)
    {
        $topic_id = $request->input('topic_id');

        $posts = DB::select(DB::raw("SELECT * FROM posts WHERE topic_id = $topic_id"));
        $posts = json_decode(json_encode($posts), true);

        return view('forum.posts', compact('posts'));
    }

    public function createTopic(Request $request)
    {
        if ($request->input('action') === 'newtopic') {

            $subcat_id = $request->input('subcat_id');
            //$session = session()->all();
            //dd($session);
            return view('forum.newtopic', compact('subcat_id'));

        } elseif ($request->input('action') === 'savetopic') {

            $subcat_id = $request->input('subcat_id');
            $user_id = \Auth::user()->id;
            $topic = $request->input('topic');
            $post = $request->input('post');

            $last_topic_id = DB::select(DB::raw("SELECT id FROM topics ORDER BY id DESC LIMIT 1"));
            $newtopic_id = $last_topic_id[0]->id + 1;
            $last_post_id = DB::select(DB::raw("SELECT id FROM posts ORDER BY id DESC LIMIT 1"));
            $newpost_id = $last_post_id[0]->id + 1;

            //dd($subcat_id);
            DB::insert(DB::raw("INSERT INTO topics (id, parent_category_id, name, author_id)
                                  VALUES ('$newtopic_id', '$subcat_id', '$topic', '$user_id')"));
            DB::insert(DB::raw("INSERT INTO posts (id, topic_id, author_id, content)
                                  VALUES ('$newpost_id', '$newtopic_id', '$user_id', '$post')"));
        }
        return redirect('subcategory?subcat_id=' . $subcat_id);
    }

    public function getnavlinks(Request $request)
    {

        $navlinks = array();

        if ($request->input('cat_id')) {
            if (!empty($navlinks)) {
                $navlinks = array_slice($navlinks, 6);
            }
            $navlinks['catname'] = $request->segment(1);
            $navlinks['catlink'] = 'category?cat_id=' . $request->input('cat_id');
        } elseif ($request->input('subcat_id')) {
            if (empty($navlinks)) {
                $categ = DB::select(DB::raw("SELECT name FROM categories WHERE id = $request->input('subcat_id')"));
                $navlinks['catname'] = $categ[0]->name;
                $navlinks['catlink'] = 'category?cat_id=' . $request->input('subcat_id');
            }
            if (in_array('subcatname', $navlinks)) {
                $navlinks = array_slice($navlinks, 0, 4);
            }
            $navlinks['subcatname'] = $request->segment(1);
            $navlinks['subcatlink'] = 'subcategory?subcat_id=' . $request->input('subcat_id');
        } elseif ($request->input('topic_id')) {
            if (in_array('topicname', $navlinks)) {
                $navlinks = array_slice($navlinks, 0, 2);
            }
            $navlinks['topicname'] = $request->segment(1);
            $navlinks['topiclink'] = 'topic?topic_id=' . $request->input('topic_id');
        }
        return $navlinks;
    }
}
