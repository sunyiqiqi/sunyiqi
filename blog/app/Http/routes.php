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
  //   return view('greeting', ['name' => 'James']);
   return view('welcome');
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
Route::get('liuyan','LiuyanController@liuyan');
Route::post('content','LiuyanController@content');
//分页
Route::get('users', function () {
    $users = App\User::paginate(3);
    $users->setPath('custom/url');
   
});
Route::get('del','LiuyanController@del');
Route::get('upda','LiuyanController@upda');
Route::post('xiu','LiuyanController@xiu');
Route::group(['middleware' => ['web']], function () {
    //
    Route::get('user1', 'UserController@inser');
    Route::get('user2', 'UserController@sele');
	
	
   //Route::get('user3', 'UserController@updat');
   //Route::get('user4', 'UserController@dele');
});
