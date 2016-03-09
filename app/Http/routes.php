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

/*Route::get('/', function () {
    return view('welcome');
});*/

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
    Route::get('/', ['uses' => 'homeController@index', 'as' => 'homePage']);
    Route::get('/book', ['uses' => 'bookController@show', 'as' => 'bookPage']);
    Route::get('/remark', ['uses' => 'remarkController@show', 'as' => 'remarkPage']);
    Route::post('/provide', ['uses' => 'bookController@provide', 'as' => 'provide']);
    Route::get('/book/{id}', ['uses' => 'bookController@book', 'as' => 'book'])->where('id', '[0-9]+');
    Route::post('/remoark', ['uses' => 'remarkController@remark', 'as' => 'remark']);
    Route::get('/chat/{id}', ['uses' => 'chatController@show', 'as' => 'chatPage'])->where('id', '[0-9]+');
    Route::post('/chat', ['uses' => 'chatController@chat', 'as' => 'chat']);
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', function(){
        dd(Session::all());
    });
});
