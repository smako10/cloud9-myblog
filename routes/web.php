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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PostsController@index');
// Route::get('/posts/{id}', 'PostsController@show');
Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy');

Route::get('/hello', 'HelloController@index');
Route::post('/hello', 'HelloController@post');
//Route::get('/hello', 'HelloController@index')->middleware(HelloMiddleware::class);
//Route::get('/hello', 'HelloController@index')->middleware('hello');

Route::get('/hello/add', 'HelloController@add');
Route::post('/hello/add', 'HelloController@create');
Route::get('/hello/edit', 'HelloController@edit');
Route::post('/hello/edit', 'HelloController@update');
Route::get('/hello/del', 'HelloController@del');
Route::post('/hello/del', 'HelloController@remove');
Route::get('/hello/show', 'HelloController@show');
