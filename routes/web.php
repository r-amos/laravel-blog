<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/ramblings', 'PostsController@index');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/posts', 'PostsController@index')->name('posts');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');

Route::get('/tags', 'TagsController@index');
Route::delete('tags/{tag}', 'TagsController@destroy');
Route::get('tags/{tag}/edit', 'TagsController@edit');
Route::put('/tags/{tag}', 'TagsController@update');
Route::post('/tags', 'TagsController@store');
Route::get('/posts/tags/{tag}', 'TagsController@index');

//Disable User Registration & Password Reset
Auth::routes([
   'register' => false
]);
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');