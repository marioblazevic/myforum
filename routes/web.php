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
    return redirect()->route('posts');
});

Route::middleware('auth')->group(function(){

    Route::get('/posts','App\Http\Controllers\PostController@index')->name('posts');
    Route::get('/posts/create','App\Http\Controllers\PostController@create')->name('create-post');
    Route::post('/posts','App\Http\Controllers\PostController@store');
    Route::delete('/posts/{post}/delete','App\Http\Controllers\PostController@delete')->name('posts-delete')->middleware('can:delete,post');
    Route::get('/posts/{post}/edit','App\Http\Controllers\PostController@edit')->name('posts-edit');
    Route::patch('/posts/{post}/update','App\Http\Controllers\PostController@update')->name('posts-update')->middleware('can:update,post');

    Route::get('/explore','App\Http\Controllers\ExploreController@index')->name('explore-users');
    Route::post('/follow/{user}','App\Http\Controllers\FollowController@store')->name('follow-user');

    Route::post('/like/{post}','App\Http\Controllers\PostLikesController@store')->name('like');
    Route::delete('/like/{post}','App\Http\Controllers\PostLikesController@destroy')->name('dislike');

    Route::get('/following','App\Http\Controllers\FollowingController@index')->name('following-users');
    Route::get('/profile/{user:name}','App\Http\Controllers\ProfileController@show')->name('profile');

    Route::get('/post/{posts}','App\Http\Controllers\PostController@show')->name('post');
    Route::post('/comment/{post}/create','App\Http\Controllers\CommentController@store')->name('create-comment');
    Route::delete('/comment/{comment}/delete','App\Http\Controllers\CommentController@destroy')->name('delete-comment');

    Route::get('/user/{user}','App\Http\Controllers\UserController@show')->name('user');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


