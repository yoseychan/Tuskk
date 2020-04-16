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

Route::get('/admin/users', function () {

    if (Gate::allows('manage-users', Auth::user())) {
        return view('admin.users');
    }
    return abort('403');
});



// error pages


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles', 'ArticlesController@index')->name('articles');
Route::get('/articles/{id}', 'ArticlesController@show')->name('articles');

Route::get('categories/{title}', 'CategoriesController@show')->name('categories');

Route::get('authors/{id}', 'UsersController@show')->name('authors');

Route::get('admin/users', 'UsersController@index')->name('users');
