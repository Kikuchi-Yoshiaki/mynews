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

Route::get('/', function () {
    return view('welcome');
});

//カリキュラム22追加部分
//app/Http/Controllers/Admin/NewsControllersのAction()への処理
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
   Route::get('news/create', 'Admin\NewsController@add');
   Route::post('news/create', 'Admin\NewsController@create');
   Route::get('news', 'Admin\NewsController@index');
   Route::get('news/edit', 'Admin\NewsController@edit');
   Route::post('news/edit', 'Admin\NewsController@update');
   Route::get('news/delete', 'Admin\NewsController@delete');
});

//課題３
Route::get('XXX', 'AAAController@bbb');

//課題4 //22-課題3-課題-6
//app/Http/Controllers/Admin/ProfileControllersのAction()への処理
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('prfile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile', 'Admin\ProfileController@edit');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
