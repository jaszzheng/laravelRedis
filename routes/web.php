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
use Illuminate\Support\Facades\Redis;

//Route::get('/', function () {
//
//    return Cache::remember('articles.all', 60 * 60, function () {
//
//        return App\Article::all();
//    });
//});

Route::get('/', 'ArticlesController@index');

Route::get('/rank', 'ArticlesController@rank');

Route::resource('article', 'ArticlesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
