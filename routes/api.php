<?php

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

Route::group(['prefix' => 'links'], static function () {
    Route::get('/{short}', 'ShortLinkController@show');

    Route::post('/', 'ShortLinkController@store');
});
