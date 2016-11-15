<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use App\Http\Helpers;

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
                        ->select('posts.created_at', 'users.id as author_id', 'users.name as author')->get();
                    //dd($lastpost);
                    if ($subcat_id === $topic['parent_category_id']) {
                        $subcateg[$k0]['lasttopic_name'] = $topic['name'];
                        $subcateg[$k0]['lasttopic_id'] = $lasttopic_id;
                        $subcateg[$k0]['lastpost_date'] = $lastpost[$k2]->created_at;
                        $subcateg[$k0]['lastpost_author_id'] = $lastpost[$k2]->author_id;
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
        $topics = $this->getLastPosts($topics);
        //dd(compact('topics'));
        return view('forum.topics', compact('topics', 'subcat_id'));
    }

    protected function getLastPosts($topics)
    {
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
        return $topics;
    }

    public function showPosts(Request $request)
    {
        $topic_id = $request->input('topic_id');

        //$posts = DB::select(DB::raw("SELECT * FROM posts WHERE topic_id = $topic_id"));
        $posts = DB::table('posts')->where('topic_id', '=', $topic_id)
            ->join('users', 'users.id', '=', 'posts.author_id')
            ->select('posts.author_id', 'posts.id as post_id', 'posts.content', 'posts.created_at as post_date', 'users.avatar_path', 'users.name as author', 'users.class', 'users.created_at as join_date', 'users.no_posts')
            ->orderBy('post_date', 'asc')->get();
        $posts = json_decode(json_encode($posts), true);

        $postnumber = 0;
        foreach ($posts as $k => $post) {
            $posts[$k]['postnumber'] = $postnumber += 1;
        }
        $page_id = $request->input();
        (new Helpers)->recordPageViews($page_id);
        //dd($posts);
        return view('forum.posts', compact('posts', 'topic_id'));
    }

    public function createNewTopic(Request $request)
    {
        $subcat_id = $request->input('subcat_id');
        $subcategory = DB::table('subcategories')->where('id', $subcat_id)->first();

        if ($request->input('action') === 'newtopic') {

            return view('forum.htmleditor', compact('subcategory'));

        } elseif ($request->input('action') === 'savetopic') {

            $user_id = \Auth::user()->id;
            $topic_title = $request->input('title');
            $post_content = $request->input('post_content');

            $created_at = Carbon::now()->toDateTimeString();

            $newtopic_id = DB::table('topics')->insertGetId(['parent_category_id' => $subcat_id, 'name' => $topic_title,
                'author_id' => $user_id, 'created_at' => $created_at]);
            DB::table('posts')->insert(['topic_id' => $newtopic_id, 'author_id' => $user_id,
                'content' => $post_content, 'created_at' => $created_at]);
            $sql = "UPDATE users SET no_posts = no_posts + 1 WHERE id = $user_id";
            DB::update(DB::raw($sql));

            return redirect('subcategory/' . $subcategory->name . '?subcat_id=' . $subcat_id);
        }
        return false;
    }

    public function createNewReply(Request $request)
    {
        $topic_id = $request->input('topic_id');
        $topic = DB::table('topics')->where('id', $topic_id)->first();

        if ($request->input('action') === 'newreply') {

            return view('forum.htmleditor', compact('topic'));
        }
        elseif ($request->input('action') === 'savereply') {

            $user_id = \Auth::user()->id;
            $post_content = $request->input('post_content');
            $created_at = Carbon::now()->toDateTimeString();

            DB::table('posts')->insert(['topic_id' => $topic_id, 'author_id' => $user_id,
                'content' => $post_content, 'created_at' => $created_at]);
            $sql = "UPDATE users SET no_posts = no_posts + 1 WHERE id = $user_id";
            DB::update(DB::raw($sql));

            return redirect('topic/' . $topic->name . '?topic_id=' . $topic_id);
        }
        return false;
    }

    public function editPost(Request $request)
    {
        $post_id = $request->input('post_id');
        $post = DB::table('posts')->where('id', $post_id)->first();

        if ($request->input('action') === 'editpost') {
            //dd($post);
            return view('forum.htmleditor', compact('post'));
        }
    }

    public function forumSearch(Request $request)
    {
        if ($request->input('action') === 'newsearch') {

            return view('forum.search_form');
        } elseif ($request->input('action') === 'go') {

            $validation = Validator::make($request->all(), [
                'keywords' => 'required|max:55',
            ]);
            if ($validation->fails()) {
                return redirect('search')->withErrors($validation)->withInput();
            }

            $keywords = $request->input('keywords');
            if (preg_match("/^[  a-zA-Z]+/", $keywords)) {

                if ($request->input('search_option') === 'keywords') {

                    $sql = "SELECT subcateg.id AS subcat_id, subcateg.name AS subcat_name, topics.id AS id, topics.name AS topic_name, posts.id AS post_id, posts.author_id AS author_id, users.name AS author_name 
FROM subcategories subcateg JOIN topics ON topics.parent_category_id = subcateg.id JOIN posts ON posts.topic_id = topics.id JOIN users ON users.id = posts.author_id WHERE posts.content LIKE '%" . $keywords . "%'";
                    $results = DB::select(DB::raw($sql));
                    $results = json_decode(json_encode($results), true);
                    $no_results = count($results);
                    $results = $this->getLastPosts($results);

                } elseif ($request->input('search_option') === 'author_name') {

                    $sql = "SELECT subcateg.id AS subcat_id, subcateg.name AS subcat_name, topics.id AS id, topics.name AS topic_name, topics.author_id AS author_id, posts.id AS post_id
FROM subcategories subcateg JOIN topics ON topics.parent_category_id = subcateg.id JOIN posts ON posts.topic_id = topics.id JOIN users ON users.id = posts.author_id WHERE users.name LIKE '%" . $keywords . "%'";
                    $results = DB::select(DB::raw($sql));
                    $results = json_decode(json_encode($results), true);

                    foreach ($results as $k => $result) {
                        $author_name = DB::table('users')->where('id', $result['author_id'])->first()->name;
                        $results[$k]['author_name'] = $author_name;
                    }
                    $no_results = count($results);
                    $results = $this->getLastPosts($results);
                }
                return view('forum.search_results', compact('no_results', 'keywords', 'results'));
            }
        }
        return false;
    }
}
