<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('m/users', 'api\admin\UserController@index');
Route::post('m/user', 'api\admin\UserController@store');
Route::delete('m/user/{user}', 'api\admin\UserController@destroy');
Route::put('m/user/{user}', 'api\admin\UserController@update');
Route::get('user/current', 'api\admin\UserController@getUserCurrent');
Route::get('user/follows', 'api\admin\UserController@getListFollow');
Route::delete('user/follow/{user}', 'api\admin\UserController@destroyUserFollow');
Route::get('user/followers', 'api\admin\UserController@getListFollower');
Route::get('user/posts', 'api\admin\UserController@getListPost');
Route::get('user/countFollow', 'api\admin\UserController@countFollow');
Route::get('user/countFollower', 'api\admin\UserController@countFollower');
Route::get('user/countPost', 'api\admin\UserController@countPost');

Route::get('m/roles/all', 'api\admin\RoleController@getAllRole');

Route::get('profile', 'api\admin\UserController@profile');
Route::put('profile', 'api\admin\UserController@updateProfile');

Route::get('m/tags', 'api\admin\TagController@index');
Route::get('m/tags/all', 'api\admin\TagController@getAllTag');
Route::post('m/tag', 'api\admin\TagController@store');
Route::put('m/tag/{tag}', 'api\admin\TagController@update');
Route::delete('m/tag/{tag}', 'api\admin\TagController@destroy');


Route::get('m/categories', 'api\admin\CategoryController@index');
Route::get('m/categories/all', 'api\admin\CategoryController@getAllCategory');
Route::post('m/category', 'api\admin\CategoryController@store');
Route::put('m/category/{category}', 'api\admin\CategoryController@update');
Route::delete('m/category/{category}', 'api\admin\CategoryController@destroy');

Route::get('m/roles', 'api\admin\RoleController@index');
Route::post('m/role', 'api\admin\RoleController@store');
Route::put('m/role/{role}', 'api\admin\RoleController@update');
Route::delete('m/role/{role}', 'api\admin\RoleController@destroy');

Route::get('m/posts', 'api\admin\PostController@index');
Route::post('m/post', 'api\admin\PostController@store');
Route::put('m/post/{post}', 'api\admin\PostController@update');
Route::delete('m/post/{post}', 'api\admin\PostController@destroy');

Route::get('m/comments', 'api\admin\CommentController@index');
Route::post('m/comment', 'api\admin\CommentController@store');
Route::put('m/comment/{comment}', 'api\admin\CommentController@update');
Route::delete('m/comment/{comment}', 'api\admin\CommentController@destroy');

Route::get('c/newestposts', 'api\client\PostController@getNewestPosts');

Route::get('p/{slug}', 'api\client\PostController@getSingle');
Route::get('user/p/{slug}', 'api\client\PostController@getUserBaseSlugPost');

