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
    'uses' => 'HomeController@index'
));

Route::get('category/{category}', array(
    'as' => 'subcategories',
    'uses' => 'HomeController@showSubcategories'
));

Route::get('subcategory/{subcategory}', array(
    'as' => 'topics',
    'uses' => 'HomeController@showTopics'
));

Route::get('topic/{topic}', array(
    'as' => 'posts',
    'uses' => 'HomeController@showPosts'
));

Route::any('subcategory/newtopic/create', array(
    'as' => 'newtopic',
    'uses' => 'HomeController@createTopic'
));

Route::get('userdetails', array(
    'as' => 'userdetails',
    'uses' => 'MembersController@showUserDetails'
));

Route::get('members', array(
    'as' => 'members',
    'uses' => 'MembersController@showMembers'
));