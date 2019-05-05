<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::any('upload', 'StudentController@upload');
Route::any('mail', 'StudentController@mail');
Route::any('cache1', 'StudentController@cache1');
Route::any('cache2', 'StudentController@cache2');
Route::any('queue', 'StudentController@queue');
Route::any('error', 'StudentController@error');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['activity01']], function() {

    //Route::get('user/index', ['uses' => 'UserController@index', 'as' => 'a-u-i']);
    Route::get('user/index', ['uses' => 'UserController@index'])->name('a-u-i');
    Route::get('user/create', 'UserController@create');

});
