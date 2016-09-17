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

Route::get('/reg', array(
    'as' => 'homepagea',
    'uses' => 'HomeController@index1'
));

Auth::routes();