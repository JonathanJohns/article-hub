<?php

use App\Post;

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
    $posts = Post::orderBy('created_at', 'desc')
        ->join('users', 'users.id', 'posts.user_Id')
        ->select('posts.*', 'users.name as name' )
        ->get();

        return view('index')->with('articles', $posts);
  
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/articles', 'PostController')->middleware('auth');
Route::resource('/favourites', 'FavouriteController')->middleware('auth');
