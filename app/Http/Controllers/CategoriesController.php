<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    public function showCategories()
    {

        $categ = \DB::table('categories')->get();
        $categ = json_decode(json_encode($categ), true);
        $subcateg = \DB::table('topics')->get();
        $subcateg = json_decode(json_encode($subcateg), true);
        $posts = \DB::table('posts')->get();
        $posts = json_decode(json_encode($posts), true);

        foreach ($categ as $k0 => $category) {
            foreach ($subcateg as $k1 => $subcategory) {
                if ($category['id'] === $subcategory['parent_category_id']) {
                    $categ[$k0]['subcateg'][] = $subcategory;
                }
            }
        }
        //dd(compact('categ'));

        return view('forum.categories', compact('categ'));
    }

}
