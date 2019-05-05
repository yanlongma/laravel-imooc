<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
// 基础路由
Route::get('basic1', function() {
    return 'Hello World';
});

Route::post('basic2', function() {
    return 'Baisc2';
});

// 多请求路由
Route::match(['get', 'post'], 'multy1', function() {
   return 'multy1';
});

Route::any('multy2', function() {
   return 'multy2';
});
*/

// 路由参数

//Route::get('user/{id}', function($id) {
//    return 'User-id-' . $id;
//});
//
//Route::get('user/{name?}', function($name = null) {
//    return 'User-name-' . $name;
//});

//Route::get('user/{name?}', function($name = 'sean') {
//    return 'User-name-' . $name;
//});

//Route::get('user/{name?}', function($name = 'sean') {
//    return 'User-name-' . $name;
//})->where('name', '[A-Za-z]+');


//Route::get('user/{id}/{name?}', function($id, $name = 'sean') {
//    return 'User-id-' . $id . '-name-' . $name;
//})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);


// 路由别名

//Route::get('user/center', ['as' => 'center', function() {
//    return route('center');
//}]);

// 路由群组

//Route::group(['prefix' => 'member'], function() {
//
//
//    Route::get('user/center', ['as' => 'center', function() {
//        return route('center');
//    }]);
//
//    Route::any('multy2', function() {
//        return 'member-multy2';
//    });
//});

// 路由中输出视图
//Route::get('view', function () {
//    return view('welcome');
//});

// 路由与控制器关联
//Route::get('member/info', 'MemberController@info');

//Route::any('member/info', ['uses' => 'MemberController@info']);

//Route::any('member/info', [
//    'uses' => 'MemberController@info',
//    'as' => 'memberinfo'
//]);

//Route::any('member/{id}', ['uses' => 'MemberController@info'])
//->where('id', '[0-9]+');

//Route::controller('member', 'MemberController');


Route::any('test1', ['uses' => 'StudentController@test1']);
Route::any('query1', ['uses' => 'StudentController@query1']);
Route::any('query2', ['uses' => 'StudentController@query2']);
Route::any('query3', ['uses' => 'StudentController@query3']);
Route::any('query4', ['uses' => 'StudentController@query4']);
Route::any('query5', ['uses' => 'StudentController@query5']);
Route::any('orm1', ['uses' => 'StudentController@orm1']);
Route::any('orm2', ['uses' => 'StudentController@orm2']);
Route::any('orm3', ['uses' => 'StudentController@orm3']);
Route::any('orm4', ['uses' => 'StudentController@orm4']);
Route::any('section1', ['uses' => 'StudentController@section1']);
Route::any('url', ['as' => 'url', 'uses' => 'StudentController@urlTest']);
Route::any('student/request1', ['uses' => 'StudentController@request1']);

// 宣传页面
Route::any('activity0', ['uses' => 'StudentController@activity0']);

// 互动页面
Route::group(['middleware' => ['activity']], function() {
    Route::any('activity1', ['uses' => 'StudentController@activity1']);
    Route::any('activity2', ['uses' => 'StudentController@activity2']);
});

Route::group(['middleware' => ['web']], function() {

    Route::any('session1', ['uses' => 'StudentController@session1']);
    Route::any('session2', [
        'as' => 'session2',
        'uses' => 'StudentController@session2'
    ]);
    Route::any('response', ['uses' => 'StudentController@response']);
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
