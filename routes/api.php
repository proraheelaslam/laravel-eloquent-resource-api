<?php

use Illuminate\Http\Request;

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

Route::post('register','Api\PassportController@register');
Route::post('login','Api\PassportController@login');


Route::group(['middleware'=>'auth:api'],function () {
    Route::post('user/detail','Api\PassportController@geUserDetail');
    Route::get('user/map','Api\ApiController@index');
});
