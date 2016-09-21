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

Auth::routes();

Route::get('/', array(
    'as' => 'homepage',
    'uses' => 'HomeController@showCategories'
));

Route::get('subcat/{subcategory}', array(
    'as' => 'topics',
    'uses' => 'HomeController@showTopics'
));

Route::get('members', array(
    'as' => 'members',
    'uses' => 'HomeController@showMembers'
));