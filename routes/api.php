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

Route::get('detailnilai','DetailNilaiController@index');
Route::post('detailnilai','DetailNilaiController@create');
Route::put('/detailnilai/{id}','DetailNilaiController@update');
Route::delete('/detailnilai/{id}','DetailNilaiController@destroy');

Route::get('mapel','MapelController@index');
Route::post('mapel','MapelController@create');
Route::put('/mapel/{id}','MapelController@update');
Route::delete('/mapel/{id}','MapelController@destroy');

Route::get('jadwal','JadwalController@index');
Route::post('jadwal','JadwalController@create');
Route::put('/jadwal/{id}','JadwalController@update');
Route::delete('/jadwal/{id}','JadwalController@destroy');

Route::get('jurusan','JurusanController@index');
Route::post('jurusan','JurusanController@store');
Route::put('/jurusan/{id}','JurusanController@update');
Route::delete('/jurusan/{id}','JurusanController@destroy');

Route::get('kelas','KelasController@index');
Route::post('kelas','KelasController@store');
Route::put('/kelas/{id}','KelasController@update');
Route::delete('/kelas/{id}','KelasController@destroy');

Route::get('siswakelas','SiswaKelasController@index');
Route::post('siswakelas','SiswaKelasController@store');
Route::put('/siswakelas/{id}','SiswaKelasController@update');
Route::delete('/siswakelas/{id}','SiswaKelasController@destroy');