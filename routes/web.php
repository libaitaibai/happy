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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::prefix('/')->group(function () {
    Route::any('', 'IndexController@index');
    Route::any('index', 'IndexController@index');//主页
    Route::any('signature', 'IndexController@signature');//签到


    Route::any('test', 'IndexController@test');
    Route::any('test1', 'IndexController@index1');
});