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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('master_numbers', 'MasterNumberAPIController');
Route::resource('messages', 'MessageAPIController');
Route::resource('countries', 'CountryAPIController');
Route::resource('message_infos', 'MessageInfoAPIController');
Route::resource('settings', 'SettingAPIController');
Route::resource('per_min_sends', 'perMinSendAPIController');

Route::resource('topups', 'topupAPIController');

Route::resource('s_m_t_p_s', 'SMTPAPIController');