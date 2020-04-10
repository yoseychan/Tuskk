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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/articles', 'ArticlesController@index')->name('articles');

Route::get('/articles/{id}', 'ArticlesController@show')->name('articles');

