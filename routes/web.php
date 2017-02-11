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

Route::get('/', 'pagesController@getIndex');

Route::get('about', 'pagesController@getAbout');

Route::get('contact', 'pagesController@getContact');
Route::post('contact', 'pagesController@postContact');

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

Route::resource('posts', 'PostController');

Auth::routes();

Route::get('logout', '\blog\Http\Controllers\Auth\LoginController@logout');

//password reset

Route::get('password/reset', '\blog\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm');
Route::get('password/reset/{token}', '\blog\Http\Controllers\Auth\ResetPasswordController@showResetForm');
Route::post('password/email', '\blog\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::get('categories/search/{id}',['uses' => 'CategoryController@search', 'as' => 'categories.search']);

// Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);
Route::get('tags/search/{id}', ['uses' => 'TagController@search', 'as' => 'tags.search']);

//Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store' ]);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);