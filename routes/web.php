<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/try', 'ProfilesController@try');

Route::get('/try/sess', 'ProfilesController@red');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/profile/{user}', 'ProfilesController@index');

Route::get('/post/create', 'PostsController@create');

Route::post('/post', 'PostsController@store');

Route::get('/post/{user}', 'PostsController@show');

Route::delete('/post/{user}/delete', 'PostsController@destroy');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'ProfilesController@update');

Route::post('/comment', 'CommentController@store');

Route::get('/lol', 'ReplyController@show');

//code for reply
Route::post('/reply', 'ReplyController@store');

Route::get('/reply/{id}', 'ReplyController@create')->middleware('auth');

// Code for like post
//Route::post('/likepost', 'LikePostController@store');
Route::post('/likepost', 'FollowController@store');

// Code for comment post
Route::post('/likecomment', 'LikeCommentController@store');