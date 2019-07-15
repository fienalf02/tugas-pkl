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

Route::get('guru','GuruController@index');
Route::post('guru','GuruController@create');
Route::put('/guru/{id}','GuruController@update');
Route::delete('/guru/{id}','GuruController@destroy');

Route::get('siswa','SiswaController@index');
Route::post('siswa','SiswaController@create');
Route::put('/siswa/{id}','SiswaController@update');
Route::delete('/siswa/{id}','SiswaController@destroy');

Route::get('nilai','NilaiController@index');
Route::post('nilai','NilaiController@create');
Route::put('/nilai/{id}','NilaiController@update');
Route::delete('/nilai/{id}','NilaiController@destroy');