<?php

namespace App\Http\Controllers;

use App\Http\Helpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainController extends Controller
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
        $categories = DB::select(DB::raw("SELECT * FROM categories WHERE 1"));
        $categories = json_decode(json_encode($categories), true);

        foreach ($categories as $k0 => $category) {
            $cat_id = $category['id'];

            $subcateg = DB::table('subcategories')->where('parent_category_id', '=', $cat_id)->get();
            $subcateg = json_decode(json_encode($subcateg), true);
            $subcategories = $this->getSubcategories($subcateg);
            $categories[$k0]['subcategories'] = $subcategories;
        }
        //dd(compact('categories'));
        return view('forum.main', compact('categories'));
    }

    protected function getSubcategories($subcateg)
    {
        foreach ($subcateg as $k0 => $subcategory) {
            $subcat_id = $subcategory['id'];
            $no_topics = DB::table('topics')->where('parent_category_id', '=', $subcat_id)->count();
            $subcateg[$k0]['no_topics'] = $no_topics;
            $topics = DB::table('topics')->where('parent_category_id', '=', $subcat_id)->get();
            $topics = json_decode(json_encode($topics), true);

            if (empty($topics)) {
                $subcateg[$k0]['no_topics'] = 0;
            } else {

                $total_no_posts = 0;
                foreach ($topics as $k1 => $topic) {
                    $topic_id = $topic['id'];
                    $no_posts = DB::table('posts')->where('topic_id', '=', $topic_id)->count();
                    $total_no_posts += $no_posts;
                }
                $subcateg[$k0]['no_posts'] = $total_no_posts;
                //$lasttopic[$k0] = DB::table('topics')->where('parent_category_id', '=', $subcat_id)->orderby('created_at', 'desc')->first();
                $lasttopic = DB::select(DB::raw("SELECT * FROM topics WHERE parent_category_id = $subcat_id ORDER BY created_at DESC LIMIT 1"));
                $lasttopic = json_decode(json_encode($lasttopic), true);

                foreach ($lasttopic as $k2 => $topic) {
                    $lasttopic_id = $topic['id'];
                    $lastpost = DB::table('posts')->where('topic_id', '=', $lasttopic_id)
                        ->join('users', 'users.id', '=', 'posts.author_id')
                        ->select('posts.created_at', 'users.name as author')->get();
                    //dd($lastpost);
                    if ($subcat_id === $topic['parent_category_id']) {
                        $subcateg[$k0]['lasttopic_name'] = $topic['name'];
                        $subcateg[$k0]['lasttopic_id'] = $lasttopic_id;
                        $subcateg[$k0]['lastpost_date'] = $lastpost[$k2]->created_at;
                        $subcateg[$k0]['lastpost_author'] = $lastpost[$k2]->author;
                    }
                }
            }
        }
        //dd(compact('subcateg'));
        return $subcateg;
    }

    public function showSubcategories(Request $request)
    {
        $cat_id = $request->input('cat_id');

        //$subcateg = DB::select(DB::raw("SELECT * FROM subcategories WHERE parent_category_id = $cat_id"));
        $subcateg = DB::table('subcategories')->where('parent_category_id', '=', $cat_id)->get();
        $subcateg = json_decode(json_encode($subcateg), true);
        $subcategories = $this->getSubcategories($subcateg);

        return view('forum.subcategories', compact('cat_id', 'subcategories'));
    }

    public function showTopics(Request $request)
    {
        $subcat_id = $request->input('subcat_id');

        $topics = DB::table('topics')->where('parent_category_id', '=', $subcat_id)
            ->join('users', 'users.id', '=', 'topics.author_id')
            ->select('topics.*', 'users.name as author_name')->get();
        $topics = json_decode(json_encode($topics), true);

//        foreach ($topics as $k0 => $topic) {
//            $topic_id = $topic['author_id'];
//            $topic_author = DB::select(DB::raw("SELECT id, name FROM users WHERE id = $topic_id"));
//            $topic_author = json_decode(json_encode($topic_author), true);
//
//            foreach ($topic_author as $k1 => $author) {
//                if ($topic_id === $author['id']) {
//                    $topics[$k0]['author'] = $author['name'];
//                }
//            }
//        }
        foreach ($topics as $k0 => $topic) {
            $topic_id = $topic['id'];
            //$lastpost[$k0] = DB::table('posts')->where('topic_id', $topic_id)->orderby('created_at', 'desc')->first();
            $lastpost = DB::select(DB::raw("SELECT * FROM posts WHERE topic_id = $topic_id ORDER BY created_at DESC LIMIT 1"));
            $lastpost = json_decode(json_encode($lastpost), true);

            foreach ($lastpost as $k1 => $post) {
                if ($topic_id === $post['topic_id']) {
                    $topics[$k0]['lastpost_date'] = $post['created_at'];
                }
                $author_id = $post['author_id'];
                $lastpost_author = DB::select(DB::raw("SELECT * FROM users WHERE id = $author_id"));
                $lastpost_author = json_decode(json_encode($lastpost_author), true);

                foreach ($lastpost_author as $k2 => $author) {
                    if ($author_id === $author['id']) {
                        $topics[$k0]['lastpost_author'] = $author['name'];
                        $topics[$k0]['lastpost_author_id'] = $author['id'];
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

        //$posts = DB::select(DB::raw("SELECT * FROM posts WHERE topic_id = $topic_id"));
        $posts = DB::table('posts')->where('topic_id', '=', $topic_id)
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->select('posts.author_id', 'posts.content', 'posts.created_at as post_date', 'users.name as author', 'users.created_at as join_date', 'users.no_posts')
            ->get();
        $posts = json_decode(json_encode($posts), true);

        $postnumber = 0;
        foreach ($posts as $k => $post) {
            $posts[$k]['postnumber'] = $postnumber += 1;
        }
        (new Helpers)->recordPageViews($topic_id);
        //dd($posts);
        return view('forum.posts', compact('posts'));
    }

    public function createTopic(Request $request)
    {
        if ($request->input('action') === 'newtopic') {

            $subcat_id = $request->input('subcat_id');

            return view('forum.newtopic', compact('subcat_id'));

        } elseif ($request->input('action') === 'savetopic') {

            $subcat_id = $request->input('subcat_id');
            $user_id = \Auth::user()->id;
            $topic = $request->input('topic');
            $post = $request->input('post');

            $newtopic_id = DB::table('topics')->max('id') + 1;
            $newpost_id = DB::table('posts')->max('id') + 1;

            $sql = "INSERT INTO topics (id, parent_category_id, name, author_id)
                                  VALUES ('$newtopic_id', '$subcat_id', '$topic', '$user_id')
                    INSERT INTO posts (id, topic_id, author_id, content)
                                  VALUES ('$newpost_id', '$newtopic_id', '$user_id', '$post')";
            DB::insert(DB::raw($sql));
        }
        return redirect('subcategory?subcat_id=' . $subcat_id);
    }
}