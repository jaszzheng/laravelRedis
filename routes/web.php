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

Route::get('rank', 'ArticlesController@rank');

Route::get('/welcome', function () {
   return view('welcome');
});

Route::resource('article', 'ArticlesController');

Auth::routes();

Route::post('favorite/{article}', 'ArticlesController@favoritePost');
Route::post('unfavorite/{article}', 'ArticlesController@unFavoritePost');
Route::get('favorites', 'UsersController@myFavorites')->middleware('auth');

