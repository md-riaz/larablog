<?php
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index');

Auth::routes();

// Category Posts
Route::get('/categories/{slug:slug}', 'HomeController@CategoryPosts');

//Users Posts
Route::get('/user/{id}/posts', 'HomeController@UserPosts');

// Categories
Route::resource('category', 'CategoryController')->middleware('auth');

// Post Control
Route::resource('post', 'PostController');
Route::get('/post/{post:slug}', 'PostController@show')->name('post.show'); //access post using slug

//Users Control
Route::resource('users', 'UsersController')->middleware('auth');
Route::post('users/change/password/{user}', 'UsersController@passChange')->name('users.passChange');

// Newshelter
Route::post('/newshelter', 'SubscriberController@store')->name('subscribe');
