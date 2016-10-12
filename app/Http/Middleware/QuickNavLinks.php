<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class QuickNavLinks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $navlinks = array();
        if ($request->input('cat_id')) {
            $cat_name = $request->segment(2);
            $cat_id = $request->input('cat_id');

            $navlink['name'] = $cat_name;
            $navlink['url'] = 'category/' . $cat_name . '?cat_id=' . $cat_id;
            $navlinks[] = $navlink;
        }

        if ($request->input('subcat_id')) {
            $subcat_name = $request->segment(2);
            $subcat_id = $request->input('subcat_id');

            $sql = "SELECT subcateg.*,categ.id as category_id , categ.name AS category_name   FROM subcategories subcateg
JOIN categories categ ON subcateg.parent_category_id = categ.id
WHERE subcateg.id={$subcat_id};";
            $result = \DB::select(\DB::raw($sql));

            $navlink['name'] = $result[0]->category_name;
            $navlink['url'] = 'category/' . $result[0]->category_name . '?cat_id=' . $result[0]->category_id;
            $navlinks[] = $navlink;

            $navlink['name'] = $result[0]->name;
            $navlink['url'] = 'subcategory/' . $subcat_name . '?subcat_id=' . $subcat_id;
            $navlinks[] = $navlink;
        }

        if ($request->input('topic_id')) {
            $topic_id = $request->input('topic_id');
            $topic_name = $request->segment(2);

            $sql = "SELECT subcateg.id AS subcat_id, subcateg.name AS subcat_name, categ.id as cat_id , categ.name AS cat_name FROM subcategories subcateg
JOIN categories categ ON subcateg.parent_category_id = categ.id JOIN topics ON topics.parent_category_id = subcateg.id
WHERE topics.id=$topic_id";
            $result = \DB::select(\DB::raw($sql));

            $navlink['name'] = $result[0]->cat_name;
            $navlink['url'] = 'category/' . $result[0]->cat_name . '?cat_id=' . $result[0]->cat_id;
            $navlinks[] = $navlink;

            $navlink['name'] = $result[0]->subcat_name;
            $navlink['url'] = 'subcategory/' . $result[0]->subcat_name . '?subcat_id=' . $result[0]->subcat_id;
            $navlinks[] = $navlink;

            $navlink['name'] = $topic_name;
            $navlink['url'] = 'topic/' . $topic_name . '?topic_id=' . $topic_id;
            $navlinks[] = $navlink;
            //dd($navlinks);
        }
        $GLOBALS['navlinks'] = $navlinks;
        return $next($request);
    }
}
