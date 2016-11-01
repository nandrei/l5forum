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
    'uses' => 'MainController@index'
));

Route::get('category/{category}', array(
    'as' => 'subcategories',
    'uses' => 'MainController@showSubcategories'
));

Route::get('subcategory/{subcategory}', array(
    'as' => 'topics',
    'uses' => 'MainController@showTopics'
));

Route::get('topic/{topic}', array(
    'as' => 'posts',
    'uses' => 'MainController@showPosts'
));

Route::any('newtopic/create', array(
    'as' => 'newtopic',
    'uses' => 'MainController@createNewTopic'
));

Route::any('newreply/create', array(
    'as' => 'newreply',
    'uses' => 'MainController@createNewReply'
));

Route::get('userdetails', array(
    'as' => 'userdetails',
    'uses' => 'MembersController@showMemberDetails'
));

Route::get('profile', array(
    'as' => 'profile',
    'uses' => 'MembersController@showMemberProfile'
));

Route::post('updateprofile', array(
    'as' => 'updateprofile',
    'uses' => 'MembersController@updateMemberProfile'
));

Route::get('members', array(
    'as' => 'members',
    'uses' => 'MembersController@listAllMembers'
));