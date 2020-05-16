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

Auth::routes(['verify' => true]);

// Category Posts
Route::get('/categories/{slug:slug}', 'HomeController@CategoryPosts');

//Users Posts
Route::get('/user/{id}/posts', 'HomeController@UserPosts');

// Categories
Route::resource('category', 'CategoryController');

// Tags
Route::resource('tag', 'TagController');

// Post Control
Route::resource('post', 'PostController');
Route::get('/post/{post:slug}', 'PostController@show')->name('post.show')->where('slug', '[\w\d\-\_]+'); //access post using slug

//Users Control
Route::resource('users', 'UsersController');
Route::post('/users/change/password/{user}', 'UsersController@passChange')->name('users.passChange');

// Newshelter
Route::post('/newshelter', 'SubscriberController')->name('subscribe');

//Contact Page
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@getMessage')->name('contact');

// Comments
Route::post('comment.store/{post_id}', 'CommentController@store')->name('comment.store/');
Route::resource('comment', 'CommentController');

// User role
Route::get('/user/role', 'RoleController@index')->name('user.role');
