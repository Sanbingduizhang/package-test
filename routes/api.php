<?php

use Illuminate\Http\Request;

use \Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['namespace' => 'Base', 'prefix' => 'base'], function ($api) {

    //登录
    $api->post('login', 'LoginController@login');

    //需要认证相关的
    $api->group(['middleware' => ['jwt-verify']], function ($api) {
        //退出
        $api->post('logout', 'LoginController@logout');

        //用户相关
        $api->get('my-ms', 'UsersController@myMs');
    });


});

Route::get('test','TestController@index');
Route::post('test','TestController@test');
Route::get('show-data','TestController@showData');
Route::post('set-data','TestController@setData');
Route::post('ding','TestController@ding');
