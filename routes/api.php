<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('api')->get('articles', 'ApiArticlesController@index');
Route::middleware('api')->get('articles/latest', 'ApiArticlesController@latest');
Route::middleware('api')->get('article/featured', 'ApiArticlesController@featured');
Route::middleware('api')->get('articles/{id}', 'ApiArticlesController@show');

Route::middleware('api')->get('roles', 'ApiRolesController@index');

Route::middleware('auth:api')->delete('articles/{id}', 'ApiArticlesController@delete');
Route::middleware('auth:api')->put('articles/{id}', 'ApiArticlesController@update');
Route::middleware('auth:api')->post('/articles', 'ApiArticlesController@store');

Route::middleware('api')->post('/image/upload', 'ApiImageUpload@uploadImage');


Route::middleware('api')->get('categories', 'ApiCategoriesController@index');
Route::middleware('api')->get('categories/{title}', 'ApiCategoriesController@show');

Route::middleware('auth:api')->post('comments', 'ApiCommentsController@store');
Route::middleware('auth:api')->delete('comments/{id}', 'ApiCommentsController@delete');

Route::middleware('api')->get('/users', 'ApiUsersController@index');
Route::middleware('auth:api')->delete('/users/{id}', 'ApiUsersController@delete');
Route::middleware('auth:api')->get('/users/{id}', 'ApiUsersController@show');
Route::middleware('auth:api')->put('/users/{id}', 'ApiUsersController@update');

Route::middleware('auth:api')->post('/articles/like', 'ApiArticlesController@like');





