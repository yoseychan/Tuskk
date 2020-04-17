<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
    return view('home');
});
Route::get('/articles', function () {
    return view('articles');
});

Route::get('/article/create', function () {
    if (Gate::allows('manage-article', Auth::user())) {
        return view('newarticle');
    }
    return abort('403');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/category', function () {
    return view('category');
});

Route::get('/team', function () {
    return view('team');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles', 'ArticlesController@index')->name('articles');
Route::get('/articles/{id}', 'ArticlesController@show')->name('articles');
Route::middleware('auth')->get('/articles/{id}/edit', 'ArticlesController@forEdit')->name('articles-edit');

Route::get('categories/{title}', 'CategoriesController@show')->name('categories');

Route::get('users/{id}', 'UsersController@show')->name('users');
Route::get('admin/users', 'UsersController@index')->name('users');
Route::middleware('auth')->get('/admin/users/{id}/edit', 'UsersController@forEdit')->name('user-edit');
