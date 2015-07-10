<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('login', 'SessionsController@create');

Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController', ['only' => ['create', 'destroy', 'store']]);

Route::post('u/create', 'UsersController@create');

Route::get('/', ['as' => 'home', 'uses' => 'PostsController@index']);

Route::get('valor', 'GeneralController@valor');

Route::get('settings', 'UsersController@settings');

Route::post('settings/process', 'UsersController@changePass');

Route::post('settings/delete', 'UsersController@delete');

Route::get('p/{id}', 'PostsController@show')->where('id', '\d+');

Route::get('p/create', 'PostsController@create')->before('auth');

Route::post('p/process', 'PostsController@process');

Route::get('u/{username}', 'UserPostsController@showPosts');

Route::get('u/{username}/{id}', 'UserPostsController@ShowPost');

Route::get('f/{username}', 'FollowsController@show');

Route::get('new', 'PostsController@newPosts');

Route::get('about', 'GeneralController@about');

//Reminder

Route::controller('password', 'RemindersController');

//Contact Routes
Route::get('contact', 'GeneralController@contact');

Route::get('support', 'GeneralController@support');

Route::get('request', 'GeneralController@request');

Route::get('idea', 'GeneralController@idea');

Route::get('hug', 'GeneralController@hug');


//AJAX
Route::get('follow', 'FollowsController@follow');
