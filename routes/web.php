<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', array(
    'as' => 'homepage',
    'uses' => 'HomeController@index'
));

Route::get('/categ', array(
    'as' => 'categories',
    'uses' => 'CategoriesController@showCategories'
));

Auth::routes();