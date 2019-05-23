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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
    Route::post('register', 'Auth\RegisterController@create');
});

Route::apiResource('movies', 'Api\MovieController');
Route::apiResource('posts', 'Api\PostController');
Route::apiResource('comments', 'Api\CommentController');

Route::get('watchlist', 'Api\WatchlistController@index');
Route::post('watchlist', 'Api\WatchlistController@store');

Route::get('tags', 'Api\TagsController@index');
Route::get('tags/{tag}', 'Api\TagsController@show');
